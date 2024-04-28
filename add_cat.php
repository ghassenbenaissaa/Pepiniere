<?php
include 'connect.php';
include 'menu.php';
if (isset($_POST['submit']))
{
  $nom_cat=$_POST['nom_cat'];
  $photo_cat=$_FILES['photo_cat'];
  $imagefilename=$photo_cat['name'];
print_r($imagefilename);
echo "<br>";
$imagefileerror=$photo_cat['error'];
print_r($imagefileerror);
echo "<br>";
$imagefiletemp=$photo_cat['tmp_name'];
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
  
  $sql="insert into categorie (nom_cat,photo_cat)
  values('$nom_cat','$upload_image')";
}
  $result=mysqli_query($con,$sql);
  if($result){
    //echo "data inserted";
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
    <h2 align="center">Ajout de categorie</h2>
    <div class="container my-5">
      <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nom de la categorie</label>
    <input type="text" class="form-control"  placeholder="entrée nom de categorie" name="nom_cat" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Photo</label>
    <input type='file' class="form-control" name='photo_cat' placeholder='' class="" value='' autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

    </div>

  </body>
</html>