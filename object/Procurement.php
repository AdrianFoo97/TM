<?php
  // Object class for Procurement
  class Procurement {
    function Procurement($itemID, $subcon) {
      $this->itemID = $itemID;
      $this->subcon = $subcon;
      $this->setAttribute($itemID, $subcon);
    }
    // Set the procurement attributes according to itemID and subcon
    function setAttribute($itemID, $subcon) {
      //-------------------------------------
      $subcon = "ALL";
      $this->subcon = $subcon;
      //--------------------------------------
      include './functions/dbConnect.php';
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
 ?>
