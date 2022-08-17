<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <form method="post" action="action.php" >
            <legend>Ajoutez un produit</legend>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="categories"  value="Snack">
            <label class="form-check-label" for="inlineCheckbox1">Snacks</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="categories" value="Boisson">
            <label class="form-check-label" for="inlineCheckbox1">Boissons</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="categories" value="Plat">
            <label class="form-check-label" for="inlineCheckbox1">Plats</label>
          </div>
        <div class="form-group">
          <label>Nom du produit</label>
          <input type="text" name="nom_produit" class="form-control" placeholder="Coca Cola....">
        </div>
        <div class="form-group">
          <label>Ingrédient</label>
          <input type="text" name="ingredient" class="form-control" placeholder="Coca Cola....">
        </div>
        <div class="form-group">
          <label>Image du produit</label>
          <input type="file" name="image" class="form-control-file" >
        </div>
        <input type="submit" name="valider" class="btn btn-primary btn-lg">
      </form>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>