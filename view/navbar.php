<?php


session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    header("location:dashboard.php");
    exit();
} else { ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <title>Home</title>
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light px-4">
            <a class="navbar-brand" href="../index.php">Notey</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item ">
                        <a class="nav-link active" href="index.html">Home</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="view/login.php">Login</a>
                    </li>
                    <li class="nav-item px-2">
                        <a class="nav-link" href="view/signup.php">SignUp</a>
                    </li>
                </ul>
            </div>
        </nav>

        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/popper.js"></script>
    </body>

    </html>

<?php } ?>