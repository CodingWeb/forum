<!DOCTYPE html>
<html>
<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="node_modules/materialize-css/sass/materialize.css" media="screen,
    projection"/>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
        <form class="login-form">
            <div class="row">
                <div class="input-field col s12 center">
                    <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
                    <p class="center login-form-text">Material Design Admin Template</p>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-social-person-outline prefix"></i>
                    <input id="username" type="text">
                    <label for="username" class="center-align">Username</label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <i class="mdi-action-lock-outline prefix"></i>
                    <input id="password" type="password">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12  login-text">
                    <input type="checkbox" id="remember-me" />
                    <label for="remember-me">Remember me</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <a href="index.html" class="btn waves-effect waves-light col s12">Login</a>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
                </div>
            </div>

        </form>
    </div>
</div>
<?php
$to      = $emails;
$subject = 'Inscription';
$message = '<h4>Bonjour ! '.ucwords($pseudo).' </h4>
            <p>Vous ètes maintenant membre du forum</p>
            <p>Voici vos identifiants :<br>
            Login : <b>'.$pseudo.'</b>
            Mot de passe : <b>'.$pass.'</b></p>
            <p>A bientôt sur le forum.</p>';
$headers = 'From:noreply@forum.com'."\r\n";
$headers.='MIME-version: 1.0'."\r\n";
$headers.='Content-type: text/html; charset=utf-8'."\r\n";

$to      = $emails;
$subject = 'Inscription';
$message = '<h4>Bonjour ! '.ucwords($pseudo).' </h4>
            <p>Vous ètes maintenant membre du forum</p>
            <p>Voici vos identifiants :<br>
            Login : <b>'.$pseudo.'</b>
            Mot de passe : <b>'.sha1($pass).'</b></p>
            <p>A bientôt sur le forum.</p>';
$headers = 'From: coding@dev-apprendreensemble.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers); ?>
<!--Import jQuery before materialize.js-->
<script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="node_modules/materialize-css/dist/js/materialize.min.js"></script>
</body>
</html>