 <?php
// error_reporting(-1);
// ini_set('display_errors', 1); 
// include function file
include_once("function.php");
//Object
$updatedata=new DB_con();
if(isset($_POST['submit']))
{
// Get the userid                                                                                                                       
$userid=intval($_GET['id']);
// Posted Values
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];

$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="upload/".$filename;
move_uploaded_file($tempname,$folder);

//Function Calling
$emailid=new DB_con();
// Getting Post value
$uemail= $_POST["emailid"];
$sql1=$emailid->emailavailblty($uemail);

// $num=mysqli_num_rows($sql1);

$contactno=new DB_con();
// Getting Post value
$ucontactno= $_POST["contactno"];
$sql1=$contactno->numberavailblty($ucontactno);

$num2=mysqli_num_rows($sql1);



// //echo '<pre>';print_r($num);exit;
// if($num > 0){
//     //echo "email already exist";
//     echo "<h3 style='color:red'>This email already exist.......</h3>";

//     echo "<script>$('#submit').prop('disabled',true);</script>";
   
//     return false;
// }  if($num2 > 0){
//     echo "<h3 style='color:red'>This contact number  already exist.......</h3>";
//     echo "<script>$('#submit').prop('disabled',true);</script>";
   
//     return false;
// } else{
if(empty($filename)){
    $sql = $updatedata->update2($fname,$lname,$uemail,$ucontactno,$address,$userid);
}   else {
    $sql = $updatedata->update1($fname,$lname,$uemail,$ucontactno,$address,$userid,$folder);
} 

// Mesage after updation
echo "<script>alert('Record Updated successfully');</script>";
// Code for redirection
echo "<script>window.location.href='view.php'</script>";
}
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- Latest compiled and minified CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<style>
form{

padding: 5%;
margin: auto;
border: double black;
width: 50%;
}
h3{
text-align: center;

}
.imageThumb {
  max-height: 75px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
</style>
</head>

<body>

    <div class="container">

        <div class="row">

        </div>

        <?php
// Get the userid
$userid=intval($_GET['id']);
$onerecord=new DB_con();
$sql=$onerecord->fetchonerecord($userid);
$cnt=1;
while($row=mysqli_fetch_array($sql))
  {
  ?>
        <!-- <form name="insertrecord" method="post">
            <div class="row">
                <div class="col-md-4"><b>First Name</b><br><br>
                    <input type="text" name="firstname" value="<?php // echo htmlentities($row['FirstName']);?>"
                        class="form-control" required>
                    <br><br>
                </div>
                <div class="col-md-4"><b>Last Name</b><br><br>
                    <input type="text" name="lastname" value="<?php //echo htmlentities($row['LastName']);?>"
                        class="form-control" required>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"><b>Email id</b><br><br>
                    <input type="email" name="emailid" value="<?php //echo htmlentities($row['EmailId']);?>"
                        class="form-control" required><br><br>
                </div>
                <div class="col-md-4"><b>Contactno</b><br><br>
                    <input type="text" name="contactno" value="<?php //echo htmlentities($row['ContactNumber']);?>"
                        class="form-control" maxlength="10" required>
                    <br><br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8"><b>Address</b><br><br>
                    <textarea class="form-control" name="address"
                        required><?php //echo htmlentities($row['Address']);?></textarea><br><br>
                </div>
            </div>
            <?php //} ?>
            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" name="update" value="Update">
                </div>
            </div>
        </form>


    </div>
    </div> -->

    <center>
    <!-- <div class="container"> -->
        <form name="insertrecord" method="post"enctype='multipart/form-data'>
        <div class="row">

        <div class="col-md-12"><b>Edit your details</b><br><br></div>
            <div class="row">
                <div class="col-md-6"><b>First Name</b><br><br>
                    <input type="text" class="form-control" name="firstname"  value="<?php echo htmlentities($row['FirstName']);?>"><br><br>
                </div>
                <div class="col-md-6"><b>Last Name</b><br><br>
                    <input type="text" class="form-control" name="lastname" value="<?php echo htmlentities($row['LastName']);?>"><br><br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6"><b>Email id</b><br><br>
                    <input type="email" class="form-control" name="emailid" value="<?php echo htmlentities($row['EmailId']);?>"><br><br>
                </div>
                <div class="col-md-6"><b>Contactno</b><br><br>
                    <input type="text" class="form-control" name="contactno"   value="<?php echo htmlentities($row['ContactNumber']);?>"><br><br>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6"><b>Address</b><br><br>
                    <input class="form-control" name="address"  value="<?php echo htmlentities($row['Address']);?>"><br><br>
                </div>
                <div class="col-md-6"><b>Image</b><br><br>
                <input type="file"  class="form-control" name="uploadfile"  id="uploadfile"/><br><br>
                <img src= "<?php echo htmlentities($row['image']);?>" height="100" width="100"/>
                    <!-- <input type="file" class="form-control" name="image" value=" <?php //echo htmlentities($row['folder']);?>"> -->
                </div>
            </div>
            <?php } ?>
            <div class="row" style="margin-top:1%">
                <div class="col-md-6">
                <input type="submit" name="submit" value="submit">
                </div>
                <div class="col-md-6">
             <button>  <a href="view.php"> click to view the datas</a></button> 
            </div>

            </div>

        </form>
    </div>
    <!-- </div> -->
    </center>
    <script>
            if (window.File && window.FileList && window.FileReader) {
    $("#uploadfile").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">New image</span>" +
            "</span>").insertAfter("#uploadfile");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          
        });
        fileReader.readAsDataURL(f);
      }
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support this File type")
  }
        </script>
</body>
</htm