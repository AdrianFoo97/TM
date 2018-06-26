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
        <div class='offset-sm-2 col-sm-8 card' style='margin-top: 5%; height: 800px;'>
          <div style='text-align: center; margin-top:7%;'>
            <h1>PR-Template Tool</h1>
          </div>
          <table border='0' style='margin-top: 5%'>
            <form action='fillForm.php' method='post'>
              <!-- Scenario input -->
              <tr>
                <td align=right width='30%' height=70><label>Type:&nbsp;</label></td>
                <td width='50%'>
                  <select class='form-control' name='type'>
                    <!--
                    <option value='CME'>CME</option>
                    <option value='CME-F'>Fiber</option>
                    <option value='Microwave'>Microwave (TX)</option>
                    <option value='RF'>RF</option>
                    -->
                    <option value='TI'>TI</option>
                    <!--
                    <option value='TSSR'>TSSR</option>
                    -->
                  </select>
                </td>
                <td width='10%'></td>
              </tr>
              <!-- requstorID input -->
              <tr>
                <td align=right height=70><label>Requestor ID:&nbsp;</label></td>
                <td><input type='text' name='requestorID' class='form-control'></td>
              </tr>
              <!-- Approver input -->
              <tr>
                <td align=right height=70><label>PR Approver ID:&nbsp;</label></td>
                <td><input type='text' name='approvalID' class='form-control'></td>
              </tr>
              <!-- ProjectCode input -->
              <tr>
                <td align=right height=70><label>Project Code:&nbsp;</label></td>
                <td><input type='text' name='projectCode' value='5622128' class='form-control'></td>
              </tr>
              <!-- Department code input -->
              <tr>
                <td align=right height=70><label>Department Code:&nbsp;</label></td>
                <td><input type='text' name='departmentCode' class='form-control'></td>
              </tr>
              <!-- Tender ID input-->
              <tr>
                <td align=right height=70><label>Tender ID:&nbsp;</label></td>
                <td><input type='text' name='tenderID' class='form-control'></td>
              </tr>
              <!-- DU ID input -->
              <tr>
                <td align=right valign='top'>DU ID:&nbsp;</td>
                <td>
                  <div class='form-group'>
                    <textarea rows='5' name='duID' class='form-control'></textarea>
                  </div>
                </td>
              </tr>
              <tr>
                <td align=center colspan='3' height=80>
                  <button type=submit class='btn btn-default' style='height:3em; width:6em;'>Next</button>
                </td>
              </tr>
            </form>
          </table>
      </div>
    </div>
  </body>
</html>
