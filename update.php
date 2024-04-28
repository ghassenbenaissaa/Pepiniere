<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from `plante` where ID=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
    $ID=$row['ID'];
    $nom=$row['nom'];
    $categorie=$row['categorie'];
    $fleur_grain=$row['fleur_grain'];
    $spores=$row['spores'];
    $fruits=$row['fruits'];
    $bryophytes=$row['bryophytes'];
    $angiosperme=$row['angiosperme'];
    $description=$row['description'];
    $photo=$row['photo'];

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
}
  $sql="update `plante` set ID=$id ,nom='$nom',categorie='$categorie',fleur_grain='$fleur_grain',spores='$spores',fruits='$fruits',bryophytes='$bryophytes',angiosperme='$angiosperme',description='$description',photo='$upload_image' where ID=$id";



  $result=mysqli_query($con,$sql);
  if($result){
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
    <h2 align="center">Mise a jour</h2> 
    <div class="container my-5">
      <form method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label>Nom de l'arbre</label>
    <input type="text" class="form-control"  placeholder="entrée nom de l'arbre" name="nom" autocomplete="off" value=<?php echo $nom;?>>
  </div>
   <div class="form-group">
    <label>categorie</label>
    <select  class="form-control" name="categorie"> 
      <option value="<?php echo $categorie;?>"><?php echo $categorie;?></option>
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
    <label>fleur_grain</label>
    <input type="hidden" name="fleur_grain" value="0">
    <input type="checkbox" name="fleur_grain" <?php if ($fleur_grain) echo "checked" ?> value="1"> 
  </div>
  <div class="form-group">
    <label>spores</label>
    <input type="hidden" name="spores" value="0">
    <input type="checkbox" name="spores" <?php if ($spores) echo "checked" ?> value="1">
  </div>
  <div class="form-group">
    <label>fruits</label>
    <input type="hidden" name="fruits" value="0">
    <input type="checkbox" name="fruits" <?php if ($fruits) echo "checked" ?> value="1"> 
  </div>
  <div class="form-group">
    <label>bryophytes</label>
    <input type="hidden" name="bryophytes" value="0">
    <input type="checkbox" name="bryophytes" <?php if ($bryophytes) echo "checked" ?> value="1"> 
  </div>
  <div class="form-group">
    <label>angiosperme</label>
    <input type="hidden" name="angiosperme" value="0">
    <input type="checkbox" name="angiosperme" <?php if ($angiosperme) echo "checked" ?> value="1"> 
  </div>
  <div class="form-group">
    <label>description</label>
    <input type="text" class="form-control"  placeholder="text" name="description" autocomplete="off" value=<?php echo $description;?>>
  </div>
  <div class="form-group">
    <label>Photo</label>
    <input type="file" class="form-control"  placeholder="" name="photo" autocomplete="off" value=<?php echo $photo;?>>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Mise a jour</button>
</form>

    </div>

  </body>
</html>