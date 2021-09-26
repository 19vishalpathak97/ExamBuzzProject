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
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/exambuzz/css/teachermodule.css" />
    <link rel="icon" href="/exambuzz/img/small.png" type="image/gif" sizes="16x16">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <!-- <link rel="shortcut icon" href="favic.ico" />-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    	
    <style type="text/css">
  #load{
    margin-left: 1em;
    display: none;
  }
  #load2{
    margin-left: 1em;
    display: none;
  }
</style>
    
    <script>
    	$(document).ready(function(){
    		$("#user-img").click(function(){
    			$(".content").slideToggle();
    		});
    		
    		
    	});
    	

      $( document ).ready(function() {
        var currentDate = new Date();
        var date = currentDate.getDate();
        var month = currentDate.getMonth(); //Be careful! January is 0 not 1
        var year = currentDate.getFullYear();
        var time = currentDate.getTime();
        var dateString = date + "-" +(month + 1) + "-" + year +"-"+time;
        $("#timer").html(currentDate);
        //console.log(dateString);
      });
    </script>
  



    
    
    
    <!--
    
    
    <script> 
    
       var csvcount=0;
    
    
   // $(document).ready(function() {
	$("#uploadTest").click(function() {
	
	    console.log("Hello");
	
	       var testname=document.getElementById('testName').value;
	        var ins = document.getElementById('multiFiles').files.length;
                 
                    console.log(ins);
                      var form_data = new FormData();
                      form_data.append("testname",testname);
		        console.log(testname);	 
                    
                    for (var x = 0; x < ins; x++) {
                        
                        
                        var fileName=document.getElementById('multiFiles').files[x].name;
                        form_data.append("files[]", document.getElementById('multiFiles').files[x]);
                        console.log(fileName);
                  
                        var fileExtension = fileName.replace(/^.*\./, '');
                        if(fileExtension == "csv")
                        {
                             csvcount++; 
                        }
                        
                        //console.log(count);
                    form_data.append("csvcount",csvcount);
                        
                        
                    }	   
                       
                    
                    
                    $.ajax({
                        url: 'fileup.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                           		  alert(response);// $('#msg').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            		  alert(response);//$('#msg').html(response); // display error response from the PHP script
                        }
                    });
		    
	
	
	  
	
		return false;
	});
	
	 // });
	
    
    
    
    
    
    
    </script>
	 
    
    
    
    -->
    
    
    
    
    
    
    
    
<script>

    $(document).ready(function() {
	$("#submitTest").click(function() {
	
	    console.log("Hello");
	 var testname=document.getElementById('testName').value;
	 var department= document.getElementById('dept').value;//$('#txtfile').val();
	 var year= document.getElementById('year').value;//$('#txtfile').val();
	 var timeoftest=document.getElementById('timetaken').value;
	 var sectioncount=document.getElementById('sectioncount').value;
	 var multiguide=document.getElementById('multiFiles').value;
	  	
	    
	 var startdate=document.getElementById('strtdate').value;
	 var enddate=document.getElementById('endDt').value;
	 var negative=0;
	 negative = document.getElementById('negativeScheme').value;
	 
	 if((testname!=""&&testname!=null)&&(department!=""&&department!=null)&&(year!=""&&year!=null)&&(timeoftest!=""&&timeoftest!=null)&&(negative!=""&&negative!=null)&&(multiguide!=""&&multiguide!=null)){ 
	  	var teachername= <?php echo json_encode($_SESSION['username']) ?>;
	 	var form_data1 = new FormData();
         	 form_data1.append("teachername",teachername);
	  	 form_data1.append("testname",testname);
	  	 form_data1.append("department",department);
	  	 form_data1.append("year",year);
	  	 form_data1.append("timeoftest",timeoftest);
	  	 form_data1.append("sectioncount",sectioncount);
	  	 form_data1.append("startdate",startdate);
	  	 form_data1.append("enddate",enddate);
	  	 form_data1.append("negative",negative);
	  	 form_data1.append("files[]", document.getElementById('multiFiles').files[0]);
	  	 
	  	 for(var sec = 0;sec < sectioncount; sec++)
	  	 {
	  	 	var key = "sec"+sec;
	  	 	var value=document.getElementById(key).value;
	  	 	form_data1.append(key,value);
	  	 }
	  	 
	  	 
	  	 
	  	 
	  	 
	   
                
	  	
                    $.ajax({
                        url: 'uploadtestfinal.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data1,
                        type: 'post',
                        success: function (response) {
                           		  alert(response);// $('#msg').html(response); // display success response from the PHP script
                        },
                        error: function (response) {
                            		  alert(response);//$('#msg').html(response); // display error response from the PHP script
                        }
                    });
		    
	
	       
	  
	
		return false;
		
	  	}else alert("Please fill in the required details of test");
	});
});
	

    
            
</script>
    
    
    
    
    
    
    
    
    
    
        
        
        
        
       
  
  <?php
       
       
  
 
 if(isset($_POST['submit']))
 {	 
     $file_name=$_FILES['fileToUpload']['name'];
     $tmp_file=$_FILES['fileToUpload']['tmp_name'];
    // move_uploaded_file($tmp_file, $file_name);
    
    $dept=mysqli_real_escape_string($conn,strtolower($_POST['dept']));
    $year=mysqli_real_escape_string($conn,strtolower($_POST['year']));
           $subject=mysqli_real_escape_string($conn,strtolower($_POST['subject']));
     $topic=mysqli_real_escape_string($conn,strtolower($_POST['topic']));
     
     $name=$_SESSION['username'];
     $combineClass=$year."".$dept;
    if($dept!=""&&$dept!=null&&$year!=""&&$year!=null&&$subject!=""&&$subject!=null&&$topic!=""&&$topic!=null){
   
$target_dir ="../notes/".$combineClass."/".$subject;
$target_file=$target_dir."/".$file_name;

    if (!file_exists($combineClass)) {
        mkdir("../notes/".$combineClass."/");
      	mkdir("../notes/".$combineClass."/".$subject);
    
        move_uploaded_file($tmp_file, $target_file);
    	
    }
    else
     {
    	//	echo  "Already exists";
    		if(!file_exists($combineClass))
    		{
    				mkdir("../notes/".$combineClass."/".$subject);
    		       move_uploaded_file($tmp_file, $target_file);
    		}
    		else
    		{
    						move_uploaded_file($tmp_file, $target_file);
    		}	
    	
    		
     }
      
        
   					
     	$sql="INSERT INTO notes(teachername,year,department,subject,topicname,filename,filepath) VALUES ('$name','$year','$dept','$subject','$topic','$file_name','$target_file')";
   
        mysqli_query($conn, $sql);
 }else echo"<script>alert('Please fill in the required details')</script>";      
 }
?>

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
        		<center><img id="user-img" src="/exambuzz/img/user-alt.svg"  alt="user"></center>
        		<div class="content">
    		<div id="topUser">
    				<img src="/exambuzz/img/user-alt.svg"  alt="user" width="35px">
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
        <section class="left" >
            
        <div class="content-card">
                <div class="row" > 
                      <div class="column">
                        <div class="card">
                          <div class="container">
                            <div class="inside">
                                <center><h3>Test Available</h3></center>
                                
                         </div>
                                <button class="nextPages" onclick="location.href = 'AvailableTestTeacher.php';"><img src="/exambuzz/img/angle-right.png" width="15px"   /></button>
                          </div>
                        </div>
                      </div>
                      
                      
                      
                      
                      
                      
        <!-- Add Test Unit -->
                      <div class="column">
                        <div class="card">
                          <div class="container">
                          <div class="inside">
                              <center><h3>Add Test</h3></center>
                          </div>
                               <button id="myBtn" class="nextPages"><img src="/exambuzz/img/angle-right.png" width="15px" /></button>
                          </div>
                        </div>
                      </div>

                                              <!-- The Modal -->
                        <div id="myModal" class="modal" style="margin-top:-2em;">

                          <!-- Modal content -->
                          <div class="modal-content">
                            <span class="close">&times;</span>
                            <h1 style="color:#009688;">Upload Test</h1><!--
                            <p>Name : <?php echo ucwords($_SESSION["username"]);?></p>-->
                             <div id="sider">
                            Test Name : 
                            <input type="text" id="testName" required="true"></input><a style="color:#f00">&#8902;</a>
                             </div>
                            
                            
                            
                            
                            
                            <!--dfsdhfvbsdhfbsjhbswfw-->
                            
                            <p>Department : 
                            <select id="dept" required>
                              <option value="select">Select Department</option>
                              <option value="computer">Computer</option>
                              <option value="civil">Civil</option>
                              <option value="mechanical">Mechanical</option>
                              <option value="entc">E&TC</option>
                            </select><a style="color:#f00">&#8902;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            
                            Year : 
                            <select id="year" required>
                              <option value="select">Select Year</option>
                              <option value="fe">FE</option>
                              <option value="se">SE</option>
                              <option value="te">TE</option>
                              <option value="be">BE</option>
                            </select><a style="color:#f00">&#8902;</a>
                            
                            
                            </p>
                            
                           <!--wrgjewifheuighreghreighreug-->
                           
                           
                            <p>Number of sections : <input type="text" id="sectioncount" class="sectioncount" required></input><a style="color:#f00">&#8902;</a></p>
                           
                           
                           
                            
                           
                            <p>Upload Test File :<input type="file" id="multiFiles" name="files[]" required/>
                                <input type="button" class="buttons upload" name="uploadFile" id="uploadTest"  value="Upload"><img id="load" src="../img/ajax-loader.gif">
                                <img id="load2" src="../img/icons8-checkmark-480.png" width="18px"><a style="color:#f00">&#8902;</a>
                            </p>
                                    <p style="color:#f00;">(Download test format from bottom right corner.)</p>

                          





                           <div id="sider">
                            <p>Duration of Test(min) : <input type="text" id="timetaken" class="timeTaken" required></input><a style="color:#f00">&#8902;</a></p>
                           
                            </div>
                            
                           
                            
                           <div id="sectionsCount">
                             <!-- Count(Section): <input type="number" placeholder="Section Count" id="secCount"> -->
                            <a style="color:#f00">&#8902;</a>Section Details:<!-- <input type="submit" id="addMoreSec" onclick="myFunction()" value="+">-->
                          <table id="sectiontable">
                                <tr >
                                     <input type="text" id="sec0" placeholder="Section Name" disabled="disabled" >
                                </tr>
                            </table>
                            </div><br>
                            <div id="sider">
                            Start Date : <input type="date" id="strtdate" required onchange="checkState()"></input><hr> End Date : <input type="date" id="endDt" required onchange="checkDerby()"></input>
                            </div>
                            <p>Negative Marking scheme : 
                            <input type="checkbox" id="negativeMarking" name="negativeMarking" unchecked="true" onclick="derbyCheck()">
                               <select name="negative" id="negativeScheme" required>
                              <option value="select">Select</option>
                              <option value="0">0%</option>
                              <option value="15">15%</option>
                              <option value="25">25%</option>
                              <option value="33">33%</option>
                              <option value="50">50%</option>
                              <option value="100">100%</option>
                            </select>
                            </p>

                            <div id="bottomButton">

                            <input type="button" class="buttons one" id="submitTest" name="ok" value="SUBMIT">
                            <input type="button" class="buttons" name="cancel" id="cancel" value="CANCEL">
                            <input type="submit" title="Download test upload format" id="help" value="&#128240;" onclick="location.href='../test_upload_format.csv'">

                                


                            </div>
                          </div>

                        </div>
                        
                        
                        
                        <!-- Loading Script  Put ajax in here -->

                          

                          <!-- End of Loading script -->
                        
                        
                        
                        
                        
                       
        <!-- End of Add test -->              
                       <div class="column">
                        <div class="card" >
                          <div class="container">
                          <div class="inside">  
                             <center> <h3>Add Notes</h3></center>
                          </div>
                                <button id="myBtn1" class="nextPages"><img src="/exambuzz/img/angle-right.png" width="15px" /></button>


                            <!-- Add Notes Section -->
                                                   <!-- The Modal -->
                        <div id="myModal1" class="modal" style="color:#000;">

                          <!-- Modal content -->
                          <div class="modal-content" style="width:20em;">
                            <span class="close">&times;</span>
                            <h1 style="color:#009688;">Upload Notes</h1>
                            <form  method="POST" action="teacherModel.php" enctype="multipart/form-data" >
                            <p>Department  <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="dept" required>
                              <option value="select">Select Department</option>
                              <option value="computer">Computer</option>
                              <option value="civil">Civil</option>
                              <option value="mechanical">Mechanical</option>
                              <option value="entc">E&TC</option>
                            </select><a style="color:#f00">&#8902;</a><br>
                            <br>
                            Year  <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="year" required>
                              <option value="select">Select Year</option>
                              <option value="fe">FE</option>
                              <option value="se">SE</option>
                              <option value="te">TE</option>
                              <option value="be">BE</option>
                            </select><a style="color:#f00">&#8902;</a>
                            
                            
                            </p>
                             
                                
                              
                            Subject <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="subject" required="required"><a style="color:#f00">&#8902;</a><br>
                             Topic <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="topic" required="required"><a style="color:#f00">&#8902;</a><br>
                            </input>
                           
                            <p>Upload Notes<br> <input  type="file" name="fileToUpload" required="required"><img id="load" src="../img/ajax-loader.gif"><a style="color:#f00">&#8902;</a>
                                <img id="load2" src="../img/icons8-checkmark-480.png" width="18px">
                            </p>
                            <div id="bottomButton">

                            <input type="submit" id="uploadnotes" class="buttons one" name="submit" value="SUBMIT">
                             </form>
                            <input type="button" class="buttons" name="cancel" id="cancel1" value="CANCEL">
                            </div>
                          </div>
                            </form>
                        </div>
                            <!-- End of Add Notes-->

                          </div>
                        </div>
                      </div>

                      
                      <div class="column">
                        <div class="card">
                          <div class="container">
                          <div class="inside">
                             <center> <h3>Results</h3></center>
                          </div>
                               <button class="nextPages"><a href="teacherResult.php"><img src="/exambuzz/img/angle-right.png" width="15px" /></a></button>
                          </div>
                        </div>
                      </div>
            </div>
        </section>
        
        
        
        
        
        <div id="mathEditor">
            <p>Editor</p>
        </div>
    
</body>
<script type="text/javascript">
      // Get the modal
      var count=0;
      var modal = document.getElementById('myModal');
      var modal1 = document.getElementById('myModal1');
      var modal2 = document.getElementById('myModal2');
      var matheditor= document.getElementById('mathEditor');
      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");
      var btn1 = document.getElementById("myBtn1");
      var cancel = document.getElementById("cancel");
      var cancel1 = document.getElementById("cancel1");
      var cancel2 = document.getElementById("cancel2");
      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];
      var span1 = document.getElementsByClassName("close")[1];
      var span2 = document.getElementsByClassName("close")[2];
      var checkBox=document.getElementById("negativeMarking");
      var table = document.getElementById("sectiontable");
        /*Math Editor*/
        
        matheditor.onclick=function(){
            location.href="mathEditor.php";
        }
      // When the user clicks the button, open the modal 
      btn.onclick = function() {
        modal.style.display = "block";
      }

      btn1.onclick = function() {
        modal1.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
        
      }
      cancel.onclick = function() {
        modal.style.display = "none";
        
      }
       span1.onclick = function() {
        modal1.style.display = "none";
      }
      cancel1.onclick = function() {
        modal1.style.display = "none";
      }
      span2.onclick = function() {
        modal2.style.display = "none";
      }
      cancel2.onclick = function() {
        modal2.style.display = "none";
      }
      function derbyCheck(){
         if (checkBox.checked == true){
            negativeScheme.style.display = "inline-block";
            console.log("checked");
          } else {
           negativeScheme.style.display = "none";
            console.log("unchecked");
          }
        }

        function myFunction(){
            
           // sample.value=secCount;
           // console.log(count);

            //++count;
           /*var element = document.createElement("input");    

            //Assign different attributes to the element.
            element.setAttribute("type", "text");
            element.setAttribute("placeholder", "Section Name");
            //element.setAttribute("name", "Test Name");
            element.setAttribute("id","sec"+(count+1));

            // 'foobar' is the div id, where new fields are to be added
            var foo = document.getElementById("sectionsCount");

            //Append the element in page (in span).
            
            foo.appendChild(element);*/
        }
        
        
        
        
   </script>  
   
   
   
 <!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
   
   
   <script type="text/javascript">
	end=document.getElementById("endDt");
	strt=document.getElementById("strtdate");
	subButton=document.getElementById("submitTest");
	subButton.style.background="#A9A9A9";
	subButton.setAttribute("disabled","disabled");
	end.setAttribute("disabled","disabled");
	
	
	
	function checkState(){
		if(strt.value==""||strt.value==null){
			end.setAttribute("disabled","disabled");
		}else {
			end.removeAttribute("disabled");
		}
	}
	
	
	
	//console.log(strt.value);
	function checkDerby(){
		if(strt.value==""||strt.value==null) console.log("please set the start date");
		else{
			end.removeAttribute("disabled");
			ender=end.value.split("-");
			start=strt.value.split("-");
			
			if(start[0]<=ender[0]){
				if(start[1]==ender[1]){
					if(start[2]<=ender[2]){
						console.log(strt.value);
						subButton.removeAttribute("disabled");
						subButton.style.background="#009688";
					}
					else{ console.log("please choose appropriate date");
						subButton.setAttribute("disabled","disabled");
						subButton.style.background="#A9A9A9";
					}
				
				}else if(start[1]<ender[1]){
						console.log(strt.value);
						subButton.removeAttribute("disabled");
						subButton.style.background="#009688";
				}
				
				
				
				else{
				alert("please choose appropriate date");
				 subButton.setAttribute("disabled","disabled");
				 subButton.style.background="#A9A9A9";
				 }
			}else{ alert("please choose appropriate date");
				subButton.setAttribute("disabled","disabled");
				subButton.style.background="#A9A9A9";
			}
			
		}
	}
</script>
   
   
   
   
   
        
     <script>  
        var csvcount=0;
    
    
   $(document).ready(function() {
	$("#uploadTest").click(function() {
	   $("#load").show();
	   
	
	       var testname=document.getElementById('testName').value;
	        var sectioncount=document.getElementById('sectioncount').value;
               var form_data = new FormData();
               //document.write(testname);
               
               form_data.append("testname",testname);
               form_data.append("files[]", document.getElementById('multiFiles').files[0]);
                    
                    /*for (var x = 0; x < ins; x++) {
                        
                        
                        var fileName=document.form_datagetElementById('multiFiles').files[x].name;
                        form_data.append("files[]", document.getElementById('multiFiles').files[x]);
                        console.log(fileName);
                  
                        var fileExtension = fileName.replace(/^.*\./, '');
                        if(fileExtension == "csv")
                        {
                             csvcount++; 
                        }
                        
                        //console.log(count);
                    form_data.append("csvcount",csvcount);
                        
                        
                    }*/
                    
                    if(sectioncount<=1){
                        document.getElementById("sec0").removeAttribute("disabled");
                       // document.getElementById("addMoreSec").setAttribute("disabled","disabled");
                    }else if(sectioncount>1) {
                        document.getElementById("sec0").removeAttribute("disabled");
                        for(var x=0;x<sectioncount-1;x++){
                            // var row = table.insertRow(x);
                             //var cell1 = row.insertCell(x);
                        var element = document.createElement("input");    
                       
                        //Assign different attributes to the element.
                        element.setAttribute("type", "text");
                        element.setAttribute("placeholder", "Section Name");
                        //element.setAttribute("name", "Test Name");
                        element.setAttribute("id","sec"+(x+1));
            
                        // 'foobar' is the div id, where new fields are to be added
                        var foo = document.getElementById("sectionsCount");
                    //$('#sectiontable').prepend($("<tr>"+element+"</tr>"));
                        //Append the element in page (in span).
                       // cell1.innerHTML = "element";
                        foo.appendChild(element);
                    
                }  
                    }
                    
                
                
                
                
                
                
                    
                    
                    
                    
                    
                    
                    
                    $.ajax({
                        url: 'fileup.php', // point to server-side PHP script 
                        dataType: 'text', // what to expect back from the PHP script
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                           		  alert(response);// $('#msg').html(response); // display success response from the PHP script
                           		  $("#load").hide();
                           		  $("#load2").show();
                        },
                        error: function (response) {
                            		  alert(response);//$('#msg').html(response); // display error response from the PHP script
                            		  $("#load").hide();
                           		  $("#load2").hide();
                        }
                    });
		    
	
	
	  
	
		return false;
	});
	
	 });
	
    
    
    </script>
</html>
