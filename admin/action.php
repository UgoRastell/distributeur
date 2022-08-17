
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include '../php/connect.php';

    if(isset($_POST['valider']))
    {
        $nom_produit = $_POST['nom_produit'];
        $ingredient = $_POST['ingredient'];
        $categories = $_POST['categories'];

        $sql = "INSERT INTO `produits` (nom_produit, Ingrédient, categories) VALUES (:nom_produit,:ingredient,:categories)";

        $req = $db->prepare($sql);

        $test = $req->execute(array(':nom_produit'=>$nom_produit,':ingredient'=>$ingredient,':categories'=>$categories));
        

        if($test)
        {
            echo 'ok';
            header('Location: admin.php');
        }else {
            echo 'error';
        }

        
        // $req = $db->prepare("INSERT INTO produits(nom_produit,Ingrédient,categories) VALUES ('$nom_produit','$ingredient','$categories')");

        // var_dump($req);

        // $db->execute(['nom_produit' => $nom_produit, 'Ingrédient' => $ingredient, 'categories' => $categories]);
    }
    ?>
</body>
</html>