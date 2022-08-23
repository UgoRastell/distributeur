
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
          echo '<select name="categorie">';
          while($row = mysqli_fetch_assoc($req3)){
            echo'
              <option value="">'.$row['nom_produit'] . " ". $row['prix'] . '€' .' </option>
            ';
          }
          echo' </select>';
        }
        ?>
        <label>Quantité</label>
        <input type="number" name="quantity" min="1" max="5" id="quant">
        <input type="submit" value="Acheter" name="btn-ajouter"/>
    </form>
  </section>

<script src="../js/val.js"></script>

</body>
</html>