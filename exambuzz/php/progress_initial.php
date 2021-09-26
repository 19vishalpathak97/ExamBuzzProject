<?php
include 'dbconn.php';
header("Content-Type: text/html; charset=ISO-8859-1");
	session_start();
	$value=0;//$_SESSION['value'];
	$user=$_SESSION['session_id'];
	
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





$regg=$_SESSION['reg_no'];
$max=$_GET['max1'];
$secname=$_GET['secname'];
$tableindex=strtolower($_COOKIE['testname']);
$current_exam_table=$tableindex.$secname."current";
					$column1=$regg."question";
					$column2=$regg."answer";
//$query = "select count($column2) as cc from $current_exam_table where $column2!='NULL'";
//$rs = mysqli_query($conn,$query);
//$rss = mysqli_fetch_array($rs);
//$value=$rss['cc'];


?>

<html>

<head>
<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js">
	</script>
<script>

</script>
  <link rel="stylesheet" type="text/css" href="/exambuzz/css/testWindow.css" />
	</head>	
	<div>
	        		<h4>Solved :<?php echo $value; ?>/<?php echo $max; ?><progress style="background-color: #fff" value="<?php echo $value; ?>" max="<?php echo $max; ?>"></progress> </h4>
	        	</div>
	
	<body>
	
	
	
		
</body>
</html>

