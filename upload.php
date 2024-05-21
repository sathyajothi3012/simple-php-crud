<?php
error_reporting(-1);
ini_set('display_errors', 1);
// echo'<pre>';
// print_r($_file_array);

if (isset($_FILES['file_array'])) 
{
   $name_array=$_FILES['file_array']['name'];
   $tmp_name_array=$_FILES['file_array']['tmp_name'];
   $type_array=$_FILES['file_array']['type'];
   $size_array=$_FILES['file_array']['size'];
   $error_array=$_FILES['file_array']['error'];
   print_r($name_array);

   for ($i=0; $i < count($tmp_name_array) ; $i++) { 
    $filename=$_FILES["file_array"]["name"][$i];
    $tempname=$_FILES["file_array"]["tmp_name"][$i];
    $folder="upload/".$filename;
    if(move_uploaded_file($tempname,$folder)){
    //    echo 'tmp'.$tmp_name_array[$i];
    //    if (move_uploaded_file($tmp_name_array[$i],"upload/".$name_array[$i])) {
        echo"<br>";
          echo $name_array[$i]."upload is complete <br>";
       }else{
           echo "move_uploaded_file function failed for".$name_array[$i]."<br>";
       }
   }

}

?>
