<?php

session_start();



include_once('../model/dbcon.php');
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "delete from note where id = '$id'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header("location:../view/dashboard.php?sucess = Note Deleted Successfully");
            exit();
        } else {
            header("location:../view/dashboard.php?error= Failed To Delete Note");
            exit();
        }
    } else {
        header("location:../view/dashboard.php?error= No Id Was Provided");
        exit();
    }
} else {
    header("location:login.php");
    exit();
}
