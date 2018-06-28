<?php
  session_start();
  include 'functions/function2.php';
  include 'functions/writeHTML.php';
  $_SESSION['countContract'] = getCount("contract");
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
    <?php writeNavbar("contract"); ?>
    <!-- end of navbar -->

    <!-- form to get imported file from user -->
    <form style='margin-top: 1em;' action="import/importContract.php" method="post" enctype="multipart/form-data">
      <div class='container'>
        <div style='text-align: center;'>
          <h4>Sales Contract</h4>
        </div>
        <p style='margin: 0;'>Update Sales Contract: </p>
        <div class='row'>
            <div class='col-sm-10'>
              <input class='form-control' type="file" name="fileToUpload" accept=".xls, .xlsx" required>
            </div>
            <div class='col-sm-2'>
                <input type="submit" name='submit' class='btn btn-default' value='Update'>
            </div>
        </div>
        <div class='row'>
          <div class='col-sm-10'>
            <div style='text-align: center;'>
            <?php
              if (isset($_SESSION['countContract']) && isset($_SESSION['imported'])) {
                echo "<h6>" . $_SESSION['countContract'] . " rows have been imported.</h6>";
              }
             ?>
           </div>
          </div>
        </div>
      </div>
    </form>
    <!-- end of form -->

    <!-- container to add iframe -->
    <div class='container'>
      <div class='row'>
        <h6>Total Sales Contract:
          <?php
            if (isset($_SESSION['countContract'])) {
              echo $_SESSION['countContract'];
            }
            unset($_SESSION['countContract']);
            unset($_SESSION['imported']);
           ?>
        </h6>
        <iframe style='width: 100%; height:75%;' src="table/contractTable.php" frameborder='1'></iframe>
      </div>
    </div>
    <!-- enf of iframe container -->

    <?php writeScript() ?>
  </body>
</html>
