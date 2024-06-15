<?php  
require_once('include/init.php');
require_once('include/fonctions.php')
?>

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$erreur= '';

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
?>

<?php
if($_POST){

if(!isset($_POST['nom'])) {
    $erreur .= '<div style="width: 100%; background-color:red; color:white; font-size :20px; text-align:center; height: 60px; display: flex;flex-direction: column;justify-content: center; margin-top: 15px; margin-bottom :15px; ">CHAMPS NOM DOIT ÊTRE RENSEIGNER</div>';
}

if(!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ){
    $erreur .= '<div style="width: 100%; background-color:red; color:white; font-size :20px; text-align:center; height: 60px; display: flex;flex-direction: column;justify-content: center; margin-top: 15px; margin-bottom :15px; ">CHAMPS EMAIL DOIT ÊTRE RENSEIGNER</div>';
} 

if(empty($_POST['telephone'])  ){
    $erreur .= '<div style="width: 100%; background-color:red; color:white; font-size :20px; text-align:center; height: 60px; display: flex;flex-direction: column;justify-content: center; margin-top: 15px; margin-bottom :15px; ">CHAMPS TELEPHONE DOIT ÊTRE RENSEIGNER</div>';
}

if(!isset($_POST['description'])){
  $erreur .= '<div style="width: 100%; background-color:red; color:white; font-size :20px; text-align:center; height: 60px; display: flex;flex-direction: column;justify-content: center; margin-top: 15px; margin-bottom :15px; ">CHAMPS DESCRIPTION DOIT ÊTRE RENSEIGNER</div>';
}

if(empty($erreur)){

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

$nom = $_POST['nom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$message = $_POST['description'];

$message = "nom : ".$nom."\n"." email : ".$email."\n"." telephone : ".$telephone."\n"."description : ".$message;

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = '';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'easy success');
    $mail->addAddress('');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'contact';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    header("Location: confirmation.php");
}
}
?>

<?php require_once('include/headerBis.php') ?>

<div class="enteteImgContact"></div>

<div class="containerDevisTexte ">
            <span>CONTACT</span> 
            <span class="barre"></span>
            <p class="devisTexte">Pour toute question ou demande d'assistance en matière de sécurité, n'hésitez pas à nous contacter. Notre équipe dévouée est prête à garantir votre tranquillité d'esprit 24/7.</p>
</div>

<section class="coordonnee">
    <span class="coordonneeTitre">Nos coordonnées</span> 
    <span>EASY SUCCESS</span>
    <span>66 bd Mortier 75020 PARIS</span>
    <span>Tél : 01 43 64 23 37</span>
    

    <span class="titreFormContact">DES QUESTIONS ? CONTACTEZ-NOUS ICI !</span>
    <?= $erreur ?>

    <form  class="containerFormDevis" class="form-contact" method="POST" tabindex="1">

    <input type="text" class="form-contact-input" name="nom" placeholder="Nom" required />

    <input type="text" class="form-contact-input" name="email" placeholder="Email" required />

    <input type="text" class="form-contact-input" name="telephone" placeholder="Numéro de téléphone" />

    <textarea class="form-contact-textarea" name="description" placeholder="Écrivez-nous à l'aide de ce formulaire" required></textarea>

    <button type="submit" class="form-contact-button">ENVOYER</button>
    </form>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.4595752996156!2d2.4067179761291255!3d48.868514899994395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66d9c46f47d81%3A0x54407f0155a45eeb!2s66%20Bd%20Mortier%2C%2075020%20Paris!5e0!3m2!1sfr!2sfr!4v1708937711587!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php require_once('include/footerBis.php') ?>