<?php

session_start();

// 
function get_user_id()
{
    $id = $_SESSION['id'];
    echo $id;
    return $id;
}
// displaying notes data as card
function display_card()
{
    include('../model/dbcon.php');
    $id =  $_SESSION['id'];
    $sql = "select * from note where userid = '$id'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 0) {
        echo "<p class='text-center mt-4 font-bold color-100 top-100'>Don't Know What To Do click on the button <q>Create New Note</q></p>";
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='col-lg-3  col-md-5 col-sm-12'>";
            echo "<div class='card mt-4 ' style='width: 18rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title text-center font-bold mb-2'>" . $row['note_head']  . "</h5>";
            echo "<h6 class='card-subtitle mb-2 text-secondary text-center'>" . $row['sub_head']  . "</h6>";
            echo "<p class='card-text '>" . $row['note_body'] . "</p>";
            echo "<div class='text-center'>";
            echo "<a href='" . "display_note.php?id=" . $row['id'] . "" . "'";
            echo "<button class='btn btn-primary font-bold'>Read More</button>";
            echo "</a>";
            echo "<a href='" . "delete_note.php?id=" . $row['id'] . "" . "'";
            echo "<button class='btn btn-danger font-bold'>Delete</button>";
            echo "</a>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
}
if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/dash.css">
    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
            <p class="navbar-brand px-4 text-secondary font-bold mt-3 line-height">Noter</p>
            <button class="navbar-toggler right-10 bg-secodary" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link text-primary font-bold" href="dashboard.php"> Display Notes</a>
                    </li>
                </ul>
                <div class="ms-auto px-4 flex btn">
                    <button class="btn btn-warning" id="createnote">Create New Note</button>
                    <button class="btn btn-secondary"> <a href="../controller/logout.php" class="nav-link text-light">Logut</a></button>

                </div>
            </div>
        </nav>

        <div class="container-fluid" id="notes-card">
            <div class="row ">
                <!-- Displaying notes Card -->

                <?php
                display_card();
                ?>


            </div>
        </div>



        <!-- notes form -->

        <div class="container mt-5 none" id="notes-form">
            <form action="../controller/createnote.php?id=<?php get_user_id(); ?>" method="post">
                <h2 class="text-center text-secondary text-center font-bold">Create New Note</h2>
                <div class="form-group">
                    <label class="mb-2 font-bold text-secondary">Note Header</label>
                    <input type="text" placeholder="Enter Note Header" name="note_head" class="form-control mb-4">
                    <label class="mb-2 font-bold text-secondary">Note Header</label>
                    <input type="text" placeholder="Enter Note Sub Header" name="sub_head" class="form-control mb-4">
                    <label class="mb-2 font-bold text-secondary">Date Of The Note</label>
                    <input type="date" name="note_date" class="form-control mb-4">
                    <label class="mb-2 font-bold text-secondary">Note Body</label>
                    <textarea name="note_body" class="form-control mb-4" cols="30" rows="10" placeholder="Enter The Notes Deatials"></textarea>
                    <div class="drop-zone">
                        <input type="file" class="drop-zone-prompt" name="image" accept="image/*" onchange="loadFile(event)">
                        <p><img id="output" width="200" height="160" /></p>

                    </div>
                    <button class="btn btn-primary mb-4" name="submit">Submit Changes</button>

                </div>
            </form>
        </div>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>

    </html>

<?php } else {
    header("location:login.php");
    exit();
}

?>