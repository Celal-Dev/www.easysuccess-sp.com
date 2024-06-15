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
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'demarchescandidats@gmail.com';                     //SMTP username
    $mail->Password   = 'djje peyp nvuu runk';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('from@example.com', 'easy success');
    $mail->addAddress('devis@easysuccess-sp.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'demande de devis';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    header("Location: confirmation.php");
}
}
?>

<?php require_once('include/headerBis.php') ?>

<div  class="enteteImgDevis"></div>

<div class="containerDevisTexte ">
            <span>DEVIS</span> 
            <span class="barre"></span>
            <p class="devisTexte">Sollicitez dès maintenant un devis personnalisé pour les services de sécurité de notre entreprise, afin de garantir la protection optimale de vos biens et de votre environnement.</p>
</div>

<span class="titreForm">DEMANDEZ-NOUS UN DEVIS</span>

<?= $erreur ?>
<section class="sectionForm">
  <form  class="containerFormDevis" class="form-contact" method="POST" tabindex="1">

    <input type="text" class="form-contact-input" name="nom" placeholder="Nom" required />

    <input type="text" class="form-contact-input" name="email" placeholder="Email" required />

    <input type="text" class="form-contact-input" name="telephone" placeholder="Numéro de téléphone" />

    <textarea class="form-contact-textarea" name="description" placeholder="Décrivez-nous votre besoin" required></textarea>

    <button type="submit" class="form-contact-button">ENVOYER</button>
  </form>
</section>

<?php require_once('include/footerBis.php') ?>