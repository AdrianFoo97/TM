<?php
  include '../functions/readExcel.php';
  include '../functions/function2.php';

  session_start();

  if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "../uploads/subproject.xlsx")) {
        echo "<h1>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h1><br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  }

  $row = readExcel("../uploads/subproject.xlsx");
  var_dump($row);

  // remove data in database
  $result = deleteData("subproject");

  if ($result) {
    // Insert data from the 2D array ($row) into database
    import2DB($row);
  }

 // _________________________________________________________________________

  function import2DB($row) {
    $sqlList = "";
    $total = 0;
    $totalAll = 0;
    foreach ($row as $row => $cell) {
      foreach ($cell as $cell => $data) {
        // replace single quote to double quote (escape character)
        $data = str_replace('\'', '\'\'', $data);
        // assign data to variable accroding to the cell position
        if ($cell == 0) {
          $type = $data;
        }
        elseif ($cell == 1) {
          $code = $data;
        }
        elseif ($cell ==2) {
          $name = $data;
        }
        elseif ($cell == 3) {
          $region = $data;
        }
      }
      // exclude the first column header row
      if ($row != 0) {
        $total += 1;
        $totalAll += 1;
        $sql = "INSERT INTO subproject VALUES ('$code', '$name', '$region', '$type');";
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

    header('Location: ../subproject.php');
  }
 ?>
