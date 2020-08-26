<form action="" method="POST" id="register_form" enctype="multipart/form-data">
    <h1>Edit profile</h1>
    <label for="First name">First name: </label> <br>
    <input type="text" name="first_name" id="fName" required="required" value=<?= $_POST['first_name'] ?? '' ?>>
    <span class="error" id="fNameError"> <?php echo $nameErr; ?></span>
    <br>
    <label for="email">Email: </label> <br>
    <input type="text" name="email" id="email" required="required" autocomplete="off" value=<?= $_POST['email'] ?? '' ?>>
    <span class="error" id="emailError"> <?php echo $emailErr; ?></span>
    <br>
    
    <label for="username">Profile picture:</label> <br>
    <input type="file" name="profile_pic" id="profile_pic" value=<?= $_POST['the_file'] ?? '' ?>>
    <span class="error" id="picError"> <?php echo $picErr; ?></span>
    <br>
    <label for="gender">Gender:</label> <br>
    <div class="gender_options">
        <label for="male">Male:</label><input type="radio" required="required" name="gender" value="male"> <br>
        <label for="female">Female:</label><input type="radio" required="required" name="gender" value="female"> <br>
        <label for="other">Other:</label><input type="radio" required="required" name="gender" value="other"> <br>
    </div>
    <span class="error" id="genderError"> <?php echo $genderErr; ?></span>
    <br>
    <label for="about">About</label> <br>
    <textarea name="about" id="about" cols="30" rows="10"></textarea> <br>

    
    <input type="submit" name="edit_profile" id="edit_profile" value="Save edit"> <br>
</form>