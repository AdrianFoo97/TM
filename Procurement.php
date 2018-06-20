<?php
  class Procurement {
    function Procurement($itemID, $subcon) {
      $this->itemID = $itemID;
      $this->subcon = $subcon;
      $this->setAttribute($itemID, $subcon);
    }

    function setAttribute($itemID, $subcon) {
      //-------------------------------------
      $subcon = "ALL";
      $this->subcon = $subcon;
      //--------------------------------------
      include 'dbConnect.php';
      $sql = "SELECT * FROM bpa WHERE itemID='$itemID'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $this->commodity = $row['commodity'];
            $this->subgroup = $row['subgroup'];
            $this->classification = $row['classification'];
            $this->description = $row['description'];
            $this->uom = $row['uom'];
        }
      }
      else {
        $this->commodity = "Not found";
        $this->subgroup = "Not found";
        $this->classification = "Not found";
        $this->description = "Not found";
        $this->uom = "Not found";
      }
    }
  }

  // $procurement = new Procurement("88124XSX", "a");
  //
  // echo $procurement->itemID;
  // echo "<br>";
  // echo $procurement->subcon;
  // echo "<br>";
  // echo $procurement->commodity;
  // echo "<br>";
  // echo $procurement->subgroup;
  // echo "<br>";
  // echo $procurement->classification;
  // echo "<br>";
  // echo $procurement->description;
  // echo "<br>";
  // echo $procurement->uom;
  // echo "<br>";

 ?>
