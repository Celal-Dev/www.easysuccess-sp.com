<?php

session_start();
define('RACINE_SITE', $_SERVER['DOCUMENT_ROOT'] . '/home/easysuu');
define('URL', 'https://www.easysuccess-sp.com');

$erreur= '';
$erreurIndex = '';
$validate = '';
$validateIndex = '';
$content = '';


foreach($_POST as $key => $value){
    $_POST[$key] = htmlspecialchars(trim($value));
}

foreach($_GET as $key => $value){
    $_GET[$key] = htmlspecialchars(trim($value));
}

require_once('fonctions.php');