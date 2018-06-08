<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Auto Filling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
      table td input, table td select {
       width: 100%;
      }
      th {
        text-align: center;
      }
    </style>
    <script>
      $(document).ready(function(){
          $("#addBtn").click(function(){
              var num = document.getElementById('num').innerHTML;
              var newNum = Number(num);
              $("table").append(" <tr><td align='center'>" + num + "</td><td><input type='text' name='duID" + newNum + "' class='form-control'>" +
                "</td><td><select class='form-control' name='subcon" + newNum + "'><option value='CME'>CME</option><option value='CME-F'>CME-Fiber</option>" +
                "<option value='Microwave'>Microwave</option><option value='RF'>RF</option><option value='TI'>" +
                "TI</option><option value='TSSR'>TSSR</option>" +
                "</select></td><td><input type='text' name='item" + newNum + "' class='form-control'></td></tr>");
              newNum += 1;
              document.getElementById('num').innerHTML = newNum;
              var test = "duID" + (newNum - 1);
              console.log(test);
              var elmnt = document.getElementsByName("duID" + (newNum - 1))[0];
              elmnt.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
          });
      });
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
                <table border='0' width='100%' class='table table-striped table-bordered'>
                  <tr>
                    <th width=5%>No.</th>
                    <th width=30%>DU ID</th>
                    <th width=30%>Subcontractor</th>
                    <th width=30%>Type</th>
                  </tr>
                  <?php
                    $duIDGet = trim($_POST['duID'], "\n");
                    $duID = explode("\n", $duIDGet);
                    if(!isset($_SESSION['rowNo'])) {
                      $_SESSION['rowNo'] = 1;
                    }
                    for ($i=$_SESSION['rowNo']; $i<sizeof($duID); $i++) {
                      echo "
                        <tr>
                          <td align='center'>$i</td>
                          <td><input class='form-control' type='text' name='duID" . $i .
                          "' value='" . $duID[$i] .
                          "'</td></td>
                          <td><select class='form-control' name='subcon" . $i . "'>
                            <option value='CME'>CME</option>
                            <option value='CME-F'>CME-Fiber</option>
                            <option value='Microwave'>Microwave</option>
                            <option value='RF'>RF</option>
                            <option value='TI'>TI</option>
                            <option value='TSSR'>TSSR</option>
                          </select></td>
                          <td><input class='form-control' type='text' name='item" . $i . "'></td>
                        </tr>
                      ";
                      $_SESSION['rowNo']++;
                    }
                    echo "<p id='num' hidden>" . $_SESSION['rowNo'] . "</p>";
                  ?>
                </table>
              </div>
            </div>

          </div>
      </div>
    </div>
  </body>
</html>
