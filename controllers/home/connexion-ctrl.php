<?php

try
{
    $title = 'Connexion';
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

        //Récupération, nettoyage et validation de la donnée "Mot de passe"
            $Password1 = filter_input(INPUT_POST, 'Password1', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($Password1)) {
                $error['Password1'] = 'Le Mot de Passe est obligatoire';
            } else {
        //Validation de la donnée "Password1" grâce à la regex
                $isOk = filter_var($Password1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/')));
                if ($isOk == false){
                    $error['Password1'] = 'Le Mot de Passe n\'est pas valide !';
                }
            }
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/connexion.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';