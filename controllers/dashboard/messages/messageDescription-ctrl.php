<?php

require_once __DIR__ . '/../../../models/Messages.php';
require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';

session_start();

// Initialisation des tableaux pour les messages d'erreur
$error = [];
$msg = [];

try {
    $title = 'Description d\'un message';
    $user = User::getAll();
    $result = Message::getAll();

    $id_message = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $idMessage = Message::get($id_message);

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
        $users = User::get($id_user);

        //Récupération et nettoyage de la récupération de la donnée "lastname"
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastname)) {
            $error['lastname'] = 'Le Nom est obligatoire';
        } else {
            //Validation de la donnée "lastname" grâce à la regex
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME . '/')));
            if ($isOk == false) {
                $error['lastname'] = 'Le Nom n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "firstName"
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $error['firstname'] = 'Le Prénom est obligatoire';
        } else {
            //Validation de la donnée "firstname" grâce à la regex
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME . '/')));
            if ($isOk == false) {
                $error['firstname'] = 'Le Prénom n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Performance"
        $performance = filter_input(INPUT_POST, 'performance', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($performance)) {
            $error['performance'] = 'La prestation est obligatoire';
        } else {
            //Validation de la donnée "performance" grâce à la regex
            $isOk = filter_var($performance, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,50}$/')));
            if ($isOk == false) {
                $error['performance'] = 'La prestation décrite n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Message"
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($message)) {
            $error['message'] = 'Le message est obligatoire';
        } else {
            //Validation de la donnée "message" grâce à la regex
            $isOk = filter_var($message, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,300}$/')));
            if ($isOk == false) {
                $error['message'] = 'Le message décrit n\'est pas valide !';
            }
        }
    }

    // Si aucune erreur n'est détectée, effectuer la mise à jour
    // Insertion des données
    if (empty($error) && !empty($message) && !empty($lastname) && !empty($firstname) && !empty($performance)) {
        $message = new Message($message, $lastname, $firstname, $performance, $reading = 0, NULL, NULL, $id_message, $id_user);

        // Utilisation de sessions pour stocker temporairement les messages
        $_SESSION['success'] = $msg;
        $_SESSION['error'] = $error;

        header('Location: /controllers/dashboard/messages/list-ctrl.php');
        exit;
    }

    $idMessage = Message::get($id_message);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/messages/messageDescription.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
