<form action="" method="POST" id="login_form">
    <h1>Login Form</h1>
<span class="error"> <?= $error ?? '' ?></span> <br>
    <label for="username">Username: </label> <br>
    <input type="text" name="username" id="username" value =<?= $_POST['username'] ?? '' ?>>
    <span class="error" id="usernameError"></span>
    <br>
    <label for="password">Password: </label> <br>
    <input type="password" name="password" id="password">
    <span class="error" id="passwordError"></span>
    <br>
    <input type="submit" value="Log in" name="login"> <br>
    <p><a href="forgot">Forgot password?</a></p>
</form>
<script src='./assets/js/loginValidation.js'></script>