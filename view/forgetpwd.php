<?php


session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    header("location:dashboard.php");
    exit();
} else { ?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/forgetpwd.css">
        <title>Forget Password</title>
    </head>

    <body>
        <div class="continer">
            <form action="../controller/forgetpwd.inc.php" method="post">
                <div class="form-group">
                    <div class="box">
                        <img src="../img/lock.svg" alt="lock image">
                    </div>
                    <h4 class="mb-3">Reset Your Pasword</h4>
                    <p>Please Provide The necessary Information</p>
                </div>
                <p class="text-danger text-center  font-b">
                    <?php if (isset($_GET['error'])) {
                        echo $_GET['error'];
                    } ?>
                </p>
                <p class="text-success text-center  font-b">
                    <?php if (isset($_GET['success'])) {
                        echo $_GET['success'];
                    } ?>
                </p>
                <div class="content">
                    <label class="font-bold">Email</label>
                    <input type="email" placeholder="Enter Your Email.." class="form-control" name="email" require>
                    <button class="btn btn-primary" name="submit">Submit</button>
                </div>
                <p class="text-center mt-5 font-bold">All &copy; Copy Write Is Reserve For <strong>Noter.Inc</strong></p>
            </form>
        </div>
    </body>

    </html>


<?php } ?>