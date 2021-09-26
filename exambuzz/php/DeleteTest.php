<?php
include 'dbconn.php';
$testname=strtolower($_POST['testname']);

//echo $testname;


$query = "delete from new_start_details where testname = '$testname'";

//if(mysqli_query($conn,$query))
//{
//	echo "Your Test is updated";
//}



?>
