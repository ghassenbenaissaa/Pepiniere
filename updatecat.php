<?php
include 'connect.php';
$id_cat=$_GET['updateidcat'];
$sql="Select * from `categorie`where id_categorie=$id_cat";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$nom=$row['nom_cat'];
$photoo=$row['photo_cat'];

if (isset($_POST['submit']))
{

  $nom=$_POST['nom_cat'];
  $photo=$_FILES['photo_cat'];
  $imagefilename=$photo['name'];
print_r($imagefilename);
echo "<br>";
$imagefileerror=$photo['error'];
print_r($imagefileerror);
echo "<br>";
$imagefiletemp=$photo['tmp_name'];
print_r($imagefiletemp);
echo "<br>";
$filename_separate=explode('.',$imagefilename);
print_r($filename_separate);
echo "<br>";
$file_extension=strtolower(end($filename_separate));
print_r($file_extension);
$extension=array('jpeg','jpg','png');
if(in_array($file_extension,$extension)){
  $upload_image='imagecat/'.$imagefilename;
  move_uploaded_file($imagefiletemp,$upload_image);
}
  $sql="update `categorie` set id_categorie=$id_cat,nom_cat='$nom',photo_cat='$upload_image' where id_categorie=$id_cat";



  $result=mysqli_query($con,$sql);
  if($result){
    //echo "update";
    header('location:listecat.php');
  }
  else {
    die(mysqli_error($con));
  }

}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <title>Pepiniere de gaston</title>
  </head>
  <body>
    <br /><br />
    <h2 align="center">Mise a jour</h2> 
    <div class="container my-5">
      <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nom de l'arbre</label>
    <input type="text" class="form-control"  placeholder="entrée nom de la categorie" name="nom_cat" autocomplete="off" value="<?php echo $nom;?>">
  </div>
  <div class="form-group">
    <label>Photo</label>
    <input type="file" class="form-control"  placeholder="" name="photo_cat" autocomplete="off" value="<?php echo $photoo;?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Mise a jour</button>
</form>

    </div>

  </body>
</html>