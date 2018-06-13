<?php
  require 'vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  function createExcel($prArray) {
    include 'function.php';
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    foreach (range('A', 'Z') as $columnID) {
      $sheet->getColumnDimension($columnID)->setAutoSize(true);
      $sheet->getStyle($columnID)->getAlignment()->
      setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    }

    setExcelColumn($sheet);

    for ($x=0; $x<sizeof($prArray); $x++) {
      $rowNum = $x + 5;
      echo $rowNum;

      $sheet->setCellValue('A' . $rowNum, $x + 1);
      $sheet->setCellValue('B' . $rowNum, $prArray[$x]->getIssuance()->requestorID);
      $sheet->setCellValue('C' . $rowNum, $prArray[$x]->getIssuance()->approvalID);
      $sheet->setCellValue('D' . $rowNum, $prArray[$x]->getIssuance()->subcon);
      $sheet->setCellValue('E' . $rowNum, $prArray[$x]->getIssuance()->region);
      // $sheet->setCellValue('F' . $rowNum,);
      $sheet->setCellValue('G' . $rowNum, $prArray[$x]->getIssuance()->projectCode);
      $sheet->setCellValue('H' . $rowNum, $prArray[$x]->getIssuance()->subProjectCode);
      // $sheet->setCellValue('I' . $rowNum,);
      $sheet->setCellValue('J' . $rowNum, $prArray[$x]->getIssuance()->duID);
      // $sheet->setCellValue('K' . $rowNum,);
      // $sheet->setCellValue('L' . $rowNum,);
      // $sheet->setCellValue('M' . $rowNum,);
      // $sheet->setCellValue('N' . $rowNum,);
      // $sheet->setCellValue('O' . $rowNum,);
      // $sheet->setCellValue('P' . $rowNum,);
      $sheet->setCellValue('Q' . $rowNum, "1");
      $sheet->setCellValue('R' . $rowNum, $prArray[$x]->getProduct()->lvl1);
      $sheet->setCellValue('S' . $rowNum, $prArray[$x]->getProduct()->lvl2);
      $sheet->setCellValue('T' . $rowNum, $prArray[$x]->getProduct()->lvl3);
      $sheet->setCellValue('U' . $rowNum, $prArray[$x]->getProduct()->product);
      $sheet->setCellValue('V' . $rowNum, $prArray[$x]->getProduct()->service);
      // $sheet->setCellValue('W' . $rowNum,);
      // $sheet->setCellValue('X' . $rowNum,);
      $sheet->setCellValue('Y' . $rowNum, $prArray[$x]->departmentCode);
      $sheet->setCellValue('Z' . $rowNum, $prArray[$x]->tenderID);

      echo $prArray[$x]->getIssuance()->requestorID . "<br>";
      echo $prArray[$x]->getIssuance()->approvalID . "<br>";
      echo $prArray[$x]->getIssuance()->subcon . "<br>";
      echo $prArray[$x]->getIssuance()->region . "<br>";
      echo $prArray[$x]->getIssuance()->projectCode . "<br>";
      echo $prArray[$x]->getIssuance()->subProjectCode . "<br>";
      echo $prArray[$x]->getIssuance()->duID . "<br>";
      echo $prArray[$x]->getIssuance()->type . "<br>";

      echo "----------------------------------------<br>";
      echo $prArray[$x]->getProduct()->lvl1 . "<br>";
      echo $prArray[$x]->getProduct()->lvl2 . "<br>";
      echo $prArray[$x]->getProduct()->lvl3 . "<br>";
      echo $prArray[$x]->getProduct()->product . "<br>";
      echo $prArray[$x]->getProduct()->service . "<br>";

      echo "----------------------------------------<br>";
      echo $prArray[$x]->departmentCode . "<br>";
      echo $prArray[$x]->tenderID . "<br>";
      //var_dump($prArray[$x]);
      echo "<br><br>";
    }

    //$sheet->setCellValue('A1', 'Hello World !');

    $writer = new Xlsx($spreadsheet);
    $writer->save('hello world.xlsx');
  }

?>
