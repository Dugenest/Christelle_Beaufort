<?php

session_start();

require_once __DIR__ . '/../../models/Users.php';
require_once __DIR__ . '/../../models/Messages.php';
require_once __DIR__ . '/../../config/init.php';

try
{
    $title = 'Contact';
    $users = User::getAll();

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Création d'un tableau d'erreurs
            $error = [];

        //Récupération, nettoyage et validation de la donnée "Performance"
        $id_user = intval(filter_input(INPUT_POST, 'id_user', FILTER_SANITIZE_NUMBER_INT));
        if (empty($id_user)) {
            $error['id_user'] = 'L\'id est obligatoire';
        } else {
            //Validation de la donnée "id_user" grâce à la regex
            $isOk = filter_var($id_user, FILTER_VALIDATE_INT);
            if ($isOk == false) {
                $error['id_user'] = 'L\'id n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "lastname"
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($lastname)) {
                $error['lastname'] = 'Le Nom est obligatoire';
            } else {
        //Validation de la donnée "lastname" grâce à la regex
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.NAME.'/')));
            if ($isOk == false){
                $error['lastname'] = 'Le Nom n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "firstName"
            $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($firstname)) {
                $error['firstname'] = 'Le Prénom est obligatoire';
            } else {
        //Validation de la donnée "firstname" grâce à la regex
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.NAME.'/')));
            if ($isOk == false){
                $error['firstname'] = 'Le Prénom n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Performance"
            $performance = filter_input(INPUT_POST, 'performance', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($performance)) {
                $error['performance'] = 'La prestation est obligatoire';
            } else {
        //Validation de la donnée "performance" grâce à la regex
            $isOk = filter_var($performance, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,50}$/')));
            if ($isOk == false){
                $error['performance'] = 'La prestation décrite n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Message"
            $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($message)) {
                $error['message'] = 'Le message est obligatoire';
            } else {
        //Validation de la donnée "message" grâce à la regex
            $isOk = filter_var($message, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,300}$/')));
            if ($isOk == false){
                $error['message'] = 'Le message décrit n\'est pas valide !';
            }
        }
    }

    // Insertion des données
    if (empty($error) && !empty($message) && !empty($lastname) && !empty($firstname) && !empty($performance)) { 
        $messages = new Message($message, $lastname, $firstname, $performance, $reading = 0, NULL, NULL, NULL, $id_user);
        
        $result = $messages->insert();

        if($result) {
            $msg['success'] = 'La donnée a bien été insérée !';
        } else {
            $msg['error'] = 'Erreur, la donnée n\'a pas été insérée';
        }

        // Utilisation de sessions pour stocker temporairement les messages
        $_SESSION['msg'] = $msg;
        $_SESSION['error'] = $error;

        header('Location:/../../controllers/home/contact-ctrl.php');
        exit;
    }


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/contact.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';