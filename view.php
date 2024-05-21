<?php
error_reporting(-1);
ini_set('display_errors', 1);
// include function file
require_once'function.php';

//Deletion
if(isset($_GET['del']))
    {
// Geeting deletion row id
$rid=$_GET['del'];
$deletedata=new DB_con();
$sql=$deletedata->delete($rid);
if($sql)
{
// Message for successfull delete
echo "<script>alert('Record deleted successfully');</script>";
echo "<script>window.location.href='http://localhost/oop_crud.php/view.php'</script>";
}
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<a href="index.php"><button class="btn btn-primary" > Insert Record</button></a><br><br>
<div class="table-responsive">                
<table id="mytable" class="table table-bordred table-striped" border="1">
<thead >
<th style="height:15%">##</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>Contact</th>
<th>Address</th>
<th>image</th>

<th>Edit</th>
<th>Delete</th>
</thead>
<tbody>
 <?php
 $fetchdata=new DB_con();
  $sql=$fetchdata->fetchdata();
  $cnt=1;
  while($row=mysqli_fetch_array($sql))
  {
  ?>
    <tr>
    <td><?php echo htmlentities($cnt);?></td>
    <td><?php echo htmlentities($row['FirstName']);?></td>
    <td><?php echo htmlentities($row['LastName']);?></td>
    <td><?php echo htmlentities($row['EmailId']);?></td>
    <td><?php echo htmlentities($row['ContactNumber']);?></td>
    <td><?php echo htmlentities($row['Address']);?></td>
    <td><img src= "<?php echo htmlentities($row['image']);?>" height="100" width="100"/><br> <?php echo htmlentities($row['image']);?></td>

 <td><a href="update.php?id=<?php echo htmlentities($row['id']);?>"><button class="btn btn-primary btn-xs" style="width: 80px;">edit</button></a></td>
 <td><a href="view.php?del=<?php echo htmlentities($row['id']);?>"><button class="btn btn-danger btn-xs" style="width: ;" onClick="return confirm('Do you really want to delete');">Delete</button></a></td>
    </tr>
<?php
// for serial number increment
$cnt++;
} ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</body>
</html>