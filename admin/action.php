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
            <h3>liste des produits</h3>
            <div class="liste-produits">
                <?php 
                 //Nous allons afficher tous les produits ajouté :
                   //connexion à la base de données
                   $bd = mysqli_connect("localhost","root","","distributeur_nws");
                   $req3 = mysqli_query($bd, "SELECT * FROM `produits`");
                   if(mysqli_num_rows($req3) == 0){
                      //si la base de donnée ne contient aucun produit , alors affichons :
                      echo " Aucun produit trouvé";
                   }else {//si oui
                       while($row = mysqli_fetch_assoc($req3)){
                           //affichons les informations
                           echo ' 
                           <div class="produit">
                                <div class="image-prod">
                                        <img src="../images/'.$row['image_produit'].'" alt=""> 
                                </div>
                                <div class="text">
                                    <strong><p class="titre">'.$row['nom_produit'].'</p></strong>
                                    <p class="description">'.$row['descri'].'</p>
                                    <input type="submit" value="Commander" name="btn-ajouter"/>
                                </div>
                           </div>
                           ';
                       }
                   }

                ?>
               
            </div>
       </div>
    </div>
</body>
</html>