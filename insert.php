<?php
error_reporting(-1);
ini_set('display_errors', 1);
// include database connection file
require_once'function.php';
// Object creation
$insertdata=new DB_con();

if(isset($_POST['insert']))
{

// Posted Values
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$emailid=$_POST['emailid'];
$contactno=$_POST['contactno'];
$address=$_POST['address'];

    $emailid=new DB_con();
    // Getting Post value of emil
    $uemail= $_POST["emailid"];
    $sql1=$emailid->emailavailblty($uemail);
    
    $num=mysqli_num_rows($sql1);

    $contactno=new DB_con();
    // Getting Post value of contactno
    $ucontactno= $_POST["contactno"];
    $sql1=$contactno->numberavailblty($ucontactno);
    
    $num2=mysqli_num_rows($sql1);

    if($num > 0){
        //echo "<script>alert('email already exist ');</script>";
        echo "<h1 style='color:red'> Email already exist.</h1>";
 
        echo "<script>$('#submit').prop('disabled',true);</script>";
       
        return false;
    }  if($num2 > 0){
        //echo "<script>alert('contactno already exist ');</script>";
        echo "<h1 style='color:red'>contact number  already exist.</h1>";

        echo "<script>$('#submit').prop('disabled',true);</script>";
       
        return false;
    } 
     else  { 
        $sql=$insertdata->insert($fname,$lname,$uemail,$ucontactno,$address);  

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
}}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>

<body>
    <div class="container">
        <form name="insertrecord" method="post">
            <div class="row">
                <div class="col-md-4"><b>First Name</b><br><br>
                    <input type="text" name="firstname" class="form-control" required><br><br>
                </div>
                <div class="col-md-4"><b>Last Name</b><br><br>
                    <input type="text" name="lastname" class="form-control" required><br><br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4"><b>Email id</b><br><br>
                    <input type="email" name="emailid" class="form-control" required><br><br>
                </div>
                <div class="col-md-4"><b>Contactno</b><br><br>
                    <input type="text" name="contactno" class="form-control" maxlength="10" required><br><br>
                </div>
            </div>



            <div class="row">
                <div class="col-md-8"><b>Address</b><br><br>
                    <textarea class="form-control" name="address" required></textarea><br><br>
                </div>
            </div>

            <div class="row" style="margin-top:1%">
                <div class="col-md-8">
                    <input type="submit" id="submit" name="insert" value="Submit">
                </div>
            </div>



        </form>
    </div>
    </div>
</body>

</html>