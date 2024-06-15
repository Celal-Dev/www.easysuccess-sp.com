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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Validation de l'existence du fichier CV
    if (empty($_FILES['cv']['name']) || !file_exists($_FILES['cv']['tmp_name'])) {
        $erreur[] = "Veuillez sélectionner un fichier CV.";
    }

    // Validation de l'existence du fichier Lettre de motivation
    if (empty($_FILES['lettreMotivation']['name']) || !file_exists($_FILES['lettreMotivation']['tmp_name'])) {
        $erreur[] = "Veuillez sélectionner un fichier Lettre de motivation.";
    }


    if (empty($erreur)) {



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

 $cv = $_FILES['cv']['tmp_name'];
$lettreMotivation = $_FILES['lettreMotivation']['tmp_name'];

$message = "cv : ".$cv."\n"." lettreMotivation : ".$lettreMotivation;

    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = '';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


   

        $mail->addAttachment($cv, 'CV.pdf');
        $mail->addAttachment($lettreMotivation, 'LettreMotivation.pdf');


    //Recipients
    $mail->setFrom('from@example.com', 'easysuccess');
    $mail->addAddress('');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'candidature';
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    header("Location: confirmation.php");


    }



}
?>

<?php require_once('include/headerBis.php') ?>

<div  class="enteteImgRecrutement"></div>

<?php $erreur ?>

<div class="containerDevisTexte ">
            <span class="titreRecrutement">RECRUTEMENT</span> 
            <span class="barre"></span>
            <p class="devisTexte">Explorez de nouvelles opportunités professionnelles chez EASY SUCCESS, entreprise leader dans la sécurité. Rejoignez-nous pour une carrière enrichissante et contribuez à notre succès partagé.</p>
</div>

<span class="titreForm">REJOINGEZ-NOUS</span>

<section class="cv">
        <div class="titreCV">Déposez votre CV et lettre de motivation</div>
        <form class="formCV" method="post" enctype="multipart/form-data">
            <label for="cv">CV (Format PDF) :</label>
            <input type="file" id="cv" name="cv" accept=".pdf, .docx" required>
            <label for="lettreMotivation">Lettre de motivation (Format PDF) :</label>
            <input type="file" id="lettreMotivation" name="lettreMotivation" accept=".pdf, .docx" required>
            <button type="submit">Envoyer</button>
        </form>
    </section>

<?php require_once('include/footerBis.php') ?>