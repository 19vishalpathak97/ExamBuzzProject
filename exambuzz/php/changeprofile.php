<?php


 include 'dbconn.php';
 
    session_start();
    
     $regg = $_SESSION['reg_no'];
$file_name;$tmp_file;
  $username=$_POST['username'];
  $telephone=$_POST['telephone'];

  $flag=$_POST['flag'];
  if($flag == 'true')
  {
        $file_name=$_FILES['fileName']['name'];
        $tmp_file=$_FILES['fileName']['tmp_name'];
        echo $tmp_file;
        
        
    	 $target_file="../img/".$file_name;
    	move_uploaded_file($tmp_file, $target_file);
    		        
     $sqldet="UPDATE register_login SET email='$username' , contact='$telephone',profile='$target_file'   WHERE  reg_no=$regg  ";
    if(mysqli_query($conn, $sqldet))
    {
        echo "Password Succesfully Updated";
    }
    else
    {
        echo "Something went Wrong";
    }
  		        
        
        
   
  }
  else
  {
             $file_name=$_POST['fileName'];
             
     $sqldet1="UPDATE register_login SET email='$username' , contact='$telephone',profile='$file_name'   WHERE   reg_no=$regg  ";
    if(mysqli_query($conn, $sqldet1))
    {
        echo "Password Succesfully Updated";
    }
    else
    {
        echo "Something went Wrong";
    }
  		        
  }
   
  echo "Hello";
  echo $file_name;
  echo $username;
  
  
  
  
  
  
   


?>