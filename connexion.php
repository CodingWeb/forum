<?php session_start();
//Connection a la basse de données.
include 'node_modules/PDO/connect.php';
// Fichier fonction.
include 'node_modules/PDO/fonctions.php';
$titre = 'Connexion';

if (!empty($_POST)) {
    extract($_POST);
    $valid = (empty($pseudo) || empty($pass)) ? false : true;

    $erreurpseudo = (empty($pseudo)) ? 'Indiquez votre pseudo' : '';
    $erreurpass = (empty($pass)) ? 'Indiquez votre mot de passe' : '';
    if ($valid)
    {
        if (!check_id($pseudo,$pass))
        {
            $valid = false;
            $erreurid = 'Mauvais identifiants';
        }
        if ($valid)
        {
            $_SESSION['membre'] = $pseudo;

            header('Location: index.php');
        }
    }
}
if (isset($pseudo)) echo $pseudo;

?><!--Le header-->
<?php include 'node_modules/template/connect/header.php'; ?>
<!-- Le menu -->
<?php include 'node_modules/template/connect/nav.php'; ?>
<!--Le contenu de l'Accueil-->
<?php include 'node_modules/template/connect/containaire.php'; ?>
<!--Le pied de page avec le javascrip-->
<?php include 'node_modules/template/connect/footer.php'; ?>

          