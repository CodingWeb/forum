<?php session_start();
//Connection a la basse de données
include 'node_modules/PDO/connect.php';
// Fichier fonction
include 'node_modules/PDO/fonctions.php';
$titre = 'Nouveau topic';
$domaine = 'dev-apprendreensemble.com';
// Une fois connecter rien a faire sur la page inscription
if (!check_session()) {
    header('Location: connexion.php');
}

$pseudo = $_SESSION['membre'];
$membre_id = get_membre_id($pseudo);

if (!empty($_POST)) {
    extract($_POST);

    $valid = (empty($titres) || empty($message)) ? false : true;
    $erreurtitres = (empty($titres)) ? 'Indiquez un titre de sujet' : '';
    if (!empty($titres) && strlen($titres) < 10) {
        $erreurtitres = 'Entrez au moins 10 caractères';
    } elseif (!empty($titres) && strlen($titres) > 255) {
        $erreurtitres = 'Entrez maximun 255 caractères';
    }
    $erreurmessage = (empty($message)) ? 'Indiquez votre message' : '';
    if ($valid)
    {
        $titres = strip_tags($titres);
        $message = strip_tags($message);
        $membre_id = strip_tags($membre_id);

        add_topic($titres,$message,$membre_id);
        header('Location: index.php');
    }
}

?><!--Le header-->
<?php include 'node_modules/template/nouveau/header.php'; ?>
<!-- Le menu -->
<?php include 'node_modules/template/nouveau/nav.php'; ?>
<!--Le contenu de l'Accueil-->
<?php include 'node_modules/template/nouveau/containaire.php'; ?>
<!--Le pied de page avec le javascrip-->
<?php include 'node_modules/template/nouveau/footer.php'; ?>
