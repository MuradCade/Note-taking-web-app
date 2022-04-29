<?php
include_once("../model/dbcon.php");

if (isset($_POST['submit'])) {
    $note_head = $_POST['note_head'];
    $sub_head = $_POST['sub_head'];
    $note_date = $_POST['note_date'];
    $note_body = $_POST['note_body'];
    $image = $_POST['image'];
    $id = $_GET['id'];

    if (empty($note_head) && empty($sub_head) && empty($note_date) && empty($note_body) && empty($img)) {
        header("location:../view/dashboard.php?error=Please make sure that the form is filled");
        exit();
    } else {
        $sql = "insert into note(note_head,sub_head,note_date,note_body,picture,userid)values('$note_head',
        '$sub_head','$note_date','$note_body','$image','$id')";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header("location:../view/dashboard.php?Success=Notes-saved-successfully");
            exit();
        } else {
            header("location:../view/dashboard.php?error=failed-to-save-new-note");
            exit();
        }
    }
} else {
    header("location:../view/dashboard.php");
    exit();
}
