<?php

session_start();

require_once __DIR__ . '/../../models/Comments.php';
require_once __DIR__ . '/../../models/Users.php';
require_once __DIR__ . '/../../config/init.php';


try
{
    $title = 'Livre d\'or';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Création d'un tableau d'erreurs
            $error = [];

        //Récupération et nettoyage de la récupération de la donnée "userName"
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($username)) {
                $error['username'] = 'L\'identifiant est obligatoire';
            } else {
        //Validation de la donnée "username" grâce à la regex
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z0-9]{2,30}$/')));
            if ($isOk == false){
                $error['username'] = 'L\'identifiant n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Performance"
            $performance = filter_input(INPUT_POST, 'performance', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($performance)) {
                $error['performance'] = 'La prestation est obligatoire';
            } else {
        //Validation de la donnée "performance" grâce à la regex
            $isOk = filter_var($performance, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-: ]{5,30}$/')));
            if ($isOk == false){
                $error['performance'] = 'La prestation décrite n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "comment"
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($message)) {
                $error['message'] = 'Le message est obligatoire';
            } else {
        //Validation de la donnée "message" grâce à la regex
            $isOk = filter_var($message, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-: ]{5,300}$/')));
            if ($isOk == false){
                $error['message'] = 'Le message n\'est pas valide !';
            }
        }
    }


    // Insertion des données
    if (empty($error) && !empty($username) && !empty($message) && !empty($performance)) {
        $comment = new Comment($message, $performance, NULL, NULL, NULL, NULL, NULL);

        $result = $comment->insert();

        if($result) {
            $msg['success'] = 'La donnée a bien été insérée !';
        } else {
            $msg['error'] = 'Erreur, la donnée n\'a pas été insérée';
        }

        // Utilisation de sessions pour stocker temporairement les messages
        $_SESSION['msg'] = $msg;
        $_SESSION['error'] = $error;

        header('Location:livre_dor-ctrl.php');
        exit;
    }


} catch (PDOException $e) {
die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/home/header.php';
include __DIR__ . '/../../views/home/livre_dor.php';
include __DIR__ . '/../../views/templates/home/footer.php';