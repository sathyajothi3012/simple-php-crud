<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'oopscrud');
class DB_con
{
function __construct()
{
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
}
//Data Insertion Function
	public function insert($fname,$lname,$emailid,$contactno,$address,$image)
	{
	$ret=mysqli_query($this->dbh,"insert into tblusers(FirstName,LastName,EmailId,ContactNumber,Address,image) 
	values('$fname','$lname','$emailid','$contactno','$address','$image')");
	//echo $this->db->last_query();exit;

	return $ret;   
	}
	// for email availblty
public function emailavailblty($emailid) {
	$result =mysqli_query($this->dbh,"SELECT EmailId FROM tblusers WHERE EmailId='$emailid'");
	return $result;
}
//contactno availblty
public function numberavailblty($contactno) {
	$result =mysqli_query($this->dbh,"SELECT ContactNumber FROM tblusers WHERE ContactNumber='$contactno'");
	return $result;
}
//Data read Function
public function fetchdata()
	{
	$result=mysqli_query($this->dbh,"select * from tblusers");
	return $result;
	}
//Data one record read Function
public function fetchonerecord($userid)
	{
	$oneresult=mysqli_query($this->dbh,"select * from tblusers where id=$userid");
	return $oneresult;
	}
	public function fetchimage($userid)
	{
	$imgfetch=mysqli_query($this->dbh,"select image from tblusers where id=$userid");
	return $imgfetch;
	}
//Data updation Function

public function update1($fname,$lname,$emailid,$contactno,$address,$userid,$image)
	{
	$updaterecord=mysqli_query($this->dbh,"update  tblusers set 
	FirstName='$fname',LastName='$lname',EmailId='$emailid',ContactNumber='$contactno',Address='$address',image='$image' where id='$userid' ");
	return $updaterecord;
	}

	public function update2($fname,$lname,$emailid,$contactno,$address,$userid)
	{
	$updaterecord=mysqli_query($this->dbh,"update  tblusers set 
	FirstName='$fname',LastName='$lname',EmailId='$emailid',ContactNumber='$contactno',Address='$address' where id='$userid' ");
	return $updaterecord;
	}
//Data Deletion function Function
public function delete($rid)
	{
	$deleterecord=mysqli_query($this->dbh,"delete from tblusers where id=$rid");
	return $deleterecord;
	}
}
?>