<?php session_start();
//Connection a la basse de données.
include 'node_modules/PDO/connect.php';
// Fichier fonction.
include 'node_modules/PDO/fonctions.php';
$titre = 'L\'accueil du forum';

?><!--Le header-->
<?php include 'node_modules/template/Accueil/header.php'; ?>
<!-- Le menu -->
<?php include 'node_modules/template/Accueil/nav.php'; ?>
<!--Le contenu de l'Accueil-->
<?php include 'node_modules/template/Accueil/containaire.php'; ?>
<!--Le pied de page avec le javascrip-->
<?php include 'node_modules/template/Accueil/footer.php'; ?>


