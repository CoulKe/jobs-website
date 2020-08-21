<form action="" method="POST">
<span class="error"> <?php echo $error ?? ''; ?></span> <br>
    <label for="username">Username: </label> <br>
    <input type="text" name="username" value =<?= $_POST['username'] ?? ''?>>

    <br>
    <label for="password">Password: </label> <br>
    <input type="password" name="password">
    <br>
    <input type="submit" value="Log in" name="login"> <br>
    <p><a href="forgot.php">Forgot password</a></p>
</form>