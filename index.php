<?php
    require_once('CrudManager.php');
    require 'Gite.php';

    $gite = $manager->addGite();
    $hebergement= new CrudManager($data);
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
    <input type="text" name="nom" value="<?php $nom->getNom() ?>" placeholder="nom"><br>
    <input type="text" name="adresse" value="<?php $adresse->getAdresse() ?> placeholder="adresse"><br>
    <input type="number" min="0" set="0.01" name="prix" value="<?php $prix->getPrix() ?> placeholder="prix"><br>
    <button type="submit">Valider</button>
    </form>
</body>
</html>