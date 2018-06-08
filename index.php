<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Auto Filling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
    .card {
        /* Add shadows to create the "card" effect */
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }
    table td input, table td select, table td textarea {
     width: 80%;

    }
    </style>
  </head>
  <body>
    <div class='container'>
      <div class='row'>
        <div class='offset-sm-2 col-sm-8 card' style='margin-top: 10%; height: 80%;'>
          <div style='text-align: center; margin-top:10%;'>
            <h1>PR-Template Tool</h1>
          </div>
          <table border='0' style='margin-top: 5%' class='table'>
            <form action='fillForm.php' method='post'>
              <!-- Scenario input -->
              <tr>
                <td align=right width='30%' height=70><label>Scenario:&nbsp;</label></td>
                <td width='70%'>
                  <select>
                    <option value='CME'>CME</option>
                    <option value='CME-F'>CME-Fiber</option>
                    <option value='Microwave'>Microwave</option>
                    <option value='RF'>RF</option>
                    <option value='TI'>TI</option>
                    <option value='TSSR'>TSSR</option>
                  </select>
                </td>
              </tr>
              <!-- requstorID input -->
              <tr>
                <td align=right height=70><label>Requestor ID:&nbsp;</label></td>
                <td><input type='text' name='requestorID'></td>
              </tr>
              <!-- Approver input -->
              <tr>
                <td align=right height=70><label>PR Approver ID:&nbsp;</label></td>
                <td><input type='text' name='approvalID'></td>
              </tr>
              <!-- ProjectCode input -->
              <tr>
                <td align=right height=70><label>Project Code:&nbsp;</label></td>
                <td><input type='text' name='approvalID' value='5622128'></td>
              </tr>
              <!-- Department code input -->
              <tr>
                <td align=right height=70><label>Department Code:&nbsp;</label></td>
                <td><input type='text' name='departmentCode'></td>
              </tr>
              <!-- Tender ID input-->
              <tr>
                <td align=right height=70><label>Tender ID:&nbsp;</label></td>
                <td><input type='text' name='tenderID'></td>
              </tr>
              <!-- DU ID input -->
              <tr>
                <td align=right valign='top'>DU ID:&nbsp;</td>
                <td><textarea rows='5' name='duID' class='form-group'></textarea></td>
              </tr>
              <tr>
                <td align=center colspan='2' height=100>
                  <button type=submit class='btn btn-default' style='height:3em; width:6em;'>Next</button>
                </td>
              </tr>
            </form>
          </table>

      </div>
    </div>
  </body>
</html>
