<?php 
include 'connect.php';
include 'menu.php';
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['nom'])) { ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pepiniere de gaston</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /> 
  <script type="text/javascript" src="./script/script.js"></script>
  
  <style>
       img {
          width: 50px;
       }
  </style>
</head>
<body> 
           <br /> 
           <div class="container">
           <h2>Salut, <?php echo $_SESSION['nom']?></h2>
           <a href="../../sitepep/login/logout.php"class="btn btn-primary">Logout</a>  
                <h2 align="center">Les plantes</h2>     
                <br />  
                <div class="table-responsive">  
                     <table id="plant_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
     <td scope="col">#</td>
      <td scope="col">Nom</td>
      <td scope="col">Categorie</td>
      <td scope="col">Fleur_Grain</td>
      <td scope="col">Spores</td>
      <td scope="col">Fruits</td>
      <td scope="col">Bryophytes</td>
      <td scope="col">Angiosperme</td>
      <td scope="col">Description</td>
      <td scope="col">Photo</td>
      <td scope="col">#</td>  
                                  
                               </tr>  
                          </thead>  
                          <?php
$sql="select * from `plante` order by ID desc";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result))
    {
        $ID=$row['ID'];
        $nom=$row['nom'];
        $categorie=$row['categorie']; 

        if ($row['fleur_grain']) $fleur_grain="Oui" ;else $fleur_grain= "Non" ;
        if ($row['spores']) $spores="Oui" ;else $spores= "Non" ;
        if ($row['fruits']) $fruits="Oui" ;else $fruits= "Non" ;
        if ($row['bryophytes']) $bryophytes="Oui" ;else $bryophytes= "Non" ;
        if ($row['angiosperme']) $angiosperme="Oui" ;else $angiosperme= "Non" ;
        $description=$row['description'];
        $photo=$row['photo'];
        echo ' <tr>
        <th scope="row">'.$ID.'</th>
        <td>'.$nom.'</td>
        <td>'.$categorie.'</td>
        <td>'.$fleur_grain.'</td>
        <td>'.$spores.'</td>
        <td>'.$fruits.'</td>
        <td>'.$bryophytes.'</td>
        <td>'.$angiosperme.'</td>
        <td>'.$description.'</td>
        <td><img src='.$photo.' /></td>
        <td>
        <a href="update.php? updateid='.$ID.'"class="btn btn-primary">Modifier</a> 
        <a href="delete.php? deleteid='.$ID.'" class="btn btn-danger" onclick = "return confirmation();" >Supprimer</a>
        </td>
                </tr>';
    }   
}
?> 
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
  
</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#plant_data').DataTable();  
 });  
 </script>  
 <?php
}else {
     header("location: ../../sitepep/login/login.php");
     exit();
}

?>

 