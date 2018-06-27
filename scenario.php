<?php
  session_start();
  include 'function2.php';
  $_SESSION['countContract'] = getContractCount();
 ?>
<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Auto Filling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <style>
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }
    table td input, table td select, table td textarea {
     width: 80%;

    }
    </style>
  </head>
  <body>
    <!-- nav bar -->
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark sticky-top'>
      <div class='container'>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">PR Template<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contract.php">Sales Contract</a>
            </li>
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Maintain Data
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">BPA</a>
                <a class="dropdown-item" href="#">Product Family</a>
                <a class="dropdown-item" href="#">Scenario</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end of navbar -->

    <form style='margin-top: 1em;' action="importContract.php" method="post" enctype="multipart/form-data">
      <div class='container'>
        <p style='margin: 0;'>Import File: </p>
        <div class='row'>
            <div class='col-sm-10'>
              <input class='form-control' type="file" name="fileToUpload" accept=".xls, .xlsx">
            </div>
            <div class='col-sm-2'>
                <input type="submit" name='submit' class='btn btn-default'>
            </div>
        </div>
        <div class='row'>
          <div class='col-sm-10'>
            <div style='text-align: center;'>
            <?php
              if (isset($_SESSION['countContract']) && isset($_SESSION['imported'])) {
                echo "<h6>" . $_SESSION['countContract'] . " rows has been imported.</h6>";
              }
             ?>
           </div>
          </div>
        </div>
      </div>
    </form>
    <script src="js/jquery-slim.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
