<?php

if( isset($_FILES['fileUpload']['name'])) {
      
  $total_files = count($_FILES['fileUpload']['name']);
  echo $total_files;
  
  for($key = 0; $key < $total_files; $key++) {
    
    // Check if file is selected
    if(isset($_FILES['fileUpload']['name'][$key]) 
     && $_FILES['fileUpload']['size'][$key] > 0) {
      
      $original_filename = $_FILES['fileUpload']['name'][$key];
      /*$target = $target_dir . basename($original_filename);
      $tmp  = $_FILES['fileUpload']['tmp_name'][$key];
      move_uploaded_file($tmp, $target);
    */
      echo $original_filename;
    }
    
  }
  
     
}

?>

<html>
<body>
 <form action="" method="post" enctype="multipart/form-data">
  <label> Select Files: </label>
  <input type="file" name="fileUpload[]" multiple > 
  <input type="submit" name="Submit" value="Upload" >
</form>

</form>
</body>
</html>