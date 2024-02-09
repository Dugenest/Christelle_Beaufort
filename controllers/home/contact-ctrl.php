<?php

require_once __DIR__ . '/../../models/Users.php';
require_once __DIR__ . '/../../models/Messages.php';
require_once __DIR__ . '/../../config/init.php';

try {
    $title = 'Contact';
    $messages = Message::getAll();


    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Création d'un tableau d'erreurs
        $error = [];

        //Récupération et nettoyage de la récupération de la donnée "username"
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($username)) {
            //Validation de la donnée "username" grâce à la regex
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[a-zA-Z0-9]{2,30}$/')));
            if ($isOk == false) {
                $error['username'] = 'L\'identifiant n\'est pas valide !';
            }
        }

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

        //Récupération et nettoyage de la récupération de la donnée "email"
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $error['email'] = 'L\'email est obligatoire';
        } else {
            //Validation de la donnée "email" grâce à la regex
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($isOk == false) {
                $error['email'] = 'L\'email n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "phone"
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($phone)) {
            $error['phone'] = 'Le numéro de téléphone est obligatoire';
        } else {
            //Validation de la donnée "phone" grâce à la regex
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[0-9]{10}$/')));
            if ($isOk == false) {
                $error['phone'] = 'Le numéro de téléphone n\'est pas valide !';
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
                $error['Message'] = 'Le message décrit n\'est pas valide !';
            }
        }


        if (!empty($username) && $username != NULL) {
            $isexistUsername = User::isExist($username);
            if ($isexistUsername) {
                $users = User::getByUsername($username);
                $id_user = $users->id_user;
                $errorMessage = 'Identifiant correct! Votre formulaire a été envoyé à l\'admin.';
            } else {
                $errorMessage = 'Identifiant incorrect! Formulaire non envoyé!';
            }
        }

        if (empty($error)) {
            $messages = new Message($message, $lastname, $firstname, $email, $phone, $performance, $reading = 0, NULL, NULL, NULL, $id_user);
            $results = $messages->insert();

            // Utilisation de sessions pour stocker temporairement les messages
            $_SESSION['msg'] = $msg;
            $_SESSION['error'] = $error;

            header('Location: /controllers/home/contact-ctrl.php');
            exit;
        }
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/contact.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';
