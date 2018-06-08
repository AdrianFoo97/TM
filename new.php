<?php
  $duIDGet = $_POST['duID'];
  echo gettype($_POST['duID']);
  $duID = explode("\n", $duIDGet);
  echo gettype($duID);
  print_r(explode("\n", $duIDGet));

?>
