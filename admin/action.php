<?php
$bd = mysqli_connect("localhost","root","","distributeur_nws");

$req5 = mysqli_query($bd, "SELECT * FROM distributeur_nws");

if(isset($_POST['delete'])) {
    $id= $_POST['id'];
    $supp = mysqli_query($bd, "DELETE FROM `commande` WHERE `id` = '$id'");
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
    <div class="result">
       <div class="result-content">
            <a href="admin.php">Ajouter un produit</a>
            <h3>Commandes</h3>
            <div class="liste-produits">
                <?php 
                 //afficher toutes les commandes ajouté :
                   //connexion à la base de données
                   $bd = mysqli_connect("localhost","root","","distributeur_nws");
                   $req3 = mysqli_query($bd, "SELECT * FROM `commande`");
                   if(mysqli_num_rows($req3) == 0){
                      //si la base de donnée ne contient aucun produit
                      echo " Aucune commande trouvé";
                   }else {//si oui
                       while($row = mysqli_fetch_assoc($req3)){
                           //afficher les informations
                           echo ' 
                           <form method="post" action="">
                                <div class="produit">
                                        <div class="text">
                                            <input type="hidden" value="'.$row['id'].'" name="id"/>
                                            <strong><p class="titre">'.$row['prenom_etudiant'] . " " . $row['nom_etudiant'].'</p></strong>
                                            <p class="titre">'.$row['nom_produit'].'</p>
                                            <p class="titre">'.$row['quantite_produit'].'</p>
                                            <p class="titre">'.$row['achat'].' €</p>
                                            <input type="submit" value="Supprimer" name="delete"/>
                                        </div>
                                </div>
                            </form>
                           ';
                       }
                   }

                ?>
               
            </div>
       </div>
    </div>
</body>
</html>