<?php
  require 'vendor/autoload.php';

  // use PhpOffice\PhpSpreadsheet\Spreadsheet;
  // use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

  use PhpOffice\PhpSpreadsheet\IOFactory;

  // require __DIR__ . '/../Header.php';

  function readExcel($fileName) {
    $inputFileType = 'Xlsx';
    $inputFileName = __DIR__ . '\\' . $fileName;

    $reader = IOFactory::createReader($inputFileType);
    $reader->setReadDataOnly(true);
    $spreadsheet = $reader->load($inputFileName);

    $sheetData = $spreadsheet->getActiveSheet()->toArray();
    // var_dump($sheetData);

    return $sheetData;
  }

?>
