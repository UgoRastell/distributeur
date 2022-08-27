<?php

if(isset($_POST['acheter'])){
  //connexion à la base de données
  $bd = mysqli_connect("localhost","root","","distributeur_nws");
  //recupération des données du formulaire
  $id = $_POST['id'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $quant = $_POST['quantity'];

  $req4 = mysqli_query($bd, "SELECT id FROM produits WHERE id ='$id'");

  if($req4){

    $req5 = mysqli_query($bd, "SELECT id, nom_produit, prix FROM produits WHERE id ='$id';");

    while($row = mysqli_fetch_assoc($req5)){
      $achat = $row['prix'] * $quant;
      $nom_produit = $row['nom_produit'];
    }
    
    $req5 = mysqli_query($bd,"INSERT INTO `commande` (nom_etudiant, prenom_etudiant, nom_produit, quantite_produit, achat) VALUES ('$nom','$prenom','$nom_produit','$quant','$achat')");

     if($req5) {
      $message = '<p style="color:green">Produit acheté !</p>';
    }

  }
  

}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Document</title>
</head>
<body>
  <section class="input_add">
    <form method="post" action="" id="myForm">
      <div class="message">
          <?php if(isset($message)){
            echo $message;
          }
          ?>
      </div>
        <p style="color: red;" id="erreur"></p>
        <label>Nom</label>
        <input type="text" name="nom" id="nom">
        <label>Prénom</label>
        <input type="text" name="prenom" id="prenom">
        <label>Selection du produit</label>
        <?php
        //connexion à la base de données
        $bd = mysqli_connect("localhost","root","","distributeur_nws");
        //inserer le titre ,la description  et le nom de l'image dans la base de donnée 
        $req3 = mysqli_query($bd, "SELECT * FROM `produits`");
        if(mysqli_num_rows($req3) == 0){
          echo ' <select name="nom_produit">
                  <option value="">Aucun produit trouvé</option>;
                  </select>';
        }else{
          echo '<select name="id"> ';
          while($row = mysqli_fetch_assoc($req3)){
            //afficher les informations
            echo'
              <option value="'.$row['id'].'">'.$row['nom_produit'] .' </option>
              ';
            
          }
          echo' </select>';
        }
        ?>
        <label>Quantité</label>
        <input type="number" name="quantity" min="1" max="5">
        <input type="submit" value="Acheter" name="acheter"/>
    </form>
  </section>

<script src="../js/val.js"></script>

</body>
</html>