<form action="" method="POST">
    <h1>Login Form</h1>
<span class="error"> <?= $error ?? '' ?></span> <br>
    <label for="username">Username: </label> <br>
    <input type="text" name="username" value =<?= $_POST['username'] ?? '' ?>>

    <br>
    <label for="password">Password: </label> <br>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Log in" name="login"> <br>
    <p><a href="forgot.php">Forgot password?</a></p>
</form>