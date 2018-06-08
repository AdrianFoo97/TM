<?php
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
?>
