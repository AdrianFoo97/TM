<?php
// function to get all the subcontractor
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
// function to get all the scenario
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
// function to get the contractNo based on 'duID' input
function getContractNo($duID) {
  include 'dbConnect.php';
  $sql = "SELECT contractNo FROM contract WHERE du_ID='$duID'";
  $result = $conn->query($sql);
  $duIDArray = array();
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($duIDArray, $row['contractNo']);
    }
    sort($duIDArray);
  }
  else {
    array_push($duIDArray, "Not found");
  }
  return $duIDArray;
}
// function to insert value into the 'contract' table
function insertValue($sql) {
  include 'dbConnect.php';
  $result = $conn->multi_query($sql);
  return $result;
}
// function to delete data in 'contract' table
function deleteData(){
  include 'dbConnect.php';
  $sql = "DELETE FROM contract ";
  $result = $conn->query($sql);
  return $result;
}

function getContractCount() {
  include 'dbConnect.php';
  $sql = "SELECT COUNT(*) AS total FROM contract";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $count = $row['total'];
    }
  }
  return $count;
}
?>
