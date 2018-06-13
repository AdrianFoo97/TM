<?php
  // Object class for Issuance
  class Issuance {
    public $region;

    function Issuance($requestorID, $approvalID, $subcon, $projectCode,
                      $contract, $duID, $type) {
      $this->requestorID = $requestorID;
      $this->approvalID = $approvalID;
      $this->subcon = $subcon;
      $this->region = $this->getRegion($duID);
      $this->projectCode = $projectCode;
      $this->subProjectCode = $this->getSubprojectCode($type, $this->region);
      $this->contract = $contract;
      $this->duID = $duID;
      $this->type = $type;
    }

    // function to get region based on the DUID
    function getRegion($duID) {
      $firstChar = substr(strtoupper($duID), 0, 1);
      $region = "No region";
      if ($firstChar == "S") {
        $region = "Southern";
      }
      else if ($firstChar == "N") {
        $region = "Northern";
      }
      else if ($firstChar == "C") {
        $region = "Central";
      }
      else if ($firstChar == "E") {
        $region = "East Coast";
      }
      return $region;
    }

    // function to get subproject code based on type and region
    function getSubprojectCode($type, $region) {
      include 'dbConnect.php';
      $name = "2018 TM LTE Project " . $type;
      $sql = "SELECT code FROM subproject WHERE name='$name' AND
              region = '$region'";
      $subprojectCode = "no Result";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $subprojectCode = $row['code'];
        }
      }
      return $subprojectCode;
    }
  }

  // $Issuance1 = new Issuance("N123", "approvalID", "subcon", "projectCode", "contract", "N100", "TX");
  //
  // echo $Issuance1->requestorID . "<br>";
  // echo $Issuance1->approvalID . "<br>";
  // echo $Issuance1->subcon . "<br>";
  // echo $Issuance1->region . "<br>";
  // echo $Issuance1->projectCode . "<br>";
  // echo $Issuance1->subProjectCode . "<br>";
  // echo $Issuance1->contract . "<br>";
  // echo $Issuance1->duID . "<br>";
  // echo $Issuance1->type . "<br>";
?>
