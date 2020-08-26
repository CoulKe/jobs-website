<?php
try {
    include __DIR__ . '../../includes/Config.php';
    include __DIR__ . '../../classes/Database_Functions.php';


    $users_table = new Database_Table($pdo, 'users');
    $title = 'Register';
    $nameErr = $usernameErr = $emailErr = $picErr = $passwordErr = $confirmErr = $genderErr = '';
    $genders = ['male', 'female', 'other'];
    $allowed_extensions = ['jpg', 'jpeg', 'png'];

    $errors = [];

    if (isset($_POST['register'])) {
        $first_name = $_POST['first_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $gender = strtolower($_POST['gender']);
        $profile_pic = $_FILES['profile_pic'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        

        if (empty($first_name)) {
            $nameErr = 'First name not filled';
            array_push($errors, $nameErr);
        } else {
            $first_name = htmlspecialchars($first_name);
        }

        if (empty($email)) {
            $emailErr = 'Email not filled';
            array_push($errors, $emailErr);
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = 'Invalid email';
                array_push($errors, $emailErr);
            } else {
                $used_email = $users_table->find_column('email', $email);

                if (count($used_email) > 0) {
                    $emailErr = 'Email already used';
                    array_push($errors, $emailErr);
                } else {
                    $email = htmlspecialchars($email);
                }
            }
        }
        if (empty($username)) {
            $usernameErr = 'Username not filled';
            array_push($errors, $usernameErr);
        } else {
            $used_username = $users_table->find_column('username', $username);
            if (count($used_username) > 0) {
                $usernameErr = 'Username already taken';
                array_push($errors, $usernameErr);
            } else {
                $username = htmlspecialchars($username);
            }
        }

        // File upload
        /**
         * Check if file was uploaded
         * then validate
         */
        if (!empty($profile_pic['tmp_name'])) {
            $file_extension = explode('.',$profile_pic['name'])[1];
            if ($profile_pic['error'] > 0) {
                array_push($errors, $picErr);
                echo 'Problem: ';
                switch ($profile_pic['error']) {
                    case 1:
                        echo 'File exceeded upload_max_filesize.';
                        break;
                    case 2:
                        echo 'File exceeded max_file_size.';
                        break;
                    case 3:
                        echo 'File only partially uploaded.';
                        break;

                    // case 4:
                        //Pass, it's not a must to upload file
                    //     'No file uploaded.';
                    case 6:
                        echo 'Cannot upload file: No temp directory specified.';
                        break;
                    case 7:
                        echo 'Upload failed: Cannot write to disk.';
                        break;
                    case 8:
                        echo 'A PHP extension blocked the file upload.';
                        break;
                }
                exit;
            }
            // Does the file have the right MIME type?  
            if (!in_array($file_extension, $allowed_extensions)) {
                array_push($errors, $picErr);
                echo 'Problem: file format is not allowed.';
                exit;
            }
            // put the file where we'd like it  
            $uploaded_file = '/assets/user_images/' . $profile_pic['name'];
            if (is_uploaded_file($profile_pic['tmp_name'])) {
                if (!move_uploaded_file($profile_pic['tmp_name'], '..'.$uploaded_file)) {
                    echo 'Problem: Could not move file to destination directory.';
                    exit;
                }
            } else {
                echo 'Problem: Possible file upload attack. Filename: ';
                echo $profile_pic['name'][$uploaded_file];
                exit;
            }
            echo 'File uploaded successfully.';
        }
        //End file upload
        if (empty($password)) {
            $passwordErr = 'Password not filled';
            array_push($errors, $passwordErr);
        } else {
            if (!empty($password) !== !empty($password_confirm)) {
                $passwordErr = 'Passwords did not match';
                array_push($errors, $passwordErr);
            } else {
                $password = htmlspecialchars($password);
            }
        }
        if (!in_array($gender, $genders)) {
            $genderErr = 'Pick your gender';
            array_push($errors, $genderErr);
        }
        if (empty($password_confirm)) {
            $confirmErr = 'Confirm password';
            array_push($errors, $confirmErr);
        } else {
            $password_confirm = htmlspecialchars($password_confirm);
        }


        if (!count($errors) > 0) {
            $users_table->insert([
                'first_name' => $first_name,
                'email' => strtolower($email),
                'username' => $username,
                'gender' => $gender,
                'profile_url' => $uploaded_file,
                'password' => password_hash($password, PASSWORD_DEFAULT)
            ]);
            header('Location:login.php');
        }
    }
    ob_start();
    include __DIR__ . '../../templates/register.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    echo 'ERROR: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on ' . $e->getLine();
}
include __DIR__ . '../../templates/authentication.html.php';
