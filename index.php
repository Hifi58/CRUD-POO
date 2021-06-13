<?php
    require_once('CrudManager.php');
    $objectmanager = new ConnexionBdd();

    if(isset($_POST['submit'])){
        $objectmanager->addGite($_POST);
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD POO</title>
</head>
<body>
    <form action="CrudManager" method="POST">
    <input type="text" name="nom" placeholder="nom"><br>
    <input type="text" name="adresse" placeholder="adresse"><br>
    <input type="number" min="0" set="0.01" name="prix" placeholder="prix"><br>
    <button type="submit">Valider</button>
    </form>
</body>
</html>