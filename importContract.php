<?php
  include 'readExcel.php';
  include 'function2.php';

  session_start();
  if(isset($_POST["submit"])) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], "uploads/upload.xlsx")) {
        echo "<h1>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</h1><br>";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
  }

  $row = readExcel("uploads/upload.xlsx");

  deleteData();
  import2DB($row);

  function import2DB($row) {
    $sqlList = "";
    $total = 0;
    $totalAll = 0;
    foreach ($row as $row => $cell) {
      foreach ($cell as $cell => $data) {
        // replace single quote to double quote
        $data = str_replace('\'', '\'\'', $data);
        // assign data to variable accroding to the cell position
        if ($cell == 0) {
          $sn = $data;
        }
        elseif ($cell == 1) {
          $du_id = $data;
        }
        elseif ($cell ==2) {
          $du_name = $data;
        }
        elseif ($cell == 3) {
          $contractNo = $data;
        }
        else {
          $customer_po = $data;
        }
      }
      // exclude the first column header row
      if ($row != 0) {
        $total += 1;
        $totalAll += 1;
        $sql = "INSERT INTO contract VALUES ('$sn', '$du_id', '$du_name', '$contractNo', '$customer_po');";
        $sqlList = $sqlList . $sql;
        // run the query when there are 50 queries in the string
        if ($total >= 50) {
          $result = insertValue($sqlList);
          $total = 0;
          $sqlList = "";
        }
      }
    }
    $result = insertValue($sqlList);

    sleep(2);

    $_SESSION['imported'] = true;

    header('Location: contract.php');
  }
 ?>
