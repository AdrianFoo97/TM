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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      table td input, table td select {
       width: 100%;
      }
      th {
        text-align: center;
      }
      #addBtn {
        position:fixed;
        right:2em;
        bottom:2em;
        width: 3.5em;
        height: 3.5em;
        padding: 10px 16px;
        font-size: 18px;
        line-height: 1.33;
        border-radius: 50%;;
        -webkit-transition: all 0.3s ease-in-out;
      }
      #addBtn:hover {
        -webkit-transform: scale(1.1);
      }
    </style>
    <script>
      $(document).ready(function(){
          $("#addBtn").click(function(){
              var num = document.getElementById('num').innerHTML;
              var newNum = Number(num);
              var subconOption = <?php
                include 'function2.php';
                // get the subcontractor from database
                $subconArray = getSubcon();
                echo "\"<option style='display:none;' selected>Select supplier</option>";
                for ($j=0; $j<sizeof($subconArray); $j++) {
                    // echo $subconArray[$i];
                    echo "<option value='" . $subconArray[$j] . "'>" .
                    $subconArray[$j] . "</option>";
                  }
                echo "\";";
               ?>
                // get the scenario form database
               var scnearioOption = <?php
                 $scenarioArray = getScenario();
                 echo "\"<option style='display:none;' selected>Select scenario</option>";
                 for ($j=0; $j<sizeof($scenarioArray); $j++) {
                     // echo $subconArray[$i];
                     echo "<option value='" . $scenarioArray[$j] . "'>" .
                     $scenarioArray[$j] . "</option>";
                   }
                 echo "\";";
              ?>
              var color = "";
              if (newNum%2 == 0) {
                color = " bgcolor='#F2F2F2'";
              }
              $("table").append(" <tr" + color + "><td align='center'>" + num + "</td><td><input type='text' name='duID" + newNum + "' class='form-control'>" +
                "</td><td><select class='form-control' name='subcon" + newNum + "'>" + subconOption +
                "</select></td><td><select class='form-control' name='scenario" + newNum + "' class='form-control'>" + scnearioOption +
                "</select></td></tr>");
              newNum += 1;
              document.getElementById('num').innerHTML = newNum;
              var test = "duID" + (newNum - 1);
              console.log(test);
              var elmnt = document.getElementById("btnDiv");
              elmnt.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
          });
      });
    </script>
    <script>
        function submitForm() {
          var total = document.getElementById("num").innerHTML;
          document.getElementsByName("amount")[0].setAttribute("value", total-1);
          document.getElementById("myForm").submit();
        }
    </script>
  </head>
  <body>
    <!-- nav bar -->
    <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
      <div class='container'>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">PR Template<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contract.php">Maintain Contract</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end of navbar -->

    <div class='container'>
      <div class='row'>
        <div class='col-sm-12'?>
            <!--
            <button class='btn' id='addBtn'><i class="fa fa-plus"></i></button><br>
            -->
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
                      <th width=24%>DU ID</th>
                      <th width=24%>Sales Contract</th>
                      <th width=24%>Subcontractor</th>
                      <th width=24%>Scenario</th>
                    </tr>
                    <?php
                      $subconArray = getSubcon();
                      $scenarioArray = getScenario();

                      $duIDGet = trim($_POST['duID'], "\n");
                      $duID = explode("\n", $duIDGet);
                      if(!isset($_SESSION['rowNo'])) {
                        $_SESSION['rowNo'] = 1;
                      }
                      for ($i=$_SESSION['rowNo']; $i<=sizeof($duID); $i++) {
                        $contract = getContractNo(trim($duID[$i-1]));
                        // start of a table row
                        echo "<tr>";
                          // No. column
                          echo "<td align='center'>$i</td>";
                          echo "<td>
                                  <input class='form-control' type='text' name='duID" . $i .
                                  "' value='" . $duID[$i-1] .
                                "' readonly></td>";
                          // Sales Contract column
                          echo "<td><select class='form-control' name='contractNo" . $i . "'>
                                    <option style='display:none;' selected value=''>Select contract No</option>";
                          for ($j=0; $j<sizeof($contract); $j++) {
                            echo "<option value='" . $contract[$j] . "'>" . $contract[$j] . "</option>";
                          }
                          echo "</select></td>";
                          // Subcontractor column
                          echo "<td>
                                  <select class='form-control' name='subcon" . $i . "'>
                                    <option style='display:none;' value='' selected>Select supplier</option>";
                          for ($j=0; $j<sizeof($subconArray); $j++) {
                              // echo $subconArray[$i];
                              echo "<option value='" . $subconArray[$j] . "'>" .
                              $subconArray[$j] . "</option>";
                            }
                          echo   "</select>
                              </td>";
                        // Type column
                        echo "<td>
                                <select class='form-control' name='scenario" . $i . "'>
                                  <option style='display:none;' value='' selected>Select scenario</option>";
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
                  <div id='btnDiv' style='text-align: center;'>
                    <button class='btn btn-default' onclick='submitForm()'>Export</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>

  </body>
</html>
