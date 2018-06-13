<?php
  require 'vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  // function to set column on the excel file
  function setExcelColumn($sheet) {
    $sheet->setCellValue('A3', 'PR issuance Support Data');
    $sheet->setCellValue('K3', 'Procurement language');
    $sheet->setCellValue('R3', 'Product');
    $sheet->setCellValue('A2', 'Malaysia PR REQUEST TEMPLATE');

    $sheet->setCellValue('A4', 'No.');
    $sheet->setCellValue('B4', 'Requestor ID*');
    $sheet->setCellValue('C4', 'PR approver ID');
    $sheet->setCellValue('D4', 'Supplier Full Name*');
    $sheet->setCellValue('E4', 'Region*');
    $sheet->setCellValue('F4', 'Binding area or BPA');
    $sheet->setCellValue('G4', 'Project code');
    $sheet->setCellValue('H4', 'Sub Project code');
    $sheet->setCellValue('I4', 'HW Sales Contract*');
    $sheet->setCellValue('J4', 'DU ID*');

    $sheet->setCellValue('K4', 'Item*');
    $sheet->setCellValue('L4', 'Commodity');
    $sheet->setCellValue('M4', 'SubGroup*');
    $sheet->setCellValue('N4', 'Classification*');
    $sheet->setCellValue('O4', 'Description*');
    $sheet->setCellValue('P4', 'UOM*');
    $sheet->setCellValue('Q4', 'Qty*');

    $sheet->setCellValue('R4', 'Product_level1_area*');
    $sheet->setCellValue('S4', 'Product_level2_area*');
    $sheet->setCellValue('T4', 'Product_level3_product*');
    $sheet->setCellValue('U4', 'Product');
    $sheet->setCellValue('V4', 'Service Product');

    $sheet->setCellValue('W3', 'Note to Buyer');
    $sheet->setCellValue('X3', 'Note to Rerceiver');

    $sheet->setCellValue('Y3', 'Department Code');
    $sheet->setCellValue('Z3', 'Tender ID');

    $sheet->mergeCells('A3:J3');
    $sheet->mergeCells('K3:Q3');
    $sheet->mergeCells('R3:V3');
    $sheet->mergeCells('A2:Z2');

    $sheet->mergeCells('W3:W4');
    $sheet->mergeCells('X3:X4');
    $sheet->mergeCells('Y3:Y4');
    //$sheet->mergeCells('Z3:Z4');
  }



?>
