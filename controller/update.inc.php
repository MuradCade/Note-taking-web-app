<?php
include_once('../model/dbcon.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $notehead = $_POST['note_head'];
    $subhead = $_POST['sub_head'];
    $notedate = $_POST['note_date'];
    $notebody = $_POST['note_body'];
    $img = $_POST['image'];
    $sql = "UPDATE  note  set note_head = '$notehead', sub_head = '$subhead', note_date = '$notedate', note_body = '$notebody', picture = '$img' WHERE id = '$id'";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        header("location:../view/dashboard.php?success=note-updated-successfully");
        exit();
    } else {
        header("location:../view/dashboard.php?erro= database-failed-to-update-note");
        exit();
    }
} else {
    header("location:../view/dashboard.php?erro=note-can't-be-update-at-moment");
    exit();
}
