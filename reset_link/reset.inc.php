<?php

include_once('../model/dbcon.php');
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $email = $_POST['email'];
    $pwd1 = $_POST['pwd1'];
    $pwd2 = $_POST['pwd2'];

    if (empty($email) || empty($pwd1) || empty($pwd2)) {
        echo "<script> alert('please Fill The Form Entirely')</script";
        include('../reset_link/reset.php');
    } else {

        if ($pwd1 === $pwd2) {
            $sql = "select id from login where email = '$email'";
            $result = mysqli_query($connection, $sql);
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];

            // check if the person who forget their password is already in database  and make alot of
            // forgetpassword process
            $sql01 = "select id from forget_pwd";
            $result3 = mysqli_query($connection, $sql01);
            $row3 = mysqli_fetch_assoc($result3);
            $id2 = $row3['id'];

            if ($id2 == $id) {
                $id2 = $row3['id'];
                $sql2 = "UPDATE login SET pwd = '$pwd2' where email = '$email'";
                $main_result = mysqli_query($connection, $sql2);

                if ($main_result) {
                    $sql3 = "UPDATE forget_pwd  set token = '$token' where id = '$id2'";
                    $main_result2 = mysqli_query($connection, $sql3);

                    if ($main_result2) {
                        header('location:../view/login.php');
                        exit();
                    } else {
                        header('location:../view/forgetpwd.php?error=error-occur-while-changing-password-area1');
                        exit();
                    }
                } else {
                    header('location:../view/forgetpwd.php?error=error-occur-while-changing-password-mainarea');
                    exit();
                }
            } else {
                // if the person is new and its first time he make forget password request
                $sql4 = "UPDATE login SET pwd = '$pwd2' where email = '$email'";

                // $main_result = mysqli_query($connection, $sql2);
                $main_result3 = mysqli_query($connection, $sql4);

                if ($main_result3) {
                    $sql5 = "INSERT INTO forget_pwd(id,token,status_change)values('$id','$token',200)";
                    $main_result2 = mysqli_query($connection, $sql5);
                    if ($main_result3) {
                        header('location:../view/login.php');
                        exit();
                    } else {
                        header('location:../view/forgetpwd.php?error=error-occur-while-changing-password-area2');
                        exit();
                    }
                } else {
                    header('location:../view/forgetpwd.php?error=error-occur-while-changing-password-mainarea');
                    exit();
                }
            }
        } else {
            echo "<script> alert('please make the password matches each other')</script";
            include('../reset_link/reset.php');
        }
    }
} else {
    header('location:../view/forgetpwd.php?error=token-was-not-found');
    exit();
}
