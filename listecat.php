<?php 
include 'connect.php';
include 'menu.php';
?>
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
                <h2 align="center">Les categories</h2>  
                <br />  
                <div class="table-responsive">  
                     <table id="categorie_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
     <td scope="col">#</td>
      <td scope="col">Nom</td>
      <td scope="col">Photo</td>
      <td scope="col">#</td>  
                                  
                               </tr>  
                          </thead>  
                          <?php
$sql="select * from `categorie` order by id_categorie desc";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result))
    {
        $id_categorie=$row['id_categorie'];
        $nom_cat=$row['nom_cat'];
        $photo_cat=$row['photo_cat'];
        echo ' <tr>
        <th scope="row">'.$id_categorie.'</th>
        <td>'.$nom_cat.'</td>
        <td><img src='.$photo_cat.' /></td>
        <td>
        <a href="updatecat.php? updateidcat='.$id_categorie.'"class="btn btn-primary">Modifier</a> 
        <a href="deletecat.php? deleteidcat='.$id_categorie.'" class="btn btn-danger" onclick = "return confirmation();" >Supprimer</a>
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
      $('#categorie_data').DataTable();  
 });  
 </script>  