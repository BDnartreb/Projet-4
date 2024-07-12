<?php
    require 'bdd.php';
    $bdd = connexion();
    //$oeuvres = $bdd->query('SELECT * FROM oeuvres');
    $_POST; //rappel des variables entrées dans la page ajouter.php

//vérification que les champs sont remplis et répondent aux conditions format URL et >3 caractère
if (empty($_POST['titre'])
    || empty($_POST['artiste'])
    || empty($_POST['image'])
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL)
    || empty($_POST['description'])
    || strlen($_POST['description']) < 3)
{
    header ('Location: ajouter.php?erreur=true');
    echo 'Attention à bien remplir tous les champs';
}
else {
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);
    echo '<pre>htmlspecialchars : ' . $titre . ' ' . $artiste . ' ' . $image . ' ' . $description . '</pre>';

    //Ecriture de la requête
    $insert = $bdd->prepare('insert into oeuvres
    (titre, description, artiste, image) values (?, ?, ?, ?)');
    //Execution de la requête les $variable rempalçant les ? de la requête dans l'ordre
    $insert->execute([$titre, $description, $artiste, $image]);
    
    //retidection vers la page oeuvre.php de la dernière oeuvre créée
    header ('Location: oeuvre.php?id=' . $bdd->lastInsertId());
}
?>
