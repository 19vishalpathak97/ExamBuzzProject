
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);
/** Include PHPExcel */
echo "loda";
require_once '../Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel(); // Create new PHPExcel object
$objPHPExcel->getProperties()->setCreator("Sigit prasetya n")
 ->setLastModifiedBy("Sigit prasetya n")
 ->setTitle("Creating file excel with php Test Document")
 ->setSubject("Creating file excel with php Test Document")
 ->setDescription("How to Create Excel file from PHP with PHPExcel 1.8.0 Classes by seegatesite.com.")
 ->setKeywords("phpexcel")
 ->setCategory("Test result file");
// create style
$default_border = array(
    'style' => PHPExcel_Style_Border::BORDER_THIN,
    'color' => array('rgb'=>'1006A3')
);
$style_header = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'E1E0F7'),
    ),
    'font' => array(
        'bold' => true,
 'size' => 16,
    )
);
$style_content = array(
    'borders' => array(
        'bottom' => $default_border,
        'left' => $default_border,
        'top' => $default_border,
        'right' => $default_border,
    ),
    'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb'=>'eeeeee'),
    ),
    'font' => array(
 'size' => 12,
    )
);
// Create Header
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'NO')
            ->setCellValue('B1', 'PRODUCT CODE')
            ->setCellValue('C1', 'TITLE');
$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray( $style_header ); // give style to header
 
// Create Data
$dataku=array(
   array('C001','Iphone 6'),
   array('C002','Samsung Galaxy S4'),
   array('C003','Nokia Lumia'),
   array('C004','Blackberry Curve'));
$firststyle='A2';
for($i=0;$i<count($dataku);$i++)
{
 $urut=$i+2;
 $num='A'.$urut;
 $code='B'.$urut;
 $title='C'.$urut;
 $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue($num, $i+1)
         ->setCellValue($code, $dataku[$i][0])
            ->setCellValue($title, $dataku[$i][1]);
 $laststyle=$title;
}
$objPHPExcel->getActiveSheet()->getStyle($firststyle.':'.$laststyle)->applyFromArray( $style_content ); // give style to header
 
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Product');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="result.xls"'); // file name of excel
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save('php://output');
//exit;
?>
