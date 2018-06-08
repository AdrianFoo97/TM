<?php
  include 'function.php';
  echo $_POST['type'];
  echo "<br>";
  echo $_POST['requestorID'];
  echo "<br>";
  echo $_POST['approvalID'];
  echo "<br>";
  echo $_POST['projectCode'];
  echo "<br>";
  echo $_POST['departmentCode'];
  echo "<br>";
  echo $_POST['tenderID'];
  echo "<br>";
  echo $_POST['duID'];
  echo "<br>";
  echo "<br>";

  $duIDGet = trim($_POST['duID'], "\n");
  $duIDArray = explode("\n", $duIDGet);

  foreach ($duIDArray as $duID) {
    $region = getRegion($duID);
    echo $region;
  }

  echo "<br>";
  echo "<br>";
  echo "<br>";

  $str = getSubprojectCode("RAN", "Central");
  echo "subproject code: " . $str. "<br>";
  $str = getSubprojectCode("RAN", "Southern");
  echo "subproject code: " . $str . "<br>";
  $str = getSubprojectCode("TX", "Northern");
  echo "subproject code: " . $str . "<br>";
?>
