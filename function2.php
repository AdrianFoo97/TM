<?php
function getSubcon() {
  include 'dbConnect.php';
  $sql = "SELECT * FROM subcon_ti";
  $result = $conn->query($sql);
  $subconArray = array();

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($subconArray, $row['supplier']);
    }
    sort($subconArray);
  }
  return $subconArray;
}

function getScenario() {
  include 'dbConnect.php';
  $sql = "SELECT DISTINCT type FROM line_item";
  $result = $conn->query($sql);
  $scenarioArray = array();

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($scenarioArray, $row['type']);
    }
    sort($scenarioArray);
  }
  return $scenarioArray;
}
?>
