<?php
  require 'vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  // function to set column on the excel file
  function setExcelColumn($sheet) {
    for ($i=2; $i<5; $i++) {
      foreach (range('A', 'Z') as $columnID) {
        $cell = $columnID . $i;
        $sheet->getStyle($cell)
            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
      }
    }


    $sheet->setCellValue('A3', 'PR issuance Support Data');
    $sheet->getStyle('A3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('7EF6CE');

    $sheet->setCellValue('K3', 'Procurement language');
    $sheet->getStyle('K3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFFF00');

    $sheet->setCellValue('R3', 'Product');
    $sheet->getStyle('R3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('66CCFF');

    $sheet->setCellValue('A2', 'Malaysia PR REQUEST TEMPLATE');
    $sheet->getStyle('A2')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('D0CECE');

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
    $sheet->getStyle('A4:J4')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('F2F2F2');


    $sheet->setCellValue('K4', 'Item*');
    $sheet->setCellValue('L4', 'Commodity');
    $sheet->setCellValue('M4', 'SubGroup*');
    $sheet->setCellValue('N4', 'Classification*');
    $sheet->setCellValue('O4', 'Description*');
    $sheet->setCellValue('P4', 'UOM*');
    $sheet->setCellValue('Q4', 'Qty*');
    $sheet->getStyle('K4:Q4')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FCF596');

    $sheet->setCellValue('R4', 'Product_level1_area*');
    $sheet->setCellValue('S4', 'Product_level2_area*');
    $sheet->setCellValue('T4', 'Product_level3_product*');
    $sheet->setCellValue('U4', 'Product');
    $sheet->setCellValue('V4', 'Service Product');
    $sheet->getStyle('R4:V4')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('D9E1F2');

    $sheet->setCellValue('W3', 'Note to Buyer');
    $sheet->setCellValue('X3', 'Note to Rerceiver');
    $sheet->getStyle('W3:X3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('F2F2F2');

    $sheet->setCellValue('Y3', 'Department Code');
    $sheet->getStyle('Y3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFC000');
    $sheet->setCellValue('Z3', 'Tender ID');
    $sheet->getStyle('Z3')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFC000');
    $sheet->getStyle('Z4')->getFill()
    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    ->getStartColor()->setARGB('FFC000');

    $sheet->mergeCells('A3:J3');
    $sheet->mergeCells('K3:Q3');
    $sheet->mergeCells('R3:V3');
    $sheet->mergeCells('A2:Z2');

    $sheet->mergeCells('W3:W4');
    $sheet->mergeCells('X3:X4');
    $sheet->mergeCells('Y3:Y4');
    //$sheet->mergeCells('Z3:Z4');
  }

  // let user to download the exported excel file
  function downloadFile($file) {
    header('Content-disposition: attachment; filename='.$file);
    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($file));
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    ob_clean();
    flush();
    readfile($file);
  }

?>
