<?php
include 'functions/writeHTML.php';
?>
<!DOCTYPE>
<html>
<head>
  <?php writeHeadElements(); ?>
  <style>
  .card {
    /* Add shadows to create the "card" effect */
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  }
  table td input, table td select, table td textarea {
    width: 80%;

  }
  td {
    height: 4.5em;
  }
  </style>
</head>
<body>
  <!-- nav bar -->
  <?php writeNavbar("index"); ?>
  <!-- end of navbar -->
  <div class='container'>
    <div class='row'>
      <div class='offset-sm-2 col-sm-8 card' style='margin-top: 5%; height: 800px;'>
        <div style='text-align: center; margin-top:7%;'>
          <h1>PR-Template Tool</h1>
        </div>
        <!-- table to organize the form input -->
        <table border='0' style='margin-top: 5%;'>
          <form action='fillForm.php' method='post' class='form-responsive'>
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
          <td align=right><label>Requestor ID:&nbsp;</label></td>
          <td><input type='text' name='requestorID' class='form-control'></td>
        </tr>
        <!-- Approver input -->
        <tr>
          <td align=right><label>PR Approver ID:&nbsp;</label></td>
          <td><input type='text' name='approvalID' class='form-control'></td>
        </tr>
        <!-- ProjectCode input -->
        <tr>
          <td align=right><label>Project Code:&nbsp;</label></td>
          <td><input type='text' name='projectCode' value='5622128' class='form-control'></td>
        </tr>
        <!-- Department code input -->
        <tr>
          <td align=right><label>Department Code:&nbsp;</label></td>
          <td><input type='text' name='departmentCode' class='form-control'></td>
        </tr>
        <!-- Tender ID input-->
        <tr>
          <td align=right><label>Tender ID:&nbsp;</label></td>
          <td><input type='text' name='tenderID' class='form-control'></td>
        </tr>
        <!-- DU ID input -->
        <tr>
          <td align=right valign='top'>DU ID:&nbsp;<br>(separate with enter)</td>
          <td>
            <div class='form-group'>
              <textarea rows='5' name='duID' class='form-control'
              placeholder="S1234&#10;S1234&#10;S1234" onfocus="this.placeholder=''"
              onblur="this.placeholder='S1234\nS1234\nS1234'"></textarea>
            </div>
          </td>
        </tr>
        <!-- submit button -->
        <tr>
          <td align=center colspan='3' height=80>
            <button type=submit class='btn btn-default' style='height:3em; width:6em;'>Next</button>
          </td>
        </tr>
      </form>
    </table>
  </div>
</div>
<?php writeScript() ?>
</body>
</html>
