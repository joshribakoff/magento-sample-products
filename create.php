<?php
require_once 'vendor/autoload.php';
$seedFile = 'seed.csv';
$reader = new Csv_Reader($seedFile, new Csv_Dialect());
$headerRow = $reader->getAssociativeRow();
$seedRow = $reader->getAssociativeRow();
$writer = new Csv_Writer(STDOUT);
$writer->writeRow($headerRow);
for($i=1; $i<=10; $i++) {
    $productRow = array_merge($seedRow, array(
        'sku' => 'sku-'.$i,
        'name' => 'product '.$i,
    ));
    $writer->writeRow($productRow);
}