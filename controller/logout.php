<?php
session_start();
session_destroy();
session_unset($_SESSION['name'], $_SESSION['username']);
header("location:../view/login.php");
exit();
