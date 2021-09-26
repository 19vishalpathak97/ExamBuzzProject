<!doctype>
<html>
<head>
</head>
<body>
<?php
        echo  "Hello";


		
		$optionD=array();
	//	require_once "PHPExcel-1.8/Classes/PHPExcel.php";
	    require_once('PHPExcel-1.8/Classes/PHPExcel.php');

		$tmpfname = "abc.csv";
		$excelReader = PHPExcel_IOFactory::createReaderForFile($tmpfname);
		$excelObj = $excelReader->load($tmpfname);
		$worksheet = $excelObj->getSheet(0);
		$lastRow = $worksheet->getHighestRow();
		echo $lastRow;
		
		/*
		echo "<table>";
		for ($row = 1; $row <= $lastRow; $row++) {
			 echo "<tr><td>";
			 
			 $optionD=(string)$worksheet->getCell('A'.$row)->getValue();
			 
			 
			 echo "</td><tr>";
		}
		echo "</table>";	
		
		
		
		for($row = 1; $row <= $lastRow; $row++) {
    
        echo $optionD;
		}	
		
	
		*/
?>


 


</body>
</html>