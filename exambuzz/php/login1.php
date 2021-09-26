<?php

include 'dbconn.php';
$username = mysqli_real_escape_string($conn,$_POST["username"]);
$password = mysqli_real_escape_string($conn,$_POST["password"]);

//echo "hi";
$head=base64_encode($password);
$hasher=hash('sha256', $head);
$queryLogin="select email,role,reg_no from register_login where email = '$username' and password='$hasher';";
$result = mysqli_query($conn,$queryLogin);


if($result){
$row = mysqli_fetch_assoc($result);

	if($row["email"]==$username)
	{
                session_start();
                $session_id=uniqid();
		$_SESSION["session_id"] = $session_id;
		$_SESSION["username"] = $username;
		$_SESSION["reg_no"] = $row["reg_no"];
		$regno=$row["reg_no"];
		if($row["role"]=="student")
			{
				$de = "insert into last_time values('$regno',now(),'NULL','NULL')";
				mysqli_query($conn,$de);
				//header("Location: /exambuzz/php/studentDashboard.php");
				echo "student";
				
			}
		else if($row["role"]=="teacher")
			//header("Location: /exambuzz/php/teacherModel.php");
			echo "teacher";
	}
	else
	{
	    //	echo "<script>alert('Invalid Credentials');window.location.href='/exambuzz/php/Login.php';</script>";
	    echo "error";
		       
	}
}else echo "error";
	
?>
