<?php
include 'connect.php';
include 'menu.php';
if (isset($_POST['submit']))
{
  $nom=$_POST['nom'];
  $categorie=$_POST['categorie'];
  $fleur_grain=$_POST['fleur_grain'];
  $spores=$_POST['spores'];
  $fruits=$_POST['fruits'];
  $bryophytes=$_POST['bryophytes'];
  $angiosperme=$_POST['angiosperme'];
  $description=$_POST['description'];
  $photo=$_FILES['photo'];
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
  $upload_image='image/'.$imagefilename;
  move_uploaded_file($imagefiletemp,$upload_image);
  
  $sql="insert into plante (nom,categorie,fleur_grain,spores,fruits,bryophytes,angiosperme,description,photo)
  values('$nom','$categorie','$fleur_grain','$spores','$fruits','$bryophytes','$angiosperme','$description','$upload_image')";

}
  $result=mysqli_query($con,$sql);
  if($result){
    //echo "data inserted";
    header('location:index.php');
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
    <h2 align="center">Ajout d'arbre</h2>
    <div class="container my-5">
      <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nom de l'arbre</label>
    <input type="text" class="form-control"  placeholder="entrée nom de l'arbre" name="nom" autocomplete="off">
  </div>
   <div class="form-group">
    <label>Categorie</label>
    <select  class="form-control" name="categorie"> 
      <option value=""></option>
      <?php 
          require_once 'connect.php';
          $lisc ="select * from `categorie`";
          $resul=mysqli_query($con,$lisc);
    while($ligne=mysqli_fetch_row($resul))
          {
            echo "<option value='$ligne[0]'>$ligne[1]</option>";
          }
      ?>
    </select>
  </div> 
  <div class="form-group">
    <label>Fleur_Grain</label>
    <input type="hidden" name="fleur_grain" value="0">
    <input type="checkbox" name="fleur_grain" value="1">
  </div>
  <div class="form-group">
    <label>Spores</label>
    <input type="hidden" name="spores" value="0">
    <input type="checkbox" name="spores" value="1">
  </div>
  <div class="form-group">
    <label>Fruits</label>
    <input type="hidden" name="fruits" value="0">
    <input type="checkbox" name="fruits" value="1">
  </div>
  <div class="form-group">
    <label>Bryophytes</label>
    <input type="hidden" name="bryophytes" value="0">
    <input type="checkbox" name="bryophytes" value="1">
  </div>
  <div class="form-group">
    <label>Angiosperme</label>
    <input type="hidden" name="angiosperme" value="0">
    <input type="checkbox" name="angiosperme" value="1">
  </div>
  <div class="form-group">
    <label>Description</label>
    <input type="text" class="form-control"  placeholder="text" name="description" autocomplete="off">
  </div>
  <div class="form-group">
    <label>Photo</label>
    <input type='file' class="form-control" name='photo' placeholder='' class="" value='' autocomplete="off">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

    </div>

  </body>
</html>