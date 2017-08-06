<?php session_start();
//Connection a la basse de données.
include 'node_modules/PDO/connect.php';
// Fichier fonction.
include 'node_modules/PDO/fonctions.php';
$titre = 'Connexion';



?><!--Le header-->
<?php include 'node_modules/template/connect/header.php'; ?>
<!-- Le menu -->
<?php include 'node_modules/template/connect/nav.php'; ?>
<!--Le contenu de l'Accueil-->
<?php include 'node_modules/template/connect/containaire.php'; ?>
<!--Le pied de page avec le javascrip-->
<?php include 'node_modules/template/connect/footer.php'; ?>

          