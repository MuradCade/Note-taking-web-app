<?php

session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    header("location:dashboard.php");
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">

</head>

<body>
    <section class="ftco-section" style="margin-top: -80px !important; border-radius:10px !important;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(../img/undraw_mobile_testing_re_w7yb.svg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4 text-center font-bold">Login</h3>
                                </div>

                            </div>
                            <form action="../controller/login.aouth.php" class="signin-form" method="post">
                                <div class="form-group mb-3">
                                    <label class="label text-color font-bold" for="name">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="username">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label text-color font-bold" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="pwd">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3" name="login">Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-md-right text-primary text-center"">
                                        <a href=" forgetpwd.php">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a data-toggle="tab" href="signup.php">Sign Up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="../js/bootstrap.min.js"></script>

</body>

</html>