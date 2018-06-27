<?php
  session_start();
  include 'function2.php';
  include 'writeHTML.php';
  $_SESSION['countContract'] = getContractCount();
 ?>
<!DOCTYPE>
<html>
  <head>
    <?php writeHeadElements(); ?>
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
    <?php
      writeNavbar("other");
     ?>
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
