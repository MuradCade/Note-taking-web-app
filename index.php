<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Home</title>
</head>

<body>
  <?php
  require_once('view/navbar.php');

  ?>
  <!-- hero -->
  <div class="container">
    <!-- <div class="row"> -->
    <div class="content-info ">
      <h4><span>Create</span> Organize Share <span>Easy.</span></h4>
      <p class="lead">Notes is the best place to jot down quick thoughts or to save longer notes filled with checklist,images,web links </p>
      <button>Try For free</button>
      <!-- <button>SignUp</button> -->
    </div>
    <div class="content-img">
      <img src="img/undraw_note_list_re_r4u9.svg" alt="">
    </div>
    <!-- </div> -->
  </div>


  <!-- our services -->


  <div class="container main mb-5">
    <div class="row">
      <div class="col-lg-4 col-md-6 col-md-6">
        <div class="cards">
          <div class="text-center">
            <img src="img/undraw_taking_notes_re_bnaf.svg" alt="organize">
          </div>
          <h4>Organize Your Notes</h4>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod illum soluta beatae tenetur! Quod illo non nemo accusamus.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-md-6">
        <div class="cards">
          <div class="text-center">
            <img src="img/undraw_share_link_re_54rx.svg" alt="">
          </div>
          <h4>Share Your Notes</h4>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod illum soluta beatae tenetur! Quod illo non nemo accusamus.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-md-6">
        <div class="cards">
          <div class="text-center">
            <img src="img/undraw_informed_decision_p2lh.svg" alt="">
          </div>
          <h4>Sync Your Note</h4>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod illum soluta beatae tenetur! Quod illo non nemo accusamus.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/popper.js"></script>
</body>

</html>