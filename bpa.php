<?php
  session_start();
  include 'functions/function2.php';
  include 'functions/writeHTML.php';
  if ($_GET['type'] == "ti") {
    $_SESSION['countBpa'] = getCount("ti_bpa");
  }
  elseif ($_GET['type'] == "rf") {
    $_SESSION['countBpa'] = getCount("rf_bpa");
  }
  elseif ($_GET['type'] == "fiber") {
    $_SESSION['countBpa'] = getCount("fiber_bpa");
  }
  elseif ($_GET['type'] == "microwave") {
    $_SESSION['countBpa'] = getCount("microwave_bpa");
  }
  elseif ($_GET['type'] == "tssr") {
    $_SESSION['countBpa'] = getCount("tssr_bpa");
  }
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

    <form style='margin-top: 1em;' action="import/importBpa.php" method="post" enctype="multipart/form-data">
      <div style='text-align: center;'>
        <?php
          if ($_GET['type'] == "ti") {
            echo "<h4>TI BPA</h4>";
          }
          elseif ($_GET['type'] == "rf") {
            echo "<h4>RF BPA</h4>";
          }
          elseif ($_GET['type'] == "fiber") {
            echo "<h4>Fiber BPA</h4>";
          }
          elseif ($_GET['type'] == "microwave") {
            echo "<h4>Microwave BPA</h4>";
          }
          elseif ($_GET['type'] == "tssr") {
            echo "<h4>TSSR BPA</h4>";
          }
         ?>
      </div>
      <input name='bpaType' value='<?php echo $_GET['type']; ?>' hidden>
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
              if (isset($_SESSION['countBpa']) && isset($_SESSION['imported'])) {
                echo "<h6>" . $_SESSION['countBpa'] . " rows have been imported.</h6>";
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
        <h6>Total rows:
          <?php
            if (isset($_SESSION['countBpa'])){
              echo $_SESSION['countBpa'];
            }
            unset($_SESSION['countBpa']);
            unset($_SESSION['imported']);
           ?>
        </h6>
        <?php
          if ($_GET['type'] == "ti"){
            echo "<iframe style='width: 100%; height:75%;' src='table/tiBpaTable.php' frameborder='1'></iframe>";
          }
          else if ($_GET['type'] == "rf"){
            echo "<iframe style='width: 100%; height:75%;' src='table/rfBpaTable.php' frameborder='1'></iframe>";
          }
          else if ($_GET['type'] == "fiber"){
            echo "<iframe style='width: 100%; height:75%;' src='table/fiberBpaTable.php' frameborder='1'></iframe>";
          }
          else if ($_GET['type'] == "microwave"){
            echo "<iframe style='width: 100%; height:75%;' src='table/microwaveBpaTable.php' frameborder='1'></iframe>";
          }
          else if ($_GET['type'] == "tssr"){
            echo "<iframe style='width: 100%; height:75%;' src='table/tssrBpaTable.php' frameborder='1'></iframe>";
          }
         ?>

      </div>
    </div>
    <!-- enf of iframe container -->
    <?php writeScript() ?>
  </body>
</html>
