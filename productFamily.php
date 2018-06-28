<?php
  session_start();
  include 'functions/function2.php';
  include 'functions/writeHTML.php';
  $_SESSION['countProcurement'] = getCount("procurement");
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

    <form style='margin-top: 1em;' action="import/importProductFamily.php" method="post" enctype="multipart/form-data">
      <div class='container'>
        <div style='text-align: center;'>
          <h4>Product Family</h4>
        </div>
        <p style='margin: 0;'>Update Product Family: </p>
        <div class='row'>
            <div class='col-sm-10'>
              <input class='form-control' type="file" name="fileToUpload" accept=".xls, .xlsx">
            </div>
            <div class='col-sm-2'>
                <input type="submit" name='submit' class='btn btn-default' value='Update'>
            </div>
        </div>
        <div class='row'>
          <div class='col-sm-10'>
            <div style='text-align: center;'>
            <?php
              if (isset($_SESSION['countProcurement']) && isset($_SESSION['imported'])) {
                echo "<h6>" . $_SESSION['countProcurement'] . " rows have been imported.</h6>";
              }
             ?>
           </div>
          </div>
        </div>
      </div>
    </form>

    <!-- container to add iframe -->
    <div class='container'>
      <div class='row'>
        <h6>Total Product Family:
          <?php
            if (isset($_SESSION['countProcurement'])) {
              echo $_SESSION['countProcurement'];
            }
            unset($_SESSION['countProcurement']);
            unset($_SESSION['imported']);
           ?>
        </h6>
        <iframe style='width: 100%; height:75%;' src="table/productFamilyTable.php" frameborder='1'></iframe>
      </div>
    </div>
    <!-- enf of iframe container -->

    <?php writeScript() ?>
  </body>
</html>
