<?php session_start();
//Connection a la basse de données
include 'node_modules/PDO/connect.php';
include 'node_modules/PDO/fonctions.php';
$titre = 'Inscription';

if (!empty($_POST)) {
    extract($_POST);
    $valid = (empty($pseudo) || empty($emails) || !filter_var($emails, FILTER_VALIDATE_EMAIL) || empty($pass)) ?
        false : true;
    $erreurpseudo = (empty($pseudo)) ? 'Choisissez un pseudo' : '';
    $erreuremails = (empty($emails) || !filter_var($emails, FILTER_VALIDATE_EMAIL)) ? 'Indiquez un email valid' : '';
    $erreurpass = (empty($pass)) ? 'Choisissez un mot de passe' : '';

    if ($valid)
    {
        $pseudo = strip_tags($pseudo);
        $emails = strip_tags($emails);
        $pass = strip_tags($pass);
        // vérifier si le pseudo n'ai pas deja pris
        if (!check_pseudo($pseudo))
        {
            $valid = false;
            $erreurpseudo = 'Ce pseudo est pris par un membre !';
        }
        // vérifie si le champ email est deja pris
        if (!check_emails($emails))
        {
            $valid = false;
            $erreuremails = 'Cet email correspond a membre !';
        }
        if ($valid)
        {
            $to      = $emails;
            $subject = 'Inscription';
            $message = '<h4>Bonjour ! '.ucwords($pseudo).' </h4>
            <p>Vous ètes maintenant membre du forum</p>
            <p>Voici vos identifiants :<br>
            Login : <b>'.$pseudo.'</b>
            Mot de passe : <b>'.$pass.'</b></p>
            <p>A bientôt sur le forum.</p>';
            $headers = 'From:coding-web@hotmail.com'."\r\n";
            $headers.='MIME-version: 1.0'."\r\n";
            $headers.='Content-type: text/html; charset=utf-8'."\r\n";

            mail($to,$subject,$message,$headers);

            // Ajouter un membre dans la basse de donnée
            add_membre($pseudo,$emails,$pass);
            // En cas de réussite
            $succes = 'Inscription réussie, Consultez votre boite email';
            unset($pseudo); unset($emails); unset($pass);
        }
    }
}

?><!--Le header-->
<?php include 'node_modules/template/insciption/header.php'; ?>
<!-- Le menu -->
<?php include 'node_modules/template/insciption/nav.php'; ?>
<!--Le contenu de l'Accueil-->
<?php include 'node_modules/template/insciption/containaire.php'; ?>
<!--Le pied de page avec le javascrip-->
<?php include 'node_modules/template/insciption/footer.php'; ?>

