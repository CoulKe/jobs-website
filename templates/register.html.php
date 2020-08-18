<form action="" method="POST">
    <label for="First name">First name: </label> <br>
    <input type="text" name="first_name">
    <span class="error"> <?php echo $nameErr; ?></span>
    <br>
    <label for="email">Email: </label> <br>
    <input type="text" name="email">
    <span class="error"> <?php echo $emailErr; ?></span>
    <br>
    <label for="username">Username</label> <br>
    <input type="text" name="username">
    <span class="error"> <?php echo $usernameErr; ?></span>
    <br>
    <label for="password">Password: </label> <br>
    <input type="password" name="password">
    <span class="error"> <?php echo $passwordErr; ?></span>
    <br>
    <label for="Confirm password">Confirm password: </label> <br>
    <input type="password" name="password_confirm">
    <span class="error"> <?php echo $confirmErr; ?></span>
    <br>
    <input type="submit" name="register" value="Register"> <br>
</form>

<style>
    .error{
        background-color: red;
    }
</style>