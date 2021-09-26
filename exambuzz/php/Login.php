<html>
<head>
<link rel="stylesheet" href="/exambuzz/css/Login.css" />
<!-- <link rel="stylesheet" href="css/teachermodule.css" /> -->
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>Exambuzz Login</title>
</head>
<body>

	<section class="top-strip">
		<img id="logo" src="/exambuzz/img/small.png" width="100px" />
		
		<div class="title">
			<h1>Exambuzz</h1>
					<p>To give students quality knowledge and test them so that they can create a better future.</p>
				
		</div>
		<img id="sampleBackground" src="/exambuzz/img/backexam.png" width="100%">
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
                          <div class="modal-content">
		                   <span class="close">&times;</span>
		                   <div id="leftSign" style="width: 50%">
				           <center> 
				           		<h2>Sign In</h2>
				           		<form class="padding-setup" action="/exambuzz/php/login1.php" method="POST">
							<input type="text" name="username" placeholder="Username" required="required"><br />
							<input type="password" name="password" placeholder="Password" required="required"><br />
						<!--<p>Need an Account&nbsp;&nbsp;&nbsp;<a href="#">Register here!</a></p></center>-->
							</form>
				           		
							<div id="bottomButton">
				            			<br>
				            			<input type="submit" id="ok" class="buttons one" name="ok" value="Sign In">
				            		</div>
				           </center>
		                   </div>
                           <div id="rightSign"  style="width: 50%"></div>
                       		</div>

                        </div>

                        		<!-- End of signin -->


		 <input type="button" Value="Sign in" id="signIn">
	</section>
	<section class="main-content">
		<center><h1 class="header">Features</h1></center>

		<center><div class="content">
				<div class="row" > 
					  <div class="column">
					    <div class="card" style ="border:3px solid #CE93D8" >
					    	<img class="typeImage" src="/exambuzz/img/test.png">
					      <div class="container" >
					      	
					      	<div class="inside">	
						      	<h3 style="border-bottom:2px solid #ffe670;">Upload Custom Test</h3>
						 </div>
						<ul type=".">
							<li>
								Prepare test according to your requirement.
							</li>
							<li>
								Easy to upload custom test.
							</li>
							<li>
								Revaluate students result.
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
						     
						      <h3 style="border-bottom:2px solid #ffe670;">Study Material</h3>
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
						</ul>
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
			<center><h3>About</h3>
				<ul type="none">
					<li>
						<a href="#">Our Team</a>
					</li>
				</ul>
				</center>
		</div>
		<div id="aboutRight">
			<center><h3>Contact Us</h3>
				<table id="contactUsTable">
					<tr>
						<td>
							<input id=contactname type="text" placeholder="Name">
						</td>
					</tr>
					<tr  colspan="2">
						<td>
							<input  id=contactmail type="text" placeholder="Email Id">
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<textarea id="message" placeholder="Type your message...." cols="50" rows="7"></textarea>
						</td>
					</tr>
				</table>
						<input type="submit" value="Submit">
				</center>
		</div>
		
	</section>
	<section class="copyright-section">
		<p>&copy;&nbsp;&nbsp;All Rights reserved</p><p>Developed by team Vortex</p>
		<p><img id="logo" src="/exambuzz/img/small.png" width="120px" /></p>
	</section>

</body>

<script type="/exambuzz/text/javascript">
      // Get the modal
      var modal = document.getElementById('myModal');
      // Get the button that opens the modal
      var btn = document.getElementById("signIn");
      var ok = document.getElementById("ok");
      
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }
      /* Delete Test script*/
      /*deleter.onclick=function(){
            var r = confirm("Press a button!");
                if (r == true) {
                    alert("You pressed OK!");
                }
                else {
                    alert("You pressed Cancel!");
                }
      }*/
      /*End of Delete Test Script*/

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
        
      }
      ok.onclick = function() {
        modal.style.display = "none";
        
      }
    </script>
</html>
