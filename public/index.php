<?php
session_start();
echo 'Welcome home';
echo $_SESSION['email'];
echo $_SESSION['password'];