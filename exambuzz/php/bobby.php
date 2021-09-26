<?php
$form=$_POST["form"];
$subject=$_POST["subject"];
$testname=$_POST["testName"];
$negativeMark=$_POST["negativeMarking"];
$time=$_POST["time"];
$section=$_POST["sectioning"];
$tablename=$testname."".$section;
 if($_FILES['files']['name'])
 {
  $filename = explode(".", $_FILES['files']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['files']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $question= mysqli_real_escape_string($conn, $data[0]);
    $optionA = mysqli_real_escape_string($conn, $data[1]);  
    $optionB = mysqli_real_escape_string($conn, $data[2]);
    $optionC = mysqli_real_escape_string($conn, $data[3]);
    $optionD = mysqli_real_escape_string($conn, $data[4]);
    $correctAnswer = mysqli_real_escape_string($conn, $data[5]);
    $marks = mysqli_real_escape_string($conn, $data[6]);
    $queryTable = "create table '$tablename' (int id auto increment , question text,optionA text,optionB text,optionC text,optionD text,correctAnswer varchar(10),marks int);";
    mysqli_query($conn, $queryTable);
    
    
    
    $queryInsert="insert into '$tablename' (question,optionA,optionB,optionC,optionD,correctAnswer,marks) values('$question','$optionA','$optionB','$optionC','$optionD','$correctAnswer','$marks');";
    mysqli_query($conn,$queryInsert);
    
    
   }
   fclose($handle);
   //header("location: bobby.php?updation=1");
  }
  else
  {
   echo "csvonly";
  }
 }
 else
 {
  echo "selectcsv";
 }

?>