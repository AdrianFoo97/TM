<?php
  // Object class for Issuance
  class Issuance {
    public $region;
    // Constructor for Issuance Object
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
      include './functions/dbConnect.php';
      if ($type == "TI") {
        $type = "TI (RAN)";
      }
      $sql = "SELECT code FROM subproject WHERE type='$type' AND
              region = '$region'";
      $subprojectCode = $type;
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
?>
