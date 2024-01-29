<?php

try
{
    $title = 'Mot de passe oublié';
//Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Récupération, nettoyage et validation de la donnée "Email"
        $Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
        if (empty($Email)) {
            $errorEmail = 'L\'Email est obligatoire';
        } else {
            $isOk = filter_var($Email, FILTER_VALIDATE_EMAIL);
            if ($isOk == false){
                $errorEmail = 'l\'Email n\'est pas valide !';
            }
        }
    }


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/mot_de_passe_oublie.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';
