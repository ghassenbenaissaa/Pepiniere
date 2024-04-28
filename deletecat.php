<?php 
include 'connect.php';
if(isset($_GET['deleteidcat'])){
	$id_cat=$_GET['deleteidcat'];
	$sql="delete from categorie where id_categorie=$id_cat";
	$result=mysqli_query($con,$sql);
	if($result){
		//echo "deleted successfull";
		header('location:listecat.php');
	}else 
	{die(mysqli_error($con));}

}
?>