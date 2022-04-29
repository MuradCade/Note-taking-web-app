<?php
include_once('../model/dbcon.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    if (empty($username)) {
        header("location:../view/login.php?error=Empty-username-field");
        exit();
    } else if (empty($pwd)) {
        header("location:../view/login.php?error=Empty-Password-field");
        exit();
    } else {
        //hashing password in registration form usid md5 example provided below
        // $pwdhash = md5($pwd);

        //created a sql template
        $sql = "SELECT * FROM login where username = ? and pwd = ? ;";

        //create prepared statement
        $stmt = mysqli_stmt_init($connection);

        // prepare the prepared statement 
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location:../view/login.php?errors=sql-statement-failed");
            exit();
        } else {
            //bind the parameters to the placeholder
            //means replace ?? to the actual data that we gets from the user
            //param stands for parameter
            mysqli_stmt_bind_param($stmt, "ss", $username, $pwd);
            //run parameters inside database
            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['username'] === $username && $row['pwd'] === $pwd) {
                    session_start();

                    $_SESSION['id'] = $row['id'];
                    $_SESSION['username'] = $row['username'];

                    header("location:../view/dashboard.php?sucess=welcome");
                    exit();
                } else {
                    header("Location:../view/login.php?error=incorrect-username-and-password");
                    exit();
                }
            } else {
                header("Location:../view/login.php?error=incorrect-username-and-password");
                exit();
            }
        }
    }
}
