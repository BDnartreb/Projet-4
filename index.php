<?php
    require 'header.php';
    //require 'oeuvres.php'; fichier inutile car connexion à database artbox contenant les infos des oeuvres
    require 'bdd.php'; //fichier de connexion à la database artbox 
    $bdd = connexion();
    $oeuvres = $bdd->query('SELECT * FROM oeuvres'); //$oeuvres array qui récupère les infos de la table oeuvre de la database artbox
    //query() n'exite pas dans la documentation php
?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?= $oeuvre['id'] ?>">
                <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
                <h2><?= $oeuvre['titre'] ?></h2>
                <p class="description"><?= $oeuvre['artiste'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
<?php require 'footer.php'; ?>
