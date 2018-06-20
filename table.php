<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Auto Filling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
  <body>
    <table class='table table-stripped table-bordered'>
      <tr>
          <th>No</th>
          <th>Sn</th>
          <th>DU ID</th>
          <th>DU Name</th>
          <th>Huawei Contract No</th>
          <th>Customer PO No</th>
      </tr>
      <?php
        include 'dbConnect.php';
        $sql = "SELECT * FROM contract";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          $num = 1;
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $num . "</td>";
            echo "<td>" . $row['sn'] . "</td>";
            echo "<td>" . $row['du_id'] . "</td>";
            echo "<td>" . $row['du_name'] . "</td>";
            echo "<td>" . $row['contractNo'] . "</td>";
            echo "<td>" . $row['customer_po'] . "</td>";
            echo "</tr>";
            $num += 1;
          }
        }
      ?>
    </table>

  </body>
</html>
