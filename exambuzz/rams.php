<?php

//Here we set the include path and load the librarires
set_include_path(get_include_path() . PATH_SEPARATOR . '../PhpExcel2007/Classes/');
require_once('PHPExcel-1.8/Classes/PHPExcel.php');
require_once('PHPExcel-1.8/Classes/PHPExcel/IOFactory.php');

$excelReader = PHPExcel_IOFactory::createReader('Excel2007'); 
//we instantiate a reader object
$excel = $excelReader->load('Products.csv'); //and load the document

print('<table border="1">');
for ($i = 2; $i < 5; $i++) {
    print('<tr>');
    
    print('<td>');
    print($excel->getActiveSheet()->getCell('A' . $i)->getValue()); //this is how we get a simple value
    print('</td>');
    
    print('<td>');
    print($excel->getActiveSheet()->getCell('B' . $i)->getValue());
    print('</td>'); 
    
    print('<td>');
    print($excel->getActiveSheet()->getCell('C' . $i)->getValue());
    print('</td>'); 
    
    print('<td>');
    print($excel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue()); //this is how we get a calculated value
    print('</td>'); 
    
    print('</tr>'); 
}

print('<tr><td>&nbsp;</td><td>&nbsp;</td>');
print('<td>' . $excel->getActiveSheet()->getCell('C5')->getCalculatedValue() . '</td>');
print('<td>' . $excel->getActiveSheet()->getCell('D5')->getCalculatedValue() . '</td></tr>');
print('</table>');

?>