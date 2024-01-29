<?php

require_once __DIR__ . '/../../config/init.php';

try
{
    $title = 'Inscription';
    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Création d'un tableau d'erreurs
            $error = [];
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

        //Récupération, nettoyage et validation de la donnée "Email"
            $Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
            if (empty($Email)) {
                $error['Email'] = 'L\'Email est obligatoire';
            } else {
                $isOk = filter_var($Email, FILTER_VALIDATE_EMAIL);
                if ($isOk == false){
                    $error['Email'] = 'l\'Email n\'est pas valide !';
                }
            }
        
        //Récupération et nettoyage de la récupération de la donnée "Phone"
            $Phone = filter_input(INPUT_POST, 'Phone', FILTER_SANITIZE_NUMBER_INT);
            if (empty($Phone)) {
        //Validation de la donnée "Phone" grâce à la regex
            $isOk = filter_var($Phone, FILTER_VALIDATE_INT);
            if ($isOk == false){
                $error['Phone'] = 'Le numéro de téléphone n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Adress"
            $Adress = filter_input(INPUT_POST, 'Adress', FILTER_SANITIZE_SPECIAL_CHARS);
            if (!empty($Adress)) {
        //Validation de la donnée "Adress" grâce à la regex
            $isOk = filter_var($Adress, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,300}$/')));
            if ($isOk == false){
                $error['Adress'] = 'L\'Adresse décrite n\'est pas valide !';
            }
        }

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

        //Récupération, nettoyage et validation de la donnée "Mot de passe"
            $Password1 = filter_input(INPUT_POST, 'Password1', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($Password1)) {
                $error['Password1'] = 'Le Mot de Passe est obligatoire';
            } else {
                $isOk = filter_var($Password1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.PSWD.'/')));
                if ($isOk == false){
                    $error['Password1'] = 'Le Mot de Passe n\'est pas valide !';
                }
            }
        
        //Récupération, nettoyage et validation de la donnée "Mot de passe"
            $Password2 = filter_input(INPUT_POST, 'Password2', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($Password2)) {
                $error['Password2'] = 'Le Mot de Passe est obligatoire';
            } else {
                $isOk = filter_var($Password2, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.PSWD.'/')));
                if ($isOk == false){
                    $error['Password2'] = 'Le Mot de Passe n\'est pas valide !';
                }
            }
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/inscription.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';
