<?php

require_once __DIR__ . '/../../config/init.php';

try
{
    $title = 'Contact';

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Création d'un tableau d'erreurs
            $error = [];

        //Récupération et nettoyage de la récupération de la donnée "userName"
            $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($userName)) {
                $error['userName'] = 'L\'identifiant est obligatoire';
            } else {
        //Validation de la donnée "userName" grâce à la regex
            $isOk = filter_var($userName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z0-9]{2,30}$/')));
            if ($isOk == false){
                $error['userName'] = 'L\'identifiant n\'est pas valide !';
            }
        }   

        //Récupération et nettoyage de la récupération de la donnée "lastName"
            $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($lastName)) {
                $error['lastName'] = 'Le Nom est obligatoire';
            } else {
        //Validation de la donnée "lastName" grâce à la regex
            $isOk = filter_var($lastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.NAME.'/')));
            if ($isOk == false){
                $error['lastName'] = 'Le Nom n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "firstName"
            $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($firstName)) {
                $error['firstName'] = 'Le Prénom est obligatoire';
            } else {
        //Validation de la donnée "firstName" grâce à la regex
            $isOk = filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.NAME.'/')));
            if ($isOk == false){
                $error['firstName'] = 'Le Prénom n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Performance"
            $Performance = filter_input(INPUT_POST, 'Performance', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($Performance)) {
                $error['Performance'] = 'La prestation est obligatoire';
            } else {
        //Validation de la donnée "Performance" grâce à la regex
            $isOk = filter_var($Performance, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,50}$/')));
            if ($isOk == false){
                $error['Performance'] = 'La prestation décrite n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Message"
            $Message = filter_input(INPUT_POST, 'Message', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($Message)) {
                $error['Message'] = 'Le message est obligatoire';
            } else {
        //Validation de la donnée "Message" grâce à la regex
            $isOk = filter_var($Message, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,300}$/')));
            if ($isOk == false){
                $error['Message'] = 'Le message décrit n\'est pas valide !';
            }
        }
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/contact.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';