<?php
require_once 'vendor/autoload.php';

use GetOptionKit\GetOptionKit;

$getopt = new GetOptionKit;
$getopt->add( 'n|number:=i' , 'option requires a integer value' );

try {
    $result = $getopt->parse( $argv );
    $number = $result->number ? $result->number:10;
} catch(Exception $e) {
    echo 'Try: create.php --number=10';
    exit;
}

$seedFile = 'seed.csv';
$reader = new Csv_Reader($seedFile, new Csv_Dialect());
$headerRow = $reader->getAssociativeRow();
$seedRow = $reader->getAssociativeRow();
$writer = new Csv_Writer(STDOUT);
$writer->writeRow($headerRow);
for($i=1; $i<=$number; $i++) {
    $productRow = array_merge($seedRow, array(
        'sku' => 'sku-'.$i,
        'name' => 'product '.$i,
    ));
    $writer->writeRow($productRow);
}