<?php
/*
  This file contains functions that are required to retrieve data from
  database
*/

// function to get all the subcontractor
function getSubcon() {
  $sql = "SELECT * FROM subcon_ti";
  $result = runQuery($sql);
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
  $sql = "SELECT DISTINCT type FROM line_item";
  $result = runQuery($sql);
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

// function to delete data in 'contract' table
function deleteData($tableName){
  $sql = "DELETE FROM " . $tableName;
  $result = runQuery($sql);
  return $result;
}

function getCount($tableName) {
  $sql = "SELECT COUNT(*) AS total FROM " . $tableName;
  $result = runQuery($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $count = $row['total'];
    }
  }
  return $count;
}

function getSubprojectCount() {
  $sql = "SELECT COUNT(*) AS total FROM subproject";
  $result = runQuery($sql);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $count = $row['total'];
    }
  }
  return $count;
}

// function to run single query
function runQuery($sql) {
  include 'dbConnect.php';
  $result = $conn->query($sql);
  return $result;
}

// function to run more than one query in a string
function runMultiQuery($sql) {
  include 'dbConnect.php';
  $result = $conn->multi_query($sql);
  return $result;
}
?>
