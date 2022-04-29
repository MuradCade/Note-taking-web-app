<?php
include_once("../model/dbcon.php");

use PHPMailer\PHPMailer\PHPMailer;


if (isset($_POST['submit'])) {
    // generate token then check for token
    $token = openssl_random_pseudo_bytes(16);

    //Convert the binary data into hexadecimal representation.
    $token = bin2hex($token);





    $email = $_POST['email'];
    $name = "Forget Your Password At Noter";
    echo "<br>";
    $subject = "Reset Password";
    $body = "<a href='http://localhost:8080/reset_link/reset.php?token=$token'>To Reset Your Password Click Here</a>";

    $sql = "select * from login where email = '$email'";
    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($result);
    if ($row['email'] === $email) {
        require_once "../PHPMailer/PHPMailer.php";
        require_once "../PHPMailer/SMTP.php";
        require_once "../PHPMailer/Exception.php";

        // to send message using php mailer  you should proved your gmail account and password
        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "";
        $mail->Password = "";
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $name);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            header("location:../view/forgetpwd.php?success=Email sent successfully Please check your Mail");
            exit();
        } else {
            header("location:../view/forgetpwd.php?error=Email Failed To send");
            exit();
        }
    } else {
        header("location:../view/forgetpwd.php?error=wrong-email-address");
        exit();
    }
} else {
    header("location:../view/forgetpwd.php");
    exit();
}
