<?php


 include 'dbconn.php';
 
    session_start();
   $cp=$_POST['cp'];
   
   $np=$_POST['np'];
   
  // $cp1=$_POST['cp1'];
   
   
  $regg = $_SESSION['reg_no'];
  
  
  
  
   $sqlcp="UPDATE register_login SET password='$np' WHERE password='$cp' and reg_no=$regg  ";
    if(mysqli_query($conn, $sqlcp))
    {
        echo "Password Succesfully Updated";
    }
    else
    {
        echo "Something went Wrong";
    }


?>