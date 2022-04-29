<?php
include_once('../model/dbcon.php');
if (isset($_POST['signup'])) {
    $digits_needed = 8;

    $random_number = ''; // set up a blank string

    $count = 0;

    while ($count < $digits_needed) {
        $random_digit = mt_rand(0, 9);

        $random_number .= $random_digit;
        $count++;
    }

    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    // $hash_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    $sql = "insert into login (id,email,username,pwd)values('$random_number','$email','$username','$pwd');";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location:../view/dashboard.php");
        exit();
    } else {
        header("location:../view/sigup.php?error=failed-to-register-new-user");
        exit();
    }
}
