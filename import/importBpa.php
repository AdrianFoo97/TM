<?php
  include '../functions/readExcel.php';
  include '../functions/function2.php';

  session_start();

  $type = $_POST['bpaType'];

  if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../uploads/bpa.xlsx")) {
        echo "<h1>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h1><br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  }

  $row = readExcel("../uploads/bpa.xlsx");

  // remove data in database
  if ($type == "ti") {
    $result = deleteData("ti_bpa");
  }
  else if ($type == "rf") {
    $result = deleteData("rf_bpa");
  }
  elseif ($type == "fiber") {
    $result = deleteData("fiber_bpa");
  }
  elseif ($type == "microwave") {
    $result = deleteData("microwave_bpa");
  }
  elseif ($type == "tssr") {
    $result = deleteData("tssr_bpa");
  }


  if ($result) {
    // Insert data from the 2D array ($row) into database
    import2DB($row, $type);
  }

 // _________________________________________________________________________

  function import2DB($row, $type) {
    $sqlList = "";
    $total = 0;
    $totalAll = 0;
    foreach ($row as $row => $cell) {
      foreach ($cell as $cell => $data) {
        // replace single quote to double quote (escape character)
        $data = str_replace('\'', '\'\'', $data);
        // assign data to variable accroding to the cell position
        if ($cell == 0) {
          $scenario = $data;
        }
        elseif ($cell == 1) {
          $subcon = $data;
        }
        elseif ($cell ==2) {
          $item = $data;
        }
        elseif ($cell == 3) {
          $commodity = $data;
        }
        elseif ($cell == 4) {
          $subgroup = $data;
        }
        elseif ($cell == 5) {
          $classification = $data;
        }
        elseif ($cell == 6) {
          $description = $data;
        }
        else {
          $uom = $data;
        }
      }
      // exclude the first column header row
      if ($row != 0) {
        $total += 1;
        $totalAll += 1;
        if ($type == "ti") {
          $sql = "INSERT INTO ti_bpa VALUES ('$item', '$commodity', '$subgroup', '$classification',
          '$description', '$uom', '$subcon');";
        }
        else if ($type == "rf") {
          $sql = "INSERT INTO rf_bpa VALUES ('$item', '$commodity', '$subgroup', '$classification',
          '$description', '$uom', '$subcon');";
        }
        else if ($type == "fiber") {
          $sql = "INSERT INTO fiber_bpa VALUES ('$item', '$commodity', '$subgroup', '$classification',
          '$description', '$uom', '$subcon');";
        }
        else if ($type == "microwave") {
          $sql = "INSERT INTO microwave_bpa VALUES ('$item', '$commodity', '$subgroup', '$classification',
          '$description', '$uom', '$subcon');";
        }
        else if ($type == "tssr") {
          $sql = "INSERT INTO tssr_bpa VALUES ('$item', '$commodity', '$subgroup', '$classification',
          '$description', '$uom', '$subcon');";
        }
        $sqlList = $sqlList . $sql;
        // run the query when there are 50 queries in the string
        if ($total >= 50) {
          $result = runMultiQuery($sqlList);
          $total = 0;
          $sqlList = "";
        }
      }
    }

    $result = runMultiQuery($sqlList);

    // Wait computer to finish execution of sql query for 2 second
    sleep(2);

    $_SESSION['imported'] = true;

    if ($type == "ti") {
      header('Location: ../bpa.php?type=ti');
    }
    else if ($type == "rf") {
      header('Location: ../bpa.php?type=rf');
    }
    elseif ($type == "fiber") {
      header('Location: ../bpa.php?type=fiber');
    }
    elseif ($type == "microwave") {
      header('Location: ../bpa.php?type=microwave');
    }
    elseif ($type == "tssr") {
      header('Location: ../bpa.php?type=tssr');
    }
  }
 ?>
