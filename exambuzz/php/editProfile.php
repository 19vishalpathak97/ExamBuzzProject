<?php
include 'dbconn.php';
session_start();
$username=$_SESSION['username'];
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
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/exambuzz/css/teachermodule.css" />
    <link rel="stylesheet" href="/exambuzz/css/editProfile.css" />
    <link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!-- <link rel="shortcut icon" href="favic.ico" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	
    
    
    <script>
    	$(document).ready(function(){
    		$("#savior").click(function(){
    			//$(".content").slideToggle();
    		 var form_data3 = new FormData();
    		   
    		    var user=document.getElementById('username').value;
    		    var telephone=document.getElementById('telePhone').value;
    		    if(user!=""||(telephone!=""&&telephone.length==10)||user!=null||telephone!=null){
        		    var fileName=document.getElementById('photo').value;//files[0].name;
        		    
        		    var flag="true";
        		    if(fileName == "")
        		    {
        		        flag="false";      
        		        fileName="../img/dummy.jpg";
        		        form_data3.append("fileName",fileName);
        		        form_data3.append("flag",flag);
        		    }
        		    else
        		    {
        		         form_data3.append("fileName",document.getElementById('photo').files[0],fileName);
        		        form_data3.append("flag",flag);
                        
        		             
        		    }
        		    console.log(user);
        		    console.log(telephone);
        		    console.log(fileName);
        		   
        		   form_data3.append("username",user);
        		   
        		   form_data3.append("telephone",telephone);
        		   
        		    
        		     $.ajax({
                            url: 'changeprofile.php', // point to server-side PHP script 
                            dataType: 'text', // what to expect back from the PHP script
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data3,
                            type: 'post',
                            success: function (response) {
                               		  alert(response);// $('#msg').html(response); // display success response from the PHP script
                            },
                            error: function (response) {
                                		  alert(response);//$('#msg').html(response); // display error response from the PHP script
                            }
                        });
        		    
    		    
    		    
    		}
    		    
    		return false;    
    		});
    	});

    </script>
    
    
    
    <script>
    	$(document).ready(function(){
    		$("#uploadnotes").click(function(){
    			//$(".content").slideToggle();
    			
    		 var cp=document.getElementById('cp').value;
             
    		 var np=document.getElementById('np').value;
    		
    		 var cp1=document.getElementById('cp1').value;	
    		 
    		 console.log(cp);
    		 console.log(np);
    		console.log(cp1);
    		 
    		 
    		 
    		 if(np == cp1)
    		 {
    		          		   console.log("Hello");
    		   
    		   
    		    var form_data2 = new FormData();
    		   
    		   form_data2.append("cp",cp);
    		   form_data2.append("np",np);
    		 //  form_data2.append("cp1",cp1);
    		   
    		   
    		   
    		     
                    $.ajax({
                        url: 'changepassword.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data2,
                        type: 'post',
                        success: function (response) {
                           		  alert(response);// $('#msg').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            		  alert(response);//$('#msg').html(response); // display error response from the PHP script
                        }
                    });
		    
    		 }
    		 else
    		 {
    		     
    		                
    		   

    		      alert("Invalid Password Enter ");
    		   
    		     
    		 }
    		 
    		   
    		   
    		   
    		   
    		  
    			
    			
    		return false;	
    		});
    	});

    </script>
    
    <script>
    	$(document).ready(function(){
    		$("#user-img").click(function(){
    			$(".content").slideToggle();
    		});
    	});
    </script>
    
   <link rel="stylesheet" href="../css/noSelect.css">
    <script src="../keyDisable.js"></script>
</head>
    
<title>
    Exambuzz
    
</title>
    
<body class="noselect" ondragstart="return false;" oncontextmenu="return false;">

<?php
	$query = "select * from register_login where email='$username'";
	
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	//$question=$row['question'];
?>

        <section class="top-navBar">
            
            <div class="logo">
                <img src="/exambuzz/img/small.png" onclick="location.href='/exambuzz/php/gohome.php'" width="75px" />
            </div>

           
        	<div class="contentLeft">
        		<center><img id="user-img" src="/exambuzz/img/user-alt.svg" alt="user"></center>
        		<div class="content">
    				<div id="topUser">
    				<img src="/exambuzz/img/user-alt.svg" alt="user" width="35px">
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
                    <button class="inWork" onclick="location.href='/exambuzz/contact.html'">
                        <p>Contact Us&nbsp;<img src="/exambuzz/img/call.png" width="25px" /></p>
                    </button><br/>
                </div>

        </section>

        <section class="left">
        	<div class="forms">
        			<h1>Profile</h1>
                <div id="innerContent">
                    <div id="photoSession"> 
                       <img src="<?php echo $row['profile'];?>" height="170px"><br> 
                       <input type="file" name="photo" id="photo" value="dummy.jpg" style="margin-left: -3em;">

                    </div>
                    <div id="moreDets">
                        <br>
            			<p>Name: <?php echo ucwords($row['firstname']).' '.ucwords($row['lastname']); ?></p>
            		
                        <div id="deeps">
                            <div class="labels">
                                <p>Email : <br>
                                    <input type="text" id="username" class="toChange1" value="<?php echo ucwords($username); ?>" disabled="disabled"></input>
                                </p>
                                <p>Mobile Number :  <br>
                                    <input type="tel" id="telePhone" value="<?php echo $row['contact']; ?>" class="toChange1" disabled="disabled" onkeypress="return isNumber(event);"></input>
                                </p>
                                <p><input type="submit" value="Change Password" id="chngPassword"></p>
                            </div>
        
                            <div class="inputer">
                                    <p></p>
                                    <p></p>
                            </div>
                            
                            
                            
                            
                             <div id="myModal1" class="modal1" style="color:#000">
                                    <div class="modal-contents">
                                    <span class="close">&times;</span>
                                    <h1 style="color:#009688;">Change Password</h1>
                                    <form  method="POST" enctype="multipart/form-data"  id="formData">
                                            Current Password :<br> <input type="password" class="toChange1" id="cp" placeholder="Current Password"><br><br>
                                            New Password :<br> <input type="password" id="np" class="toChange1"  placeholder="New Password"><br><br>
                                            Confirm Password :<br> <input type="password" id="cp1" class="toChange1" placeholder="Confirm Password"><br><br>
                                     <div id="bottomButton">
                                        <input type="submit" id="uploadnotes" class="buttons one" name="submit" value="SUBMIT">
                                        <input type="button" class="buttons" name="cancel" id="cancel1" value="CANCEL">
                                     </div>
                                    </form>
                                   
                                    </div>
                            </div>
                            
                            
                            
                            
                        
                         </div>
            			<div id="butts">
                			<br><input type="button" name="" value="EDIT" id="editor" onclick="enableFunction()">
                            <input type="button" name="" value="SAVE" id="savior">
                        </div>
                    </div>
        		</div>
        		
        	</div>
        </section>
</body>
<script type="text/javascript">
    
    var user=document.getElementById("username");
    var tel=document.getElementById("telePhone");
    var saver=document.getElementById("savior");
    saver.setAttribute("disabled","disabled");
    saver.style.background="#a1a1a1";
    function enableFunction(){
        user.removeAttribute("disabled");
        tel.removeAttribute("disabled");
        saver.removeAttribute("disabled");
        saver.style.background="#fff";
        saver.style.color="#009688";       
    }
    

    

      var btn = document.getElementById("chngPassword");
      var cancel1 = document.getElementById("cancel1");
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      var modal1 = document.getElementById('myModal1');
      
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal1.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal1.style.display = "none";
        
      }
      cancel1.onclick = function() {
        modal1.style.display = "none";
      }
    
    
    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
</html>
