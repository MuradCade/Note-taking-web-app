<?php


if (isset($_GET['token'])) {
    $token = $_GET['token'];


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/forgetpwd.css">
        <title>Reset Your Password</title>
    </head>

    <body>
        <div class="container mt-4">
            <form action="reset.inc.php?token=<?php echo $token ?>" method="post">
                <h4 class="text-center font-bold">Enter New Password</h4>
                <p class="text-center font-bold">Please Make Sure Passwords Matches</p>
                <div class="form-group content">
                    <label class="font-bold labels">Email Address</label>
                    <input type="email" placeholder="Enter Your Email" class="form-control" name="email">
                    <label class="font-bold labels">New Password</label>
                    <input type="password" placeholder="Enter New Password...." class="form-control" name="pwd1">
                    <label class="mt-2 font-bold labels">Confirm Password</label>
                    <input type="password" placeholder="Confirm New Password...." class="form-control" name="pwd2">
                    <button class="btn btn-primary" name="submit">Submit</button>
                </div>
            </form>
        </div>
    </body>

    </html>

<?php } else {
    header('location:../view/forgetpwd.php?error=token-was-not-found');
    exit();
} ?>