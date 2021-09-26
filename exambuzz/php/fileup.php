<?php
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
   
   //echo "Hello";
    $no_files = count($_FILES["files"]['name']);   //count number of files
   //echo $no_files;
    $testname=strtolower($_POST['testname']); // testname is posted
    //$csvcount=$_POST['csvcount'];// csv count in multiple files
   //echo $testname;
   if (!is_dir('../upload')){
	mkdir('../upload', 0777, true);
	}
	
   if (!is_dir('../upload'.'/'.$testname)){
	mkdir('../upload'.'/'.$testname, 0777, true);
	}
   
  
   

   
   
   

    
    for ($i = 0; $i < $no_files; $i++) {
        if ($_FILES["files"]["error"][$i] > 0) {
            echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
        } else {
            
            $filename= $_FILES["files"]["name"][$i];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            
           // if(($csvcount=='1') && $ext == 'csv')
            //{
                $newfilename=$testname.'.'.$ext;
                move_uploaded_file($_FILES["files"]["tmp_name"][0], "../upload/".$testname.'/' .strtolower($filename));
              //  echo 'File successfully uploaded : ' .$testname .'/' . $newfilename . ' ';
              
                //echo " only one file is uploaded";
                
            //}
            /*else if($ext == 'csv' && $csvcount != 1)
            {
                
                move_uploaded_file($_FILES["files"]["tmp_name"][$i],"../data/".$testname.'/' . strtolower($_FILES["files"]["name"][$i]));
               // echo 'File successfully uploaded : ' .$testname .'/' . $_FILES["files"]["name"][$i]' ';
                
                echo "CSV Uploaded Succesfully";
       
            }
            else if($ext != 'csv' && $ext != 'zip')
            {
                echo "Only CSV and Zip File Allows";
            }*/
           /* else
            {
                
                $temp="../data/".$testname;
                 move_uploaded_file($_FILES["files"]["tmp_name"][$i], "../data/".$testname.'/' . $_FILES["files"]["name"][$i]);
                //echo 'File successfully uploaded : '. $testname. '/' . $_FILES["files"]["name"][$i] . ' ';
                 echo $_FILES["files"]["name"][$i];
                   $zip = new ZipArchive;
                    $res = $zip->open("../data/".$testname.'/' . $_FILES["files"]["name"][$i]);
                    if ($res === TRUE) {
                      $zip->extractTo($temp);
                      $zip->close();
                     // echo 'woot!';
                    } else {
                     // echo 'doh!';
                    } 
                    echo "Zip uploaded succesfully";
                    
            }
                //echo $ext;
          /*  if (file_exists('uploads/' . $_FILES["files"]["name"][$i])) {
                echo 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
            } else {
                move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $_FILES["files"]["name"][$i]);
                echo 'File successfully uploaded : uploads/' . $_FILES["files"]["name"][$i] . ' ';
            }*/
            echo "Your file is succesfully uploaded";
        }
    }
    
    
} else {
    echo 'Please choose at least one file';
}

?>
