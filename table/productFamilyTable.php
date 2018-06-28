<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Auto Filling</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </head>
  <body>
    <table class='table table-stripped table-bordered'>
      <tr>
          <th>No</th>
          <th>Standard Type</th>
          <th>ID</th>
          <th>LEVEL1_AREA</th>
          <th>LEVEL2_FAMILY</th>
          <th>LEVEL3_PRODUCT</th>
          <th>PRODUCT_CODE</th>
          <th>SERVICE_PRODUCT_CODE</th>
      </tr>
      <?php
        include '../functions/dbConnect.php';
        $sql = "SELECT * FROM procurement";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          $num = 1;
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $num . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['level1_area'] . "</td>";
            echo "<td>" . $row['level2_family'] . "</td>";
            echo "<td>" . $row['level3_product'] . "</td>";
            echo "<td>" . $row['product_code'] . "</td>";
            echo "<td>" . $row['service_product_code'] . "</td>";
            echo "</tr>";
            $num += 1;
          }
        }
      ?>
    </table>
  </body>
</html>
