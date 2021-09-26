<?php
    include 'dbconn.php';
    $name=mysqli_real_escape_string($conn,$_POST["name"]);
    $email=mysqli_real_escape_string($conn,$_POST["email"]);
    $message=mysqli_real_escape_string($conn,$_POST["message"]);
    
    //echo $name.$email.$message;
            $query="insert into feedBack (name,email,message,time) values('$name','$email','$message',now());";
            $queryFire=mysqli_query($conn,$query);
            if($queryFire) echo "success";
            else echo "error";
            
            
            
            
            
            
            
            
            
            
            
         /*   
            $error=0;
	//$msg = $_POST['msg'];
	foreach ($_POST as $name => $value)
	{
     		//echo htmlspecialchars($name . ': ' . $value) . "\n";
	//}
		$tags = check_tags($value);
		$par = check_parenth($value);
		if($tags || $par) { echo "XSS detected"; $error = 1;   }
		else
		{
			//$error = 0;
			$quotes = check_quotes($value);
			$sql = check_sql($value);
			$sql_com = check_sql_comment($value);
			if($quotes || $sql || $sql_com) { echo "SQL Injection detected"; $error = 1; }
			//else { $error = 0; }
		}
	}
	if($_GET)
	foreach ($_GET as $name => $value)
	{
     		//echo htmlspecialchars($name . ': ' . $value) . "\n";
	//}
		$tags = check_tags($value);
		$par = check_parenth($value);
		if($tags || $par) { echo "XSS detected"; $error = 1; }
		else
		{
			//$error = 0;
			$quotes = check_quotes($value);
			$sql = check_sql($value);
			$sql_com = check_sql_comment($value);
			if($quotes || $sql || $sql_com) { echo "SQL Injection detected"; $error = 1; }
			//else { $error = 0; }
		}
	}
	echo "Data successfully inserted";
//}
function check_tags($msg)
{
	$count1=0;
	$count2=0;
	for($i=0;$i<strlen($msg);$i++)
		if($msg[$i]=='<')
			$count1++;
		elseif($msg[$i]=='>')
			$count2++;
	if($count1==0 && $count2==0)
		return false;
	elseif($count1==$count2)
		return true;
	else
		return false;
	//echo $msg[0];
}

function check_parenth($msg)
{
	$count1=0;
	$count2=0;
	for($i=0;$i<strlen($msg);$i++)
		if($msg[$i]=='(')
			$count1++;
		elseif($msg[$i]==')')
			$count2++;
	if($count1==0 && $count2==0)
		return false;
	elseif($count1==$count2)
		return true;
	else
		return false;
	//echo $msg[0];
}

function check_quotes($msg)
{
	$flag=0;
	for($i=0;$i<strlen($msg);$i++)
		if($msg[$i]=="'" || $msg[$i]=='"' )
			$flag=1;
	return $flag;
}

function check_sql($msg)
{
	$abc = explode(" ",$msg);
	$flag=0;
	$length=sizeof($abc);
	for($i=0;$i<$length;$i++)
		if($abc[$i]=='AND' || $abc[$i]=='and' || $abc[$i]=='OR' || $abc[$i]=='or' || $abc[$i]=='!' || $abc[$i]=='NOT' || $abc[$i]=='not' )
			$flag=1;
	return $flag;
}

function check_sql_comment($msg)
{
	$flag=0;
	for($i=0;$i<strlen($msg);$i++)
		if($msg[$i]=='/' && $msg[$i+1]=='/')
			$flag=1;
	return $flag;
}
  */      

?>