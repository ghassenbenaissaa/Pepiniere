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
  
</head>
<body> 
           <br /> 
           <div class="container">  
                <h2 align="center">Les messages</h2>  
                <br />  
                <div class="table-responsive">  
                     <table id="message_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
     <td scope="col">#</td>
      <td scope="col">Nom</td>
      <td scope="col">Email</td>
      <td scope="col">Numéro</td>
      <td scope="col">Message</td>
      <td scope="col">#</td> 
 
                                  
                               </tr>  
                          </thead>  
                          <?php
$sql="select * from `contact` order by id desc";
$result=mysqli_query($con,$sql);
if($result){
    while($row=mysqli_fetch_assoc($result))
    {
        $id=$row['id'];
        $nom=$row['nom_prenom'];
        $email=$row['email'];
        $numero=$row['telephone'];
        $message=$row['message'];
        echo ' <tr>
        <th scope="row">'.$id.'</th>
        <td>'.$nom.'</td>
        <td>'.$email.'</td>
        <td>'.$numero.'</td>
        <td>'.$message.'</td>
        <td>
        <a href="deletecontact.php? deleteidcont='.$id.'" class="btn btn-danger" onclick = "return confirmation();" >Supprimer</a>
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
      $('#message_data').DataTable();  
 });  
 </script>  