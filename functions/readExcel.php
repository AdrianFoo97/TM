<?php
  require 'vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\IOFactory;

  // Read in excel file and return an 2 dimensional (2D) array of data
  function readExcel($fileName) {
    $inputFileType = 'Xlsx';
    $inputFileName = __DIR__ . '\\' . $fileName;

    $reader = IOFactory::createReader($inputFileType);
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($inputFileName);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();

    return $sheetData;
  }
?>
