<?php
  require 'vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  // function to create the excel file
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

      foreach (range('A', 'Z') as $columnID) {
        $sheet->getStyle($columnID . $rowNum)->getAlignment()->
        setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle($columnID. $rowNum)
            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
      }


      $sheet->setCellValue('A' . $rowNum, $x + 1);
      $sheet->setCellValue('B' . $rowNum, $prArray[$x]->getIssuance()->requestorID);
      $sheet->setCellValue('C' . $rowNum, $prArray[$x]->getIssuance()->approvalID);
      $sheet->setCellValue('D' . $rowNum, $prArray[$x]->getIssuance()->subcon);
      $sheet->setCellValue('E' . $rowNum, $prArray[$x]->getIssuance()->region);
      // $sheet->setCellValue('F' . $rowNum,);
      $sheet->setCellValue('G' . $rowNum, $prArray[$x]->getIssuance()->projectCode);
      $sheet->setCellValue('H' . $rowNum, $prArray[$x]->getIssuance()->subProjectCode);
      $sheet->setCellValue('I' . $rowNum, $prArray[$x]->getIssuance()->contract);
      $sheet->setCellValue('J' . $rowNum, $prArray[$x]->getIssuance()->duID);
      $sheet->setCellValue('K' . $rowNum, $prArray[$x]->getProcurement()->itemID);
      $sheet->setCellValue('L' . $rowNum, $prArray[$x]->getProcurement()->commodity);
      $sheet->setCellValue('M' . $rowNum, $prArray[$x]->getProcurement()->subgroup);
      $sheet->setCellValue('N' . $rowNum, $prArray[$x]->getProcurement()->classification);
      $sheet->setCellValue('O' . $rowNum, $prArray[$x]->getProcurement()->description);
      $sheet->setCellValue('P' . $rowNum, $prArray[$x]->getProcurement()->uom);
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

    $writer = new Xlsx($spreadsheet);
    $writer->save('PR form.xlsx');
    $file = "PR form.xlsx";

    downloadFile($file);
  }
?>
