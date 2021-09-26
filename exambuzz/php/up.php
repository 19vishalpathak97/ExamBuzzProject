  <?php
 
 if(isset($_POST['submit']))
 {	 
 //$f=$_FILES['fileToUpload']['name'];
 $file_name=$_FILES['fileToUpload']['name'];
$tmp_file=$_FILES['fileToUpload']['tmp_name'];
	
	
	echo $file_name;
	
	move_uploaded_file($tmp_file, $file_name);
	
	
	echo "Successfully uploaded";
	/*
	 $class=$_POST['class'];
           $subject=$_POST['subject'];
           // $topic=$_POST['topic'];
            
	
	
	
	
   
$target_dir =$class."/".$subject;
$target_file=$target_dir."/".$file_name;

  
   /* mkdir($class."/");
	mkdir($class."/".$subject."/");
  
    

// mkdir($class."/");
 if (!file_exists($class)) {
    mkdir($class."/");
  	mkdir($class."/".$subject);

    move_uploaded_file($tmp_file, $target_file);
	
 }
 else
 {
	//	echo  "Already exists";
		if(!file_exists($class))
		{
				mkdir($class."/".$subject);
		       move_uploaded_file($tmp_file, $target_file);
		}
		else
		{
						move_uploaded_file($tmp_file, $target_file);
		}	
	
		
 }

	*/
	
	
}
?>




<html>


<body>



 <form  method="POST" action="up.php" enctype="multipart/form-data">
                            <p>Class : 
                            <input type="text" name="class"></input></p>
                             <div id="sider">
                                
                              
                            Subject :
                            <input type="text" name="subject"><hr>
                             Topic :
                            <input type="text" name="topic"><br>
                            </input>
                            </div>
                            <p>Upload Notes: <input  type="file" name="fileToUpload" >
                            </p>
                            <div id="bottomButton">

                            <input type="submit" id="uploadnotes" class="buttons one" name="submit" value="submit">
                             </form>
                            <input type="button" class="buttons" name="cancel" id="cancel1" value="CANCEL">
                            </div>
                          </div>
                            </form>


























</body>
</html>