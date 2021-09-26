<?php
session_start();
$_SESSION['testname']=0;
include 'dbconn.php';
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
?>


<!doctype html>
<html lang="en-us">
<html class="noselect" ondragstart="return false;" oncontextmenu="return false;">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/teachermodule.css" />
        <link rel="stylesheet" href="../css/contact.css" />
        <link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
   	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!-- <link rel="shortcut icon" href="favic.ico" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	
    
    
    <script>
    	$(document).ready(function(){
    		$("#user-img").click(function(){
    			$(".content").slideToggle();
    		});
    	});

    </script>
  
</head>
<link rel="stylesheet" href="../css/noSelect.css">
    <script src="../keyDisable.js"></script>
    
<title>
    Exambuzz
    
</title>
    
<body >
        <section class="top-navBar">
            
            <div class="logo">
                <img src="../img/small.png" onclick="location.href='/exambuzz/php/gohome.php'" width="75px" />
            </div>

           
        	<div class="contentLeft">
        		<center><img id="user-img" src="../img/user-alt.svg" alt="user"></center>
        		<div class="content">
    			<div id="topUser">
    				<img src="../img/user-alt.svg" alt="user" width="35px">
    				<div id="textArea">
    				<p><?php echo $_SESSION['username']; ?></p>
    				<a href="editProfile.php">View Profile</a>
    				</div>
    			</div>
    			<input type="submit" value="Logout" id="logoutButt" onclick="location.href = '/exambuzz/logout.php';">
    		</div>
        	</div>
    		
    		
        </section>

        <section class="right">
                <div class="work">
                    <button class="inWork" onclick="location.href='/exambuzz/php/gohome.php'">
                        <p>Home&nbsp;<img src="/exambuzz/img/home.png" width="30px" /></p>
                    </button><br/>
                    <button class="inWork" onclick="location.href='/exambuzz/php/contact.php'">
                        <p>Contact Us&nbsp;<img src="/exambuzz/img/call.png" width="25px" /></p>
                    </button><br/>
                </div>

        </section>

        <section class="left query">
            <div class="exambuzz">
                <h1 style="font-size:35px;color:#009688;">ExamBuzz</h1>
                <p style="font-size:19px;width:75%">
                    Exambuzz is an online web appication for the preparation of exams and mock subject tests giving students the idea about the actual test,so that they are prepared for the further
                    test process and they become confident enough to crack any test.
                </p>
            </div>
            
            <br><br>
            <div class="ourTeam">
              <center> <h1 style="font-size:35px;color:#009688;">Our Team</h1></center>
                    
				<div class="row"> 
					  <div class="column">
					    <div class="card" style ="border:3px solid #CE93D8" >
					    	<img class="typeImage" src="/exambuzz/img/test.png">
					      <div class="container" >
					      	
					      	<div class="inside">	
						      <center>	<h3 style="border-bottom:none">Atik Jain</h3></center>
						 </div>
					      </div>
					    </div>
					  </div>

					  <div class="column">
					    <div class="card" style ="border:3px solid #4FC3F7">
					    	<img class="typeImage" src="/exambuzz/img/study.png">

					      <div class="container">
					      <div class="inside">
						     
						     <center> <h3 style="border-bottom:none">Vishal Pathak</h3></center></center>
					      </div>							
					      </div>
					    </div>
					  </div>
					  
					   <div class="column">
					    <div class="card" style="border:3px solid #ef9c38;">
					    <img class="typeImage" src="/exambuzz/img/evaluation.png">

					      <div class="container">
					      <div class="inside">
						    
						      <center><h3 style="border-bottom:none">Nishit Chaturvedi</h3></center>
					      </div> 
					      </div>
					    </div>
					  </div>
					  
					   <div class="column">
					    <div class="card" style="border:3px solid #ef9c38;">
					    <img class="typeImage" src="/exambuzz/img/evaluation.png">

					      <div class="container">
					      <div class="inside">
						    
						      <center><h3 style="border-bottom:none">Tushar Harel</h3>
					      </div>
					      </div>
					    </div>
					  </div>
		
                    
                   
                    
                    
                
            </div>
            
        	<div class="forms">
        			<center> <h1 style="font-size:35px;color:#009688;">Contact Us</h1>
                        <div class="helper">
                              <h2>&#x260F;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Technical help : &nbsp;&nbsp;&nbsp;9156096854 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7066677290</h2> 
                            <p> For any queries mail us at : buzz.exam.buzz@gmail.com</p>
                          </div>
                           
                           </center>
            </div> 
        </section>
</body>
</html>