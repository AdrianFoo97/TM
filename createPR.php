<?php
  session_start();
  include 'object/Issuance.php';
  include 'object/Product.php';
  include 'object/PR.php';
  include 'object/Procurement.php';
  include 'functions/createExcel.php';

  $prArray = array();

  // Loop to create PR object according to the number pass in
  for ($i=1; $i<=$_POST['amount']; $i++) {
    global $type, $requestorID, $approvalID, $projectCode;
    global $tenderID, $departmentCode;

    $contract = 'contractNo' . $i;
    $subcon = 'subcon' . $i;
    $duID = 'duID' . $i;
    $item = 'item' . $i;
    $scenario = 'scenario' . $i;

    $lineItems = array();
    include 'functions/dbConnect.php';

    if (strtolower($subcon) == "quantum") {
      $sql = "SELECT lineID FROM line_item WHERE type='$_POST[$scenario]' AND
              subcontractor='Quantum'";
    }
    else {
      $sql = "SELECT lineID FROM line_item WHERE type='$_POST[$scenario]' AND
              subcontractor='All'";
    }

    $result = $conn->query($sql);
    $scenarioArray = array();

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          array_push($lineItems, $row['lineID']);
      }
    }

    getVariable();

    // create 'issuance' object
    $issuance = new Issuance($GLOBALS['requestorID'], $GLOBALS['approvalID'],
    $_POST[$subcon], $GLOBALS['projectCode'], $_POST[$contract],
    $_POST[$duID], $GLOBALS['type']);


//--------------------------------------------------------------

    $GLOBALS['type'] = "TI";

//--------------------------------------------------------------

    // create 'product' object
    $product = new Product($GLOBALS['type']);

    for ($j=0; $j<sizeof($lineItems); $j++) {
        $procurement = new Procurement($lineItems[$j], $_POST[$subcon]);

        $PR = new PR($issuance, $procurement, $product, $GLOBALS['departmentCode'],
              $GLOBALS['tenderID']);
        // var_dump($prArray[$j]);

        array_push($prArray, $PR);
    }
  }

  createExcel($prArray);

  for ($x=0; $x<sizeof($prArray); $x++) {
    var_dump($prArray[$x]);
    echo "<br><br>";
  }

  // function to get the session which is entered from the
  function getVariable() {
    if(isset($_SESSION['partial'])) {
      foreach($_SESSION['partial'] as $x => $value) {
        if ($x == "type") {
          $GLOBALS['type'] = $value;
        }
        elseif ($x == "requestorID") {
          $GLOBALS['requestorID'] = $value;
        }
        elseif ($x == "approvalID") {
          $GLOBALS['approvalID'] = $value;
        }
        elseif ($x == "projectCode") {
          $GLOBALS['projectCode'] = $value;
        }
        elseif ($x == "departmentCode") {
          $GLOBALS['departmentCode'] = $value;
        }
        elseif ($x == "tenderID") {
          $GLOBALS['tenderID'] = $value;
        }
      }
    }
    else {
      echo "session 'partial' not set";
    }
  }

 ?>
