<?php
  session_start();
  $_SESSION['partial'] = array("type"=> $_POST['type'], "requestorID"=>$_POST['requestorID'],
  "approvalID"=>$_POST['approvalID'], "projectCode"=>$_POST['projectCode'],
  "departmentCode"=>$_POST['departmentCode'], "tenderID"=>$_POST['tenderID']);

  // foreach($_SESSION['partial'] as $x => $x_value) {
  //   echo "Key=" . $x . ", Value=" . $x_value;
  //   echo "<br>";
  // }
?>
<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Auto Filling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/myScript.js"></script>
    <style>
      table td input, table td select {
       width: 100%;
      }
      th {
        text-align: center;
      }
    </style>
    <script>
        function submitForm() {
          var total = document.getElementById("num").innerHTML;
          document.getElementsByName("amount")[0].setAttribute("value", total-1);
          document.getElementById("myForm").submit();
        }
    </script>
  </head>
  <body>
    <div class='container'>
      <div class='row'>
        <div class='col-sm-12'?>
            <button class='btn btn-default' id='addBtn'>Add Row</button><br>
        </div>
      </div><br>
      <div class='row'>
          <div class='col-sm-12'?>
            <div class='panel panel-default'>
              <div class='panel-body' style='padding: 0px'>
                <form  id='myForm' action='createPR.php' method='post'>
                  <table border='0' width='100%' class='table table-striped table-bordered'>
                    <tr>
                      <th width=5%>No.</th>
                      <th width=30%>DU ID</th>
                      <th width=30%>Subcontractor</th>
                      <th width=30%>Type</th>
                    </tr>
                    <?php
                      include 'function2.php';
                      $subconArray = getSubcon();
                      $scenarioArray = getScenario();

                      $duIDGet = trim($_POST['duID'], "\n");
                      $duID = explode("\n", $duIDGet);
                      if(!isset($_SESSION['rowNo'])) {
                        $_SESSION['rowNo'] = 1;
                      }
                      for ($i=$_SESSION['rowNo']; $i<=sizeof($duID); $i++) {
                        echo "<tr>";
                          echo "<td align='center'>$i</td>";
                          echo "<td>
                                  <input class='form-control' type='text' name='duID" . $i .
                                  "' value='" . $duID[$i-1] .
                                "'</td>";
                          echo "<td>
                                  <select class='form-control' name='subcon" . $i . "'>
                                    <option style='display:none;' selected>Select supplier</option>";
                          for ($j=0; $j<sizeof($subconArray); $j++) {
                              // echo $subconArray[$i];
                              echo "<option value='" . $subconArray[$j] . "'>" .
                              $subconArray[$j] . "</option>";
                            }
                          echo   "</select>
                              </td>";
                        echo "<td>
                                <select class='form-control' name='subcon" . $i . "'>
                                  <option style='display:none;' selected>Select scenario</option>";
                        for ($j=0; $j<sizeof($scenarioArray); $j++) {
                            // echo $subconArray[$i];
                            echo "<option value='" . $scenarioArray[$j] . "'>" .
                            $scenarioArray[$j] . "</option>";
                          }
                        echo  "</select>
                              </td>";
                        echo "</tr>";
                        $_SESSION['rowNo']++;
                      }
                      echo "<p id='num' hidden>" . $_SESSION['rowNo'] . "</p>";
                      echo "<input name='amount' value='" . ((int)$_SESSION['rowNo']-1) . "' hidden>";
                      unset($_SESSION['rowNo']);
                    ?>
                  </table>
                  <div style='text-align: center;'>
                    <button class='btn btn-default' onclick='submitForm()'>Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

  </body>
</html>
