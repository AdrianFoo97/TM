<?php
  // object class for PR
  class PR {
    private $issuance, $product, $procurement;

    public function PR($issuance, $procurement, $product, $departmentCode, $tenderID) {
      $this->setIssuance($issuance);
      $this->setProcurement($procurement);
      $this->setProduct($product);
      $this->departmentCode = $departmentCode;
      $this->tenderID = $tenderID;
    }

    private function setProcurement(Procurement $procurementIn) {
      $this->procurement = $procurementIn;
    }

    public function getProcurement() {
      return $this->procurement;
    }

    private function setIssuance(Issuance $issuanceIn) {
      $this->issuance = $issuanceIn;
    }

    public function getIssuance() {
      return $this->issuance;
    }

    private function setProduct(Product $productIn) {
      $this->product = $productIn;
    }

    public function getProduct() {
      return $this->product;
    }

    public function getDepartmentCode() {
      return $this->departmentCode;
    }

    public function getTenderID() {
      return $this->tenderID;
    }
  }

  // $Issuance1 = new Issuance("123", "approvalID", "subcon", "region", "projectCode", "subProjectCode", "contract", "duID");
  // $product1 = new Product("TI");
  //
  //  $PR1 = new PR($Issuance1, $product1, "departmentCode", "tenderID");
  //  var_dump($PR1->getIssuance());
  //  echo "<br>";
  //  var_dump($PR1->getProduct());
  //  echo "<br>";
  //  var_dump($PR1->getDepartmentCode());
  //  echo "<br>";
  //  var_dump($PR1->getTenderID());
  //  echo "<br>";
?>
