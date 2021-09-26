<?php
include 'dbconn.php';
session_start();
$regg=$_SESSION['reg_no'];
header("Content-Type: text/html; charset=ISO-8859-1");
$x=check();
	if($x==0)
		header("Location: /exambuzz/Login.php");
	function check()
	{
		if($_SESSION["session_id"])
			{
					return 1;
			}
		else
		{
		      return 0;
		}
	}
	
$tableindex=strtolower($_COOKIE['testname']);	

	    $query = "select * from test_details where testname='$tableindex'";
		$result = mysqli_query($conn,$query);
		$row = mysqli_fetch_array($result);
		$sectioncount=$row['section_count'];
		$singlecount = $row['nsection_count'];
		
	//	$scc=array();
		$sn=array();
		
		
		for($i=1;$i<=$sectioncount;$i++)
		{
		    $colname1 = "section".($i-1)."qno";
		    $colname2 = "section".($i-1);
		   // $scc[$i] = $row[$colname1];
		    $sn[$i] = $row[$colname2];
		    
		    $table1 = $tableindex.$sn[$i];
		    $table2 = $tableindex.$sn[$i]."current";
		    $qq = "drop table $table1,$table2";
		    mysqli_query($conn,$qq);
		    
		    
		}
		
	

?>