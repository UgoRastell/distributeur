<?php
  if(isset($_POST['btn-ajouter'])){
      //connexion à la base de données
      $bd = mysqli_connect("localhost","root","","distributeur_nws");
      //recupération des données du formulaire
      $titre = $_POST['titre'];
      $description = $_POST['description'];
      if(!empty($titre) && !empty($description)){
          //verifier si le produit existe déjà dans la base de données
          $req1 = mysqli_query($bd, "SELECT nom_produit ,descri FROM produits WHERE nom_produit ='$titre' AND descri ='$description'");
          if(mysqli_num_rows($req1) > 0) {
              //si le produit existe déjà:
              $message = '<p style="color:red" >Le produit existe déjà</p>';
          }else {
              //sinon
              if(isset($_FILES['image'])){
                  //si une image a été télécharger:
                  $img_nom = $_FILES['image']['name']; //récupère le nom de l'image 
                  $tmp_nom = $_FILES['image']['tmp_name']; //définire un nom temporaire
                  $time =time(); //On recupere l'heure actuelle
                  //On renomme l'image

                  $nouveau_nom_img = $time.$img_nom ;

                  //On déplace l'image dans le dossier images-produits

                  $deplacer_image = move_uploaded_file($tmp_nom,"../images/".$nouveau_nom_img) ;

                  if($deplacer_image){
                      //si l'image a été déplacé :
                      //insérons le titre ,la description  et le nom de l'image dans la base de donnée 
                      $req2 = mysqli_query($bd,"INSERT INTO produits VALUES (NULL,'$titre','$description','$nouveau_nom_img')") ;
                       if($req2){
                           //si les informations ont été inséré dans la base de données
                           $message = '<p style="color:green">Produit ajouté ! </p>';
                       }else {
                           //si non
                           $message = '<p style="color:red ">Produit Non ajouté !</p>';
                       }
                  }

              }
          }
      }else {
          //si tous les champs ne sont pas remplie on a :
        $message = '<p style="color:red">Veuillez remplir tous les champs !</p>';
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
    <form method="post" action="" >
      <div class="message">
        <?php if(isset($message)){
          echo $message;
        }
        
        ?>
      </div>
        <label>Nom Prénom</label>
        <input type="text" name="titre">
        <label>Nom du produit</label>
        <textarea name="description" cols="30" rows="10"></textarea>
        <label>Quantité</label>
        <input type="number" id="quantity" name="quantity" min="1" max="5">
        <input type="submit" value="Acheter" name="btn-ajouter"/>
    </form>
  </section>


</body>
</html>