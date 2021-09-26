<?php
include 'dbconn.php';
session_start();

if(isset($_SESSION['reg_no']))
    header("Location: /exambuzz/php/gohome.php");
if(isset($_SESSION['accessed'])){
		
		$reg_no=$_SESSION["reg_no"];
	}

//echo 3;
$x=check();
	if($x==0)
		{//echo "if";
		}
	else {
	
			//echo "else";
			$rs = mysqli_query($conn,"SELECT * FROM register_login WHERE reg_no=$reg_no");
			$row = mysqli_fetch_assoc($rs);
			$role=$row["role"];
			//echo $role;
			$_SESSION["combinedClass"]=strtolower($row["year"].$row["department"]);
			//$research=$_SESSION["combinedClass"];
			if($row["role"]=="student")
			{
				
				header("Location: /exambuzz/php/studentDashboard.php");
				
				
			}
			else if($row["role"]=="teacher")
			{
				header("Location: /exambuzz/php/teacherModel.php");
			}
		}
	function check()
	{
		if(isset($_SESSION["session_id"]))
			{
					return 1;
			}
		else
		{
		      return 0;
		}
	}
		
?>

<html>
<head>
<link rel="stylesheet" href="/exambuzz/css/Login.css" />
<!-- <link rel="stylesheet" href="css/teachermodule.css" /> -->
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" />
<link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
<link href="css/noSelect.css" rel="stylesheet" />
<script src="keyDisable.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<title>Exambuzz Login</title>
</head>
<body class="noselect" oncontextmenu="return false;" ondragstart="return false;">

	<section class="top-strip">
		<img id="logo" src="/exambuzz/img/small.png" width="100px" />
		
		<div class="title">
			<h1>Exambuzz</h1>
					<p>To give students quality knowledge and test them so that they can create a better future.</p>
				
		</div>
		<img id="sampleBackground" src="/exambuzz/img/backexam.png" width="50%">
		<img id="deskart" src="/exambuzz/img/deskart.png" width="40%">
		
		<!-- <div class="login-frame">
			<div id="strip">
				<center><h2>Signin</h2></center>
			</div>
			
			<form class="padding-setup" method="POST">
				<input type="text" placeholder="Username" required="required"><br />
				<input type="password" placeholder="Password" required="required"><br />
				<center><input type="submit" value="Sign In"><br />
				</center>
			</form>
		</div>
		 -->

		 <!-- Sign In -->

		 	 <div id="myModal" class="modal">

                          <!-- Modal content -->
                          <div class="modal-content" id="divs">
                            <span class="close">&times;</span>
                            <table style="width:100%;">
                                <tr>
                                    <td >
                           <div id="leftSign" style="padding:-1em">
                           <center> <h2>Sign In</h2>
                           		<form class="padding-setup" method="POST">
							<input type="text" id="username" name="username" placeholder="Username" required="required" autocomplete="off" autofocus><br />
							<input type="password" id="password" name="password" placeholder="Password" required="required"><br />
					                            <div id="bottomButton">
                            <br>
                            <input type="submit" id="ok" class="buttons one" name="ok" value="Sign In"  onclick="return checkIt();">
                            <p id="errMsg"></p>
                            </div></center>
                            </form>
                            </div>
                            </td>
                            <td >
                                <div id="rightSign">
                            	<center><img src="img/rocket.png" width="150px"></center>
                            </div>
                            </td>
                            </tr>
                            </table>
                          </div>

                        </div>

                        		<!-- End of signin -->


		 <input type="button" Value="Sign in" id="signIn">
	</section>
	<section class="main-content">
<!--	    <img id="magicback" src="img/magic.png" height="100%">-->
		<center><h1 class="header">Features</h1></center>

		<center><div class="content">
				<div class="row" > 
					  <div class="column">
					    <div class="card" style ="border:3px solid #CE93D8" >
					    	<img class="typeImage" src="/exambuzz/img/test.png">
					      <div class="container" >
					      	
					      	<div class="inside">	
						      	<h3 style="border-bottom:2px solid #ff00e4;">Custom Test</h3>
						 </div>
						<ul type=".">
							<li>
								Prepare test according to your requirement.
							</li>
							<li>
								Upload custom test (section/subject).
							</li>
						</ul>
					      </div>
					    </div>
					  </div>

					  <div class="column">
					    <div class="card" style ="border:3px solid #4FC3F7">
					    	<img class="typeImage" src="/exambuzz/img/study.png">

					      <div class="container">
					      <div class="inside">
						     
						      <h3 style="border-bottom:2px solid #19a5ad;">Study Material</h3>
					      </div>
                        <ul type=".">
							<li>
								Upload study material for students to prepare.
							</li>	
							<li>
								Share classroom notes with students.
							</li>

						</ul>							
					      </div>
					    </div>
					  </div>

					   <div class="column">
					    <div class="card" style="border:3px solid #ef9c38;">
					    <img class="typeImage" src="/exambuzz/img/evaluation.png">

					      <div class="container">
					      <div class="inside">
						    
						      <h3 style="border-bottom:2px solid #f00;">Smart Evaluation</h3>
					      </div>
                        <ul type=".">
							<li>
								Student can evaluate their own result.
							</li>
							<li>
								Different graphics feature to see result.
							</li>
						</ul>                            </p>
					      </div>
					    </div>
					  </div>
			</div></center>	
	</section>
	
	<!-- <section class="testmonial-section">
		<center><h1 class="header">Testimonial</h1></center>
		<div class="testmonial">
			<div class="testament"><img  src="img/nishit.jpg" width="150px"/></div>
			<div class="description">
				blahblahblahgwfefbbajhfbahfbajhfbajfbajfhajfbajfajfva
				blahblahblahgwfefbbajhfbahfbajhfbajfbajfhajfbajfajfva
				blahblahblahgwfefbbajhfbahfbajhfbajfbajfhajfbajfajfva
				blahblahblahgwfefbbajhfbahfbajhfbajfbajfhajfbajfajfva
				blahblahblahgwfefbbajhfbahfbajhfbajfbajfhajfbajfajfva
			</div>
		</div>
	</section> -->

	<section class="about-section">
		<div id="aboutLeft">
			<center><h4>About</h4>
			            
			     <a style="text-decoration:none;color:#fff;" href="contact.html">Our Team</a>
			     
			     <div class="social">
			         <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-linkedin"></a>
                    <a href="#" class="fa fa-instagram"></a>
			         
			     </div>

				</center>
		</div>
		<div id="aboutRight">
			<center><h4>Contact Us</h4>
			<!--<form method="POST"></form>-->
			   	<table id="contactUsTable" style="width:20em;">
					<tr>
						<td>
							<input class="message" type="text" placeholder="Name" id="name" required="required">
						</td>
					</tr>
					<tr >
						<td>
							<input class="message" type="email" placeholder="Email Id" id="emailId" required="required">
						</td>
					</tr>
					<tr>
						<td >
							<textarea id="message" placeholder="Type your message here..." rows="7" required="required"></textarea>
						</td>
					</tr>
				</table>
						<input type="submit" value="Submit" id="feedbacker" onclick="return feedBack();">
				</center>
		</div>
		
	</section>
	<section class="copyright-section">
		<p>&copy;&nbsp;&nbsp;All Rights reserved with SyncBit Technologies Pvt. Ltd.</p><br>
		<img id="logo" src="img/small.png" width="80px" />
		
	</section>
	<center><p>Made with &#x2764; in India</p></center>

</body>

<script type="text/javascript">
      // Get the modal
      var modal = document.getElementById('myModal');
      // Get the button that opens the modal
      var btn = document.getElementById("signIn");
      var ok = document.getElementById("ok");
    /*  var getName=document.getElementById("name");
      var getEmail=document.getElementById("emailId");
      var message=document.getElementById("message");*/
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      		function checkIt(){
      			var username=$("#username").val().toString();
      			var password=$("#password").val().toString();
      			if(username==""||password==""||username==null||password==null){
                  		        $("#errMsg").html("Please fill the required fields").css("color","#f00");
                 }/*else if(password.length<8||password.length>16){
                     $("#errMsg").html("Password length should be between 8-16").css("color","#f00");
                 }*/
                 else{
      				 $.ajax({
				type:"POST",
				url:"php/login1.php",
				data:{"username":username,"password":password},
				success:function(resp){
					if(resp=="teacher"){
						 $("#errMsg").html("").css("color","#000");
						window.location.href = "php/teacherModel.php";
					}else if(resp=="student"){
					   	$("#errMsg").html("").css("color","#000");
						window.location.href = "php/studentDashboard.php";
					}
					else $("#errMsg").html("Either username or password is wrong!").css("color","#f00");
					//console.log(resp);
				}
		
			});
                 }
			return false;
      		}


      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
        
      }
                        
                        
                        
                        
                        
                        function feedBack(){
  var reEmail = /^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!\.)){0,61}[a-zA-Z0-9]?\.)+[a-zA-Z0-9](?:[a-zA-Z0-9\-](?!$)){0,61}[a-zA-Z0-9]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/;
                  			var name=$("#name").val().toString();
                  			var email=$("#emailId").val().toString();
                  			var message=$("#message").val().toString();
                  		//	console.log(name+email+messa);
                  		    if(name==""||email==""||message==""){
                  		        alert("Please fill the required fields");
                  		    }else if(reEmail.test(email) == false){
                  		         alert('Invalid Email Address');
                  		    }
                  		    else{
                  				 $.ajax({
            				type:"POST",
            				url:"php/feedback.php",
            				data:{'name':name,'email':email,'message':message},
            				success:function(resp){
            					if(resp=="success"){
            						 alert("Feedback given successfully");
            					}else if(resp=="error"){
            					   alert("Something went wrong!");
            					}
            					//alert(resp);
            					
            				}
            		
            			});
                  		}
            			return false;
      	        	}
                        
                        
                        
        
    </script>
</html>
