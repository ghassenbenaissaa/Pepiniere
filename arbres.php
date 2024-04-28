<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Pépinière de Gaston</title>
    </head>
    <body>
<?php
$bddPDO = new PDO('mysql:host=localhost;dbname=plantes;charset=utf8', 'root', 'root');
$bddPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION).
$requete = "SELECT * FROM arbres ORDER BY ID ASC";
$result = $bddPDO->query($requete);

if (!$result)
{
    echo "erreur de récupération";
}
else
{
    $nbre_clients = $result->rowcount();
?>
<h2>Les plantes</h2>
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Ni fleurs ni graines</th>
                <th>Avec fleurs et graines</th>
                <th>Elle a des spores</th>
                <th>Pas de fruits</th>
                <th>Avec fruits</th>
                <th>Bryophytes</th>
                <th>Ptéridophytes</th>
                <th>Gymnosperme</th>
                <th>Angiosperme</th>
                <th>Dicotylédones</th>
                <th>Monocotylédones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php 
                while($ligne= $result->fetch(PDO::FETCH_NUM))
                {
                    echo "<tr>";
                    foreach ($ligne as $valeur) 
                    {
                        echo "<td>$valeur</td>";
                    }
                    echo "</tr>";
                }
            ?>
            </tr>   
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Ni fleurs ni graines</th>
                <th>Avec fleurs et graines</th>
                <th>Elle a des spores</th>
                <th>Pas de fruits</th>
                <th>Avec fruits</th>
                <th>Bryophytes</th>
                <th>Ptéridophytes</th>
                <th>Gymnosperme</th>
                <th>Angiosperme</th>
                <th>Dicotylédones</th>
                <th>Monocotylédones</th>
            </tr>
        </tfoot>
    </table>  
    <?php
    $result->closeCursor();
}
?>
</body>
</html>