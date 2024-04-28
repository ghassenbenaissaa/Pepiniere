<?php 
include 'connect.php';
if(isset($_GET['deleteid'])){
	$ID=$_GET['deleteid'];
	$sql="delete from plante where ID=$ID";
	$result=mysqli_query($con,$sql);
	if($result){
		//echo "deleted successfull";
		header('location:index.php');
	}else 
	{die(mysqli_error($con));}

}
?>