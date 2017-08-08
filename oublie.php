<?php session_start();
//Connection a la basse de données.
include 'node_modules/PDO/connect.php';
// Fichier fonction.
include 'node_modules/PDO/fonctions.php';
$titre = 'Récupération de votre mot de passe';
$domaine = 'dev-apprendreensemble.com';
// Une fois connecter rien a faire sur la page mot de passe oublier !
if (check_session()) {
    header('Location: index.php');
}
if (!empty($_POST)) {
    extract($_POST);
    $valid = (empty($emails) || !filter_var($emails, FILTER_VALIDATE_EMAIL)) ? false : true;
    $erreuremails = (empty($emails) || !filter_var($emails, FILTER_VALIDATE_EMAIL)) ? 'Indiquez un email valid' : '';

    if ($valid) {
        $emails = strip_tags($emails);
        if (check_emails($emails)) {
            $valid = false;
            $erreuremails = 'Email inconnus !';
        }

        if ($valid) {
            $pseudo = get_pseudo($emails);
            $pass = rand(100000, 500000);

            $to = $emails;
            $subject = 'Récupérer votre mot de pass du forum ' . $domaine . '';
            $message = '<h4>Voici un nouveaux mot de passe ' . ucwords($pseudo) . ' </h4>
            <p>Voici vos identifiants :<br>
            Login : <b>' . $pseudo . '</b><br>
            Mot de passe : <b>' . $pass . '</b></p>
            <p>Il est recommandé de changer votre mot de passe sur votre espace 
            <a href="http://dev-apprendreensemble.com/forum/compte.php">membre</a>.</p>';
            $headers = 'From:dev.coding.web@gmail.com' . "\r\n";
            $headers .= 'MIME-version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

            mail($to, $subject, $message, $headers);

            modif_pass($emails, $pass);
            $success = 'Votre nouveau mot de passe a été créer avec succès, consultez votre boîte email.';
        }
    }
}


?><!--Le header-->
<?php include 'node_modules/template/oublie_pass/header.php'; ?>
<!-- Le menu -->
<?php include 'node_modules/template/oublie_pass/nav.php'; ?>
<!--Le contenu de l'Accueil-->
<?php include 'node_modules/template/oublie_pass/containaire.php'; ?>
<!--Le pied de page avec le javascrip-->
<?php include 'node_modules/template/oublie_pass/footer.php'; ?>

