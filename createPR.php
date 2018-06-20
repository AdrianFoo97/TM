<?php
  session_start();
  include 'Issuance.php';
  include 'Product.php';
  include 'PR.php';
  include 'Procurement.php';
  include 'createExcel.php';

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

    // echo $_POST[$scenario] . "<br>";
    // echo "<br>";

    $lineItems = array();
    include 'dbConnect.php';

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
      // output data of each row
      while($row = $result->fetch_assoc()) {
          array_push($lineItems, $row['lineID']);
          // echo $row['lineID'] . "<br>";
      }
    }

    getVariable();

    // create 'issuance' object
    $issuance = new Issuance($GLOBALS['requestorID'], $GLOBALS['approvalID'],
    $_POST[$subcon], $GLOBALS['projectCode'], $_POST[$contract],
    $_POST[$duID], $GLOBALS['type']);
    // create 'product' object

//--------------------------------------------------------------

    $GLOBALS['type'] = "TI";

//--------------------------------------------------------------

    $product = new Product($GLOBALS['type']);

    // echo $issuance->requestorID . "<br>";
    // echo $issuance->approvalID . "<br>";
    // echo $issuance->subcon . "<br>";
    // echo $issuance->region . "<br>";
    // echo $issuance->projectCode . "<br>";
    // echo $issuance->subProjectCode . "<br>";
    // echo $issuance->contract . "<br>";
    // echo $issuance->duID . "<br>";
    // echo $issuance->type . "<br>";
    // echo "<br><br>";
    //
    // echo $product->lvl1 . "<br>";
    // echo $product->lvl2 . "<br>";
    // echo $product->lvl3 . "<br>";
    // echo $product->product . "<br>";
    // echo $product->service . "<br>";
    // echo "<br><br>";

    // create 'PR' object using issuance and product

    for ($j=0; $j<sizeof($lineItems); $j++) {
        $procurement = new Procurement($lineItems[$j], $_POST[$subcon]);

        $PR = new PR($issuance, $procurement, $product, $GLOBALS['departmentCode'],
              $GLOBALS['tenderID']);
        // var_dump($prArray[$j]);

        array_push($prArray, $PR);
    }


     // var_dump($PR->getIssuance());
     // echo "<br>";
     // var_dump($PR->getProduct());
     // echo "<br>";
     // var_dump($PR->getDepartmentCode());
     // echo "<br>";
     // var_dump($PR->getTenderID());
     // echo "<br><br><br>";
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
        //echo "Key=" . $x . ", Value=" . $value;
        //echo "<br>";
      }
    }
    else {
      echo "session 'partial' not set";
    }
  }

 ?>
