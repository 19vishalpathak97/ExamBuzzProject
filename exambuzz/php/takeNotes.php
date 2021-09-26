<?php
include 'dbconn.php';
session_start();
$username=$_SESSION['username'];

/*echo "<script>console.log($research)</script>";*/
$x=check();
	if($x==0)
		header("Location: /exambuzz/Login.php");
	function check()
	{
		if($_SESSION["session_id"])
			{
					return 1;
					
					/*$query="select teachername,filepath,topicname from notes where class like '%$combinedClass%';";
					$queryFire=mysqli_query($query,$conn);*/
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
    <link rel="stylesheet" href="/exambuzz/css/availableDataFormat.css" />
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
    <link rel="stylesheet" href="../css/noSelect.css">
    <script src="../keyDisable.js"></script>
  
</head>
    
<title>
    Exambuzz
    
</title>
    
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

        <section class="left availableTest">

                <h1>Notes</h1>

            <div class="rower" >
                
            <?php 
                    $initialQuery="select year,department from register_login where email='$username';";
                    $initialQueryFire=mysqli_query($conn,$initialQuery);
                    $row = mysqli_fetch_assoc($initialQueryFire);
                   $year=$row["year"];
                   $testid=0;
                   $dept=$row["department"];
                    $query="select teachername,filepath,topicname,year,department from notes where year ='$year' and department = '$dept';";
					$queryFire=mysqli_query($conn,$query);       
                   // if($queryFire){
                        while($rows=mysqli_fetch_assoc($queryFire)){ $testid++;
                        
            ?>
              <!--  <div class="labelsTest">
                <div class="innerModule">
                <h3><?php echo $rows["topicname"];?></h3>
                <p>
                    Uploaded By : <?php echo $rows["teachername"];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Year : <?php echo $row["year"];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Department : <?php echo $row["department"];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" id="edit" value="Download" onclick="location.href='<?php echo $rows["filepath"];?>'">
                   
                </p>
            
                </div>
               
            </div>
            
            
            -->
            
            
            
            
             
					  <div class="columner">
					    <div class="carder" style ="border:3px solid #009688" >
					      <div class="containerer" >
					      	
					      	<div class="insideer">	
						      	<h3><?php echo strtoupper($rows["topicname"]);?></h3>
						    </div>

							<table>
								<tr>
									<td>
										Uploaded By :
									</td>
									<td>
										<?php echo ucwords($rows["teachername"]);?>
									</td>
								</tr>
								<tr>
									<td>
										Year :
									</td>
									<td>
										<?php echo strtoupper($rows["year"]);?>
									</td>
								</tr>
								<tr>
									<td>
										Department :
									</td>
									<td>
										<?php echo strtoupper($row["department"]);?>
									</td>
								</tr>
							</table>

					        	<input type="submit" class="taketest" id="edit" value="Download" onclick="location.href='<?php echo $rows["filepath"];?>'">
								
					      </div>
					    </div>
					    	
						</div>	    
							
					  
					 
			
            
            
            
            
            
            
            
            
            
            
            
            
            
          <?php if($testid%3==0){ ?>
 		
 		    <br>
 		    
 		<?php }
 		   
 		} ?>
 		    </div>
        </section>
       
</body>
</html>


