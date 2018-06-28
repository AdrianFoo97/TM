<?php
  /*
    This file contains function to read an Excel file and return a two
    dimensional (2D) array of all the data
  */

  require '../vendor/autoload.php';

  use PhpOffice\PhpSpreadsheet\IOFactory;

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
