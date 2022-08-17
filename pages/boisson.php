<?php include '../php/connect.php';?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martel:wght@700&family=Roboto:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <section id="snack">

        <?php
        $select = "SELECT * FROM produits";
        $query = $db->query($select);

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) 
        {?>
            <div class="item">
                <img src= <?php echo $row ['image_produit'];?>>
                <div class="item-infos">
                    <h3><?php echo $row ['nom_produit'];">"?></h3>
                    <hr>
                    <p><?php echo $row ['Ingrédient'];">"?></p>
                    <p class="prix"><?php echo $row ['prix'];">"?></p>
                    <input type="submit" name="valider" class="btn btn-primary btn-lg">
                </div>
            </div>
        <?php
        }
        ?>
        
        
    </section>
</body>
</html>