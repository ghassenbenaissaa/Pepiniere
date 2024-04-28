<?php 
include 'connect.php';
if(isset($_GET['deleteidcont'])){
	$id=$_GET['deleteidcont'];
	$sql="delete from contact where id=$id";
	$result=mysqli_query($con,$sql);
	if($result){
		//echo "deleted successfull";
		header('location:listecontact.php');
	}else 
	{die(mysqli_error($con));}

}
?>