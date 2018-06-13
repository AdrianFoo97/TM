<?php
  // Object Class for product
  Class Product {
    function Product($type) {
      $this->setVariable($this->getProduct($type));
    }

    // function to get product details (procurement)
    function getProduct ($type) {
      include 'dbConnect.php';
      $sql = "SELECT * FROM procurement WHERE type='$type'";
      $subprojectCode = "no Result";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            return($row);
        }
      }
    }

    // function to set the inner variable
    function setVariable($row) {
      $this->lvl1 = $row['level1_area'];
      $this->lvl2 = $row['level2_family'];
      $this->lvl3 = $row['level3_product'];
      $this->product = $row['product_code'];
      $this->service = $row['service_product_code'];
    }
  }

  // $product1 = new Product("TI");
  // echo $product1->lvl1 . "<br>";
  // echo $product1->lvl2 . "<br>";
  // echo $product1->lvl3 . "<br>";
  // echo $product1->product . "<br>";
  // echo $product1->service . "<br>";
?>
