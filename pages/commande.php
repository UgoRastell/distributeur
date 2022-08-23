<?php
if(isset($_POST['acheter'])){
  //connexion à la base de données
  $bd = mysqli_connect("localhost","root","","distributeur_nws");
  //recupération des données du formulaire
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $quant = $_POST['quant'];
  $achat =
  $select = $_POST['categorie'];

  $req4 = mysqli_query($bd,"INSERT INTO `commande` (nom_produit, quantite_produit, image_produit, categories, prix) VALUES ('$titre','$description','$nouveau_nom_img', '$categorie', '$prix')") ;




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
    <form method="post" action="achat.php" id="myForm">
        <p style="color: red;" id="erreur"></p>
        <label>Nom</label>
        <input type="text" name="nom" id="nom">
        <label>Prénom</label>
        <input type="text" name="prenom" id="prenom">
        <label>Selection du produit</label>
        <?php
        $bd = mysqli_connect("localhost","root","","distributeur_nws");
        $req3 = mysqli_query($bd, "SELECT * FROM `produits` ORDER BY `nom_produit`");
        if(mysqli_num_rows($req3) == 0){
          echo ' <select name="categorie">
                  <option value="">Aucun produit trouvé</option>;
                  </select>';
        }else{
          echo '<select name="categorie" onchange="calculateAmount(this.value)">';
          while($row = mysqli_fetch_assoc($req3)){
            echo'
              <option value="'. $row['prix'] . '">'.$row['nom_produit'] .' </option>
            ';
          }
          echo' </select>';
        }
        ?>
        <label>Quantité</label>
        <input type="number" name="quantity" min="1" max="5" id="quant">
        <label>Total</label>
        <input name="tot_amount" id="tot_amount" type="text" readonly>
        <input type="submit" value="Acheter" name="acheter"/>

        <script>
          function calculateAmount(val) {
                var tot_price = val;
                /*display the result*/
                var divobj = document.getElementById('tot_amount');
                divobj.value = tot_price;
            }
        </script>
    </form>
  </section>



<script src="../js/val.js"></script>

</body>
</html>