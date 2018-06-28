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
          <th>Subcontractor</th>
          <th>item</th>
          <th>Commodity</th>
          <th>Subgroup</th>
          <th>Classification</th>
          <th>Description</th>
          <th>UOM</th>
      </tr>
      <?php
        include '../functions/dbConnect.php';
        $sql = "SELECT * FROM ti_bpa";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          $num = 1;
          while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $num . "</td>";
            echo "<td>" . $row['subcontractor'] . "</td>";
            echo "<td>" . $row['itemID'] . "</td>";
            echo "<td>" . $row['commodity'] . "</td>";
            echo "<td>" . $row['subgroup'] . "</td>";
            echo "<td>" . $row['classification'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['uom'] . "</td>";
            echo "</tr>";
            $num += 1;
          }
        }
      ?>
    </table>
  </body>
</html>
