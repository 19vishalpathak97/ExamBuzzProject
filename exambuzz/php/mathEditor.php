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



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
   <title>
    Exambuzz
</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"></meta>

    <script type='text/javascript'>
      if (org) {
        alert("org already defined, could not set options");
      } else {
        var org = { mathdox: { formulaeditor: { options: {
          dragPalette:true
        }}}};
      }
    </script>
    
    
     <meta charset="UTF-8">
    <link rel="stylesheet" href="/exambuzz/css/teachermodule.css" />
    <link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!-- <link rel="shortcut icon" href="favic.ico" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    
    
    <script type='text/javascript' src='../org/mathdox/formulaeditor/main.js'>
    </script>
    <style type='text/css'>
      p {
        margin-top:2ex;
        margin-bottom:2ex;
      }
    </style>
    
    <script>
    	$(document).ready(function(){
    		$("#user-img").click(function(){
    			$(".content").slideToggle();
    		});
    		
    		
    	});
    
    </script>
   <!-- <link rel="stylesheet" href="../css/noSelect.css">-->
    <script src="../keyDisable.js"></script>
  </head>
  <body class="noselect" ondragstart="return false;" oncontextmenu="return false;">
      
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
        
        
        
        
        <section class="left" style="margin-top:2em;">
            <h2>Create your questions...!</h2>
            <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
    <p></p>
    <textarea class='mathdoxformula' rows='10' cols='80'>
      &lt;OMOBJ&gt;
        &lt;OMS cd='editor1' name='input_box'/&gt;
      &lt;/OMOBJ&gt;
    </textarea>
       
        </section>
        
        
        
        
        
        
        
        
        
    
  </body>
</html>

