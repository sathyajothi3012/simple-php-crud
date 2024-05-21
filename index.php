<?php
error_reporting(0);

// include database connection file
require_once'function.php';
// Object creation
$insertdata=new DB_con();

if(isset($_POST['submit']))
{

// Posted Values
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];
// $image=$_POST['image'];
$filename=$_FILES["uploadfile"]["name"];
$tempname=$_FILES["uploadfile"]["tmp_name"];
$folder="upload/".$filename;
move_uploaded_file($tempname,$folder);

    // $emailid=new DB_con();
    // // Getting Post value of emil
    // $uemail= $_POST["emailid"];
    // $sql1=$emailid->emailavailblty($uemail);
    
    // $num=mysqli_num_rows($sql1);

    // $contactno=new DB_con();
    // // Getting Post value of contactno
    // $ucontactno= $_POST["contactno"];
    // $sql1=$contactno->numberavailblty($ucontactno);
    
    // $num2=mysqli_num_rows($sql1);

    // if($num > 0){
    //     //echo "<script>alert('email already exist ');</script>";
    //     echo "<h1 style='color:red'> Email already exist.</h1>";
 
    //     echo "<script>$('#submit').prop('disabled',true);</script>";
       
    //     return false;
    // }  if($num2 > 0){
    //     //echo "<script>alert('contactno already exist ');</script>";
    //     echo "<h1 style='color:red'>contact number  already exist.</h1>";

    //     echo "<script>$('#submit').prop('disabled',true);</script>";
       
    //     return false;
    // } 
    //  else  { 
        echo"ok";exit;
        $sql=$insertdata->insert($fname,$lname,$emailid,$contactno,$address,$folder);  

    if($sql)
{

// Message for successfull insertion
echo "<script>alert('Record inserted successfully');</script>";
}
else
{
// Message for unsuccessfull insertion
echo "<script>alert('Something went wrong. Please try again');</script>";
echo "<script>window.location.href='index.php'</script>";
}
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

    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/additional-methods.js"></script>

    <style>
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
    form {

        padding: 5%;
        margin: auto;
        border: double black;
        width: 50%;
    }

    h3 {
        text-align: center;

    }


    .error {
        color: red;
        margin-left: 5px;
    }
    </style>

</head>

<body>
    <script>
      $(document).ready(function() {
        $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than {0}');


            $.validator.addMethod('alphaspacedot', function (value) {
               return /^[A-Za-z\. ]*$/.test(value);
           }, "Please enter only alphabetic characters,space and dot");

            $("#registratdion-form").validate({
                rules: {
                    firstname: {
                        required: true,
                        alphaspacedot: true
                    },
                    lastname: {
                        required: true,
                        alphaspacedot: true,
                    },

                    emailid: {
                        required: true,
                        email: true,
                    },
                    contactno:{
                        required: true,
                        number:true,
                        minlength: 10,
                        maxlength:10,
                    },
                    address: {
                        required: true,

                    },
                    uploadfile: {
                required: true,
               // extension: "jpg,jpeg",
                filesize: 2000048,
            }
                },
                messages: {
                    firstname: {
                        required: "This field is required",
                        //alphaspacedot:"letter only allowed",
                    },
                    lastname: {
                        required: 'This field is required',
                        alphaspacedot:"letter only allowed",
                    },
                    emailid: 'Enter a valid email',
                    contactno:{
                        required: 'This field is required',
                        number:"number only allowed",
                    },
                    address: {
                        required: 'This field is required',
                    }
                },
              //  submitHandler: function(insertrecord)
              submitHandler:function(form) 
                 {
                    form.submit();
                }
            });
        });
    </script>
    <center>
        <!-- <div class="container"> -->
        <form name="insertrecord" id="registration-form" method="post" enctype='multipart/form-data'>
            <div class="row">

                <div class="col-md-12"><b>Enter your details</b><br><br></div>
                <div class="row">
                    <div class="col-md-6"><b>First Name</b><br><br>
                        <input type="text" class="form-control" id="firstname" name="firstname" class="form-control"
                            required><br><br>
                    </div>
                    <div class="col-md-6"><b>Last Name</b><br><br>
                        <input type="text" class="form-control" id="lastname" name="lastname" class="form-control"
                            required><br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6"><b>Email id</b><br><br>
                        <input type="email" class="form-control" id="emailid" name="emailid" class="form-control"
                            required><br><br>
                    </div>
                    <div class="col-md-6"><b>Contactno</b><br><br>
                        <input type="text" class="form-control" id="contactno" name="contactno" class="form-control"
                            maxlength="10" required><br><br>
                    </div>
                </div>



                <div class="row">
                    <div class="col-md-6"><b>Address</b><br><br>
                        <input class="form-control" name="address" id="address" required><br><br>
                    </div>
                    <div class="col-md-6"><b>Image</b><br><br>
                    <input type="file"  class="form-control" name="uploadfile" id="uploadfile" value=""/>
                           <!-- <input type="file" class="form-control" name="image" required> -->
                        <br><br>
                    </div>
                </div>

                <div class="row" style="margin-top:1%">
                    <div class="col-md-6">
                        <input type="submit" id="submit" name="submit" value="submit">
                    </div>
                    <div class="col-md-6">
                        <button> <a href="view.php"> click to view the Record</a></button>
                    </div>

                </div>

        </form>
        </div>
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
            "<br/><span class=\"remove\">Remove image</span>" +
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
        <!-- </div> -->
    </center>
</body>

</html>