<?php
include 'dbconn.php';
require_once '../Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel(); // Create new PHPExcel object
$objPHPExcel->getProperties()->setCreator($username)
 ->setLastModifiedBy($username)
 ->setTitle("Result of ".$tableindex)
 ->setSubject($tableindex)
 ->setDescription("Department : ".$department." Year : ".$year)
 ->setKeywords("Exambuzz")
 ->setCategory("Result file");
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




function array_truncate(&$arr)
{
    while(count($arr) > 0) array_pop($arr);
}

$tableindex=strtolower($_COOKIE['testname']);
		$query = "select * from new_test_details where testname='$tableindex'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$sectioncount=$row['section_count'];
		$username = $row['Name'];
		$department = $row['department'];
		$year = $row['year'];
		$duration = $row['timeoftest'];
		$negative = $row['negative'];
		//echo "mml";
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', 'Sr.NO');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B1', 'Duration');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C1', 'Department');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D1', 'Year');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E1', 'Negative %');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F1', 'Percentage');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G1', 'Time of Test');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H1', 'First Name');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I1', 'Last Name');
		$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J1', 'Email');
		for($a = 1;$a <= $sectioncount;$a++)
		{
			$colname = 'Sheet'.$a;
			$section_name = $row[$colname];
			
			if($a==1)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K1', $section_name);
			else if($a==2)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L1', $section_name);
			else if($a==3)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M1', $section_name);
			else if($a==4)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N1', $section_name);
			else if($a==5)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O1', $section_name);
			else if($a==6)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P1', $section_name);
			else if($a==7)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q1', $section_name);
			else if($a==8)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R1', $section_name);
			else if($a==9)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S1', $section_name);
			else if($a==10)
				$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T1', $section_name);
			else{}
		}
		
		
		
		
		
		
		
		
		
		
		
		$query1 = "select * from result where testname='$tableindex'";
		$result1 = mysqli_query($conn,$query1);
		$cnt = 2;
		while($row1 = mysqli_fetch_array($result1))
		{
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A'.$cnt, $cnt-1);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('B'.$cnt, $timeoftest);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('C'.$cnt, $department);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('D'.$cnt, $year);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('E'.$cnt, $negative);
			
			$percent = $row1['percentage'];
			$timeoftest = $row1['time'];
			$regg = $row1['username'];
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('F'.$cnt, $percent);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('G'.$cnt, $timeoftest);
			
			
			$query2 = "select firstname,lastname,email from register_login where reg_no=$regg";
			$result2 = mysqli_query($conn,$query2);
			$row2 = mysqli_fetch_array($result2);
			
			$fname = $row2['firstname'];
			$lname = $row2['lastname'];
			$email = $row2['email'];	
			
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('H'.$cnt, $fname);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('I'.$cnt, $lname);
			$objPHPExcel->setActiveSheetIndex(0)->setCellValue('J'.$cnt, $email);	
		
			for($a = 1;$a <= 2;$a++)
			{
				$colname = 'section'.$a;
				$section_marks = $row1[$colname];
			
				if($a==1)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('K'.$cnt, $section_marks);
				else if($a==2)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('L'.$cnt, $section_marks);
				else if($a==3)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('M'.$cnt, $section_marks);
				else if($a==4)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('N'.$cnt, $section_marks);
				else if($a==5)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('O'.$cnt, $section_marks);
				else if($a==6)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('P'.$cnt, $section_marks);
				else if($a==7)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q'.$cnt, $section_marks);
				else if($a==8)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('R'.$cnt, $section_marks);
				else if($a==9)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('S'.$cnt, $section_marks);
				else if($a==10)
					$objPHPExcel->setActiveSheetIndex(0)->setCellValue('T'.$cnt, $section_marks);
				else{}
			}
			
			
			$cnt++;
		}
		
		
		
//error_reporting(E_ALL);
//ini_set('display_errors', TRUE);
//ini_set('display_startup_errors', TRUE);
/** Include PHPExcel */

// Create Header
//$objPHPExcel->setActiveSheetIndex(0)
      //      ->setCellValue('A1', 'NO')
        //    ->setCellValue('B1', '')
          //  ->setCellValue('C1', 'TITLE');
//$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray( $style_header ); // give style to header
 
// Create Data

$dataku=array(
   array('C001','Iphone 6'),
   array('C002','Samsung Galaxy S4'),
   array('C003','Nokia Lumia'),
   array('C004','Blackberry Curve'));
$firststyle='A2';
$laststyle='C5';

//$objPHPExcel->getActiveSheet()->getStyle($firststyle.':'.$laststyle)->applyFromArray( $style_content ); // give style to header
 
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Product');
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="listproduct.xls"'); // file name of excel
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;





	//echo "Your file is downloaded";
?>
