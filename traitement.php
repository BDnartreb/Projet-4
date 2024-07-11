<?php
    /*require 'dbb.php';
    $bdd = connexion();
    $oeuvres = $bdd->query('SELECT * FROM oeuvres');*/
    $_POST;

if (empty($_POST['titre'])
    || empty($_POST['artiste'])
    || empty($_POST['image'])
    || !filter_var($_POST['image'], FILTER_VALIDATE_URL)
    || empty($_POST['description'])
    || strlen($_POST['description']) < 3)
{
    //header ('Location: ajouter.php');
    echo 'Attention à bien remplir tous les champs';
}
else {
    $titre = $_POST['titre'];
    $artiste = ($_POST['artiste']);
    $image = $_POST['image'];
    $description = $_POST['description'];
    echo '<pre>' . $titre . ' ' . $artiste . ' ' . $image . ' ' . $description . '</pre>';
    $titre = strip_tags($_POST['titre']);
    $artiste = strip_tags($_POST['artiste']);
    $image = strip_tags($_POST['image']);
    $description = strip_tags($_POST['description']);
    echo '<pre>strip_tags : ' . $titre . ' ' . $artiste . ' ' . $image . ' ' . $description . '</pre>';
    $titre = htmlspecialchars($_POST['titre']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
    $description = htmlspecialchars($_POST['description']);
    echo '<pre>htmlspecialchars : ' . $titre . ' ' . $artiste . ' ' . $image . ' ' . $description . '</pre>';
}
?>
