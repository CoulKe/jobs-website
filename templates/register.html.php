<form action="" method="POST" id="register_form">
    <h1>Register Form</h1>
    <label for="First name">First name: </label> <br>
    <input type="text" name="first_name" id="fName" value=<?= $_POST['first_name'] ?? '' ?>>
    <span class="error" id="fNameError"> <?php echo $nameErr; ?></span>
    <br>
    <label for="email">Email: </label> <br>
    <input type="text" name="email" id="email" autocomplete="off" value=<?= $_POST['email'] ?? '' ?>>
    <span class="error" id="emailError"> <?php echo $emailErr; ?></span>
    <br>
    <label for="username">Username:</label> <br>
    <input type="text" name="username" id="username" autocomplete="off" value=<?= $_POST['username'] ?? '' ?>>
    <span class="error" id="usernameError"> <?php echo $usernameErr; ?></span>
    <br>
    <label for="gender">Gender:</label> <br>
    <div class="gender_options">
        <label for="male">Male:</label><input type="radio" name="gender" value="male"
        <?= $gender === "male" ? "checked": '';?> >  <br>
        <label for="female">Female:</label><input type="radio" name="gender" value="female"
        <?= $gender === "female" ? "checked": '';?>> <br>
        <label for="other">Other:</label><input type="radio" name="gender" value="other" <?= $gender === "other" ? "checked": '';?>> <br>
    </div>
    <span class="error" id="genderError"> <?php echo $genderErr; ?></span>
    <br>
    <label for="Position">Position: </label> <br>
    <div class="position_options">
        <label for="Employer">Employer: </label> 
        <input type="radio" name="position" id="employer" <?= $position === "employer" ? "checked" : ''; ?> value="employer">
        <label for="Candidate">Candidate: </label> 
        <input type="radio" name="position" id="candidate" <?= $position === "candidate" ? "checked" : ''; ?> value="candidate">
    </div>
    <label for="password">Password: </label> <br>
    <input type="password" id="password" name="password" autocomplete="off">
    <span class="error" id="passwordError"> <?php echo $passwordErr; ?></span>
    <br>
    <label for="Confirm password">Confirm password: </label> <br>
    <input type="password" id="passwordConfirm" autocomplete="off" name="password_confirm">
    <span class="error" id="confirmError"> <?php echo $confirmErr; ?></span>
    <br>
    <input type="submit" name="register" id="register" value="Register"> <br>
</form>
<script src='./assets/js/registerValidation.js'></script>