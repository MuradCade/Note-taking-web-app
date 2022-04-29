<?php


session_start();

include('../model/dbcon.php');

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {


    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM note WHERE id = '$id'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) { ?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="../css/bootstrap.min.css">
                    <link rel="stylesheet" href="../css/dash.css">
                    <title>Display Note</title>
                </head>

                <body>
                    <div class="text-center" id="displaying-note">
                        <img src="../img/arrow-left-circled.svg" class="arrow-back" alt="go back image-btn" />
                        <h2 class="text-secondary mt-4 font-bold capital"><?php echo $row['note_head']; ?></h2>
                        <span class="disable capital font-bold"><?php echo $row['sub_head'];
                                                                echo "<br>";
                                                                echo $row['note_date']; ?></span>

                        <p class="lead-4 mt-2 font-bold"><?php echo $row['note_body']; ?></p>
                        <button class="btn btn-success" id="update-btn">Update Note</button>
                    </div>
                    <!-- update note form -->
                    <div class="container mt-5 none" id="notes-form">
                        <form action="../controller/update.inc.php?id=<?php echo $id ?>" method="post" enctype="enctype=multipart/form-data">
                            <img src="../img/web-window-close.svg" class="close-btn">
                            <h2 class="text-center text-secondary text-center font-bold">Create New Note</h2>
                            <div class="form-group">
                                <label class="mb-2 font-bold text-secondary">Note Header</label>
                                <input type="text" placeholder="Enter Note Header" name="note_head" class="form-control mb-4" value="<?php echo $row['note_head'] ?>">
                                <label class="mb-2 font-bold text-secondary">Note Header</label>
                                <input type="text" placeholder="Enter Note Sub Header" name="sub_head" class="form-control mb-4" value="<?php echo $row['sub_head'] ?>">
                                <label class="mb-2 font-bold text-secondary">Date Of The Note</label>
                                <input type="date" name="note_date" class="form-control mb-4" value="<?php echo $row['note_date'] ?>">
                                <label class="mb-2 font-bold text-secondary">Note Body</label>
                                <textarea name="note_body" class="form-control mb-4" cols="30" rows="10" placeholder="Enter The Notes Deatials"><?php echo $row['note_body']; ?></textarea>
                                <div class="drop-zone">
                                    <input type="file" class="drop-zone-prompt" name="image" accept="image/*" onchange="loadFile(event)">
                                    <p><img id="output" width="200" height="160" /></p>

                                </div>
                                <button class="btn btn-primary mb-4" name="submit">Submit Changes</button>

                            </div>
                        </form>
                    </div>



                    <script src="../js/jquery.min.js"></script>
                    <script src="../js/goback.js"></script>
                </body>

                </html>

<?php }
        } else {
            echo "failed to display note please try again! later";
        }
    } else {
        header("location:dashboard.php?error=note-can't-be-displayed-at-moment");
        exit();
    }
} else {
    header("location:login.php");
    exit();
}
