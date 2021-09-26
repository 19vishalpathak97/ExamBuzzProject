<?php

  include 'dbconn.php';
  session_start();
  $regg = $_SESSION['reg_no'];
  
  $testname=strtolower($_POST['testname']);
  $teachername=$_POST['teachername'];
  $department=strtolower($_POST['department']);
  $year=strtolower($_POST['year']);
  $timeoftest=$_POST['timeoftest'];
  $startdate=$_POST['startdate'];
  $enddate=$_POST['enddate'];
  $negative = 0;
  $negative=$_POST['negative'];
  $number_of_sheet=$_POST['sectioncount'];
  $section_name = array();
  
  $section_name[1]='';
  $section_name[2]='';
  $section_name[3]='';
  $section_name[4]='';
  $section_name[5]='';
  $section_name[6]='';
  $section_name[7]='';
  $section_name[8]='';
  
  for($sec = 0;$sec < $number_of_sheet; $sec++)
  {
  	//$section = "section";
  	$nsec = $sec+1;
  	$section_name[$nsec] = $_POST['sec'.$sec];
  	//echo $section.$nsec;
  }
  
  
  
  
  
  
  
  
  $filename = $_FILES["files"]["name"][0];
  $path = "../upload/".$testname."/".$filename;
  //echo $path;
  
  $startdate1=date('Y-m-d',strtotime($startdate));
  $enddate1=date('Y-m-d',strtotime($enddate));
  
  require('../Classes/PHPExcel/IOFactory.php');
  $objPHPExcel = PHPExcel_IOFactory::load($path);

  $section = array();
  
  //echo "lund";
  
  //$query="INSERT INTO new_test_details(Name,testname,department,year,timeoftest,startdate,enddate,negative,section_count,reg_no) VALUES('$teachername','$testname','$department','$year',$timeoftest,'$startdate1','$enddate1',$negative,$number_of_sheet,$regg)";
  
  if($negative=='')
  	$negative = 0;
  $query="INSERT INTO new_test_details(Name,testname,department,year,timeoftest,startdate,enddate,Sheet1,Sheet2,Sheet3,Sheet4,Sheet5,Sheet6,Sheet7,Sheet8,negative,section_count,reg_no) VALUES('$teachername','$testname','$department','$year',$timeoftest,'$startdate1','$enddate1',NULLIF('$section_name[1]',''),NULLIF('$section_name[2]',''),NULLIF('$section_name[3]',''),NULLIF('$section_name[4]',''),NULLIF('$section_name[5]',''),NULLIF('$section_name[6]',''),NULLIF('$section_name[7]',''),NULLIF('$section_name[8]',''),$negative,$number_of_sheet,$regg)";
  
 	 mysqli_query($conn,$query);
  
  
//for($k=0;$k<$number_of_sheet;$k++){
	//$objPHPExcel->setActiveSheetIndex($k);
//	$objWorksheet = $objPHPExcel->setActiveSheetIndex($k);
//	$sheetname = $objPHPExcel->getTitle();
//	$tablename = $testname.$sheetname;
	//echo $tablename;
foreach ($objPHPExcel->getWorksheetIterator() as $worksheet)
  {
  
   $sheetname = $worksheet->getTitle();
   $tablename = $testname.$sheetname;
   
   $highestRow = $worksheet->getHighestRow();
   
   $query ="CREATE TABLE  $tablename ( q_number INT(6) PRIMARY KEY NOT NULL,question VARCHAR(500) DEFAULT NULL ,question_img LONGBLOB DEFAULT NULL, A VARCHAR(300) DEFAULT NULL,A_img LONGBLOB DEFAULT NULL,  B VARCHAR(300) DEFAULT NULL,B_img LONGBLOB DEFAULT NULL,C VARCHAR(300) DEFAULT NULL,C_img LONGBLOB DEFAULT NULL,D VARCHAR(300) DEFAULT NULL,D_img LONGBLOB DEFAULT NULL,E VARCHAR(300) DEFAULT NULL,E_img LONGBLOB DEFAULT NULL,answer VARCHAR(300) DEFAULT NULL,explanation VARCHAR(700) DEFAULT NULL,marks INT(6) DEFAULT NULL)"; 
   
   
   if(mysqli_num_rows(mysqli_query("show tables like '$tablename'"))==1){}
   else{mysqli_query($conn,$query);}
   
   $count = 0;
   for($row=2; $row<=$highestRow; $row++)
   {
    
    $q_number = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0, $row)->getValue());
    $question = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
    $a = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
    $b = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
    $c = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
    $d = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
    $e = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
    $answer = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
    $explanation = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
    $marks = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
    
    
    
    
	    if(is_numeric($q_number))
	    {
	    	$count++;
	    	$query1 = "insert into $tablename(q_number,question,A,B,C,D,E,answer,explanation,marks) VALUES($q_number,NULLIF('$question',''),NULLIF('$a',''),NULLIF('$b',''),NULLIF('$c',''),NULLIF('$d',''),NULLIF('$e',''),NULLIF('$answer',''),NULLIF('$explanation',''),$marks)";
	    	mysqli_query($conn, $query1);
	    
	    }
	    else{
	    	break;
	    	}
    
   }
   //echo $count;
   $tb = $sheetname.'cnt';
   $cquery = "update new_test_details set $tb = $count where testname = '$testname'";
   mysqli_query($conn,$cquery);
} 
  

 
 //}
 
 for($k=0;$k<$number_of_sheet;$k++){
	$objPHPExcel->setActiveSheetIndex($k);
	$objWorksheet = $objPHPExcel->setActiveSheetIndex($k);
	$sheetname = $objWorksheet->getTitle();
	$tablename = $testname.$sheetname;
foreach ($objPHPExcel->getActiveSheet()->getDrawingCollection() as $drawing) {
	if ($drawing instanceof PHPExcel_Worksheet_MemoryDrawing) {
		ob_start();
		call_user_func(
			$drawing->getRenderingFunction(),
			$drawing->getImageResource()
		);
		$imageContents = ob_get_contents();
		ob_end_clean();
		switch ($drawing->getMimeType()) {
			case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_PNG :
					$extension = 'png'; break;
			case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_GIF:
					$extension = 'gif'; break;
			case PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_JPEG :
					$extension = 'jpg'; break;
		}
	} else {
		$zipReader = fopen($drawing->getPath(),'r');
		
		$imageContents = '';
		while (!feof($zipReader)) {
			$imageContents .= fread($zipReader,1024);
		}
		fclose($zipReader);
		$extension = $drawing->getExtension();
		//print_r($coordinate);
	}
	$filename = $drawing->getCoordinates().'.'.$extension;
	
	/*if (!is_dir('upload')){
	mkdir('upload', 0777, true);
	}
	/*
	if (!is_dir('upload/'.$k)){
	mkdir('upload/'.$k, 0777, true);
	}
	$myFileName = '00_Image_'.++$i.'.'.$extension;
	file_put_contents("upload"."/".$k."/".$filename,$imageContents);
	*/
	$string = $drawing->getCoordinates();
	$coordinate = PHPExcel_Cell::coordinateFromString($string);
	
	$colname = "";
	if($coordinate[0] == "B"){$colname = 'question_img';}
	else if($coordinate[0] == "C"){$colname = 'A_img';}
	else if($coordinate[0] == "D"){$colname = 'B_img';}
	else if($coordinate[0] == "E"){$colname = 'C_img';}
	else if($coordinate[0] == "F"){$colname = 'D_img';}
	else if($coordinate[0] == "G"){$colname = 'E_img';}
	else {}
	
	$row = $coordinate[1]-1;
	$query = "update $tablename set $colname = ? where q_number = $row ";
	$stmt = mysqli_prepare($conn,$query);

    	mysqli_stmt_bind_param($stmt, "s",$imageContents);
    	mysqli_stmt_execute($stmt);
	
	}	
}

echo "Your Test uploaded";
  
?>
