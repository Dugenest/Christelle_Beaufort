<?php

session_start();

require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = 'Modification d\'un utilisateur';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    $result = User::getAll();
    
    $id_user = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $user = User::get($id_user);

    if(!$user) {
        header('Location: /controllers/dashboard/users/list-ctrl.php');
        die;
    }

    // Si le formulaire est soumis en POST
    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "username"
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

        //Récupération et nettoyage de la récupération de la donnée "lastname"
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastname)) {
            $error['lastname'] = 'Le nom est obligatoire';
        } else {
        //Validation de la donnée "lastname" grâce à la regex
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z]{2,30}$/')));
            if ($isOk == false){
                $error['lastname'] = 'Le nom n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "firstname"
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstname)) {
            $error['firstname'] = 'Le prénom est obligatoire';
        } else {
        //Validation de la donnée "firstname" grâce à la regex
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z]{2,30}$/')));
            if ($isOk == false){
                $error['firstname'] = 'Le prénom n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "email"
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        if (empty($email)) {
            $error['email'] = 'L\'email est obligatoire';
        } else {
        //Validation de la donnée "email" grâce à la regex
            $isOk = filter_var($email, FILTER_VALIDATE_EMAIL);
            if ($isOk == false){
                $error['email'] = 'L\'email n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "adress"
        $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($adress)) {
            $error['adress'] = 'L\'adresse est obligatoire';
        } else {
        //Validation de la donnée "adress" grâce à la regex
            $isOk = filter_var($adress, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z0-9 ]{2,50}$/')));
            if ($isOk == false){
                $error['adress'] = 'L\'adresse n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "phone"
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($phone)) {
            $error['phone'] = 'Le numéro de téléphone est obligatoire';
        } else {
        //Validation de la donnée "phone" grâce à la regex
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[0-9]{10}$/')));
            if ($isOk == false){
                $error['phone'] = 'Le numéro de téléphone n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "role"
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($role)) {
            $error['role'] = 'Le rôle est obligatoire';
        } else {
        //Validation de la donnée "role" grâce à la regex
            $isOk = filter_var($role, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z]{2,30}$/')));
            if ($isOk == false){
                $error['role'] = 'Le rôle n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "password"
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($password)) {
            $error['password'] = 'Le mot de passe est obligatoire';
        } else {
        //Validation de la donnée "password" grâce à la regex
            $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/')));
            if ($isOk == false){
                $error['password'] = 'Le mot de passe n\'est pas valide !';
            }
        }

            
        // Si aucune erreur n'est détectée, effectuer la mise à jour
        if (empty($error)) {
            $user = new User($username, $lastname, $firstname, $email, $adress, $phone, $role, $password, NULL, NULL, NULL, $id_user);
            
            $result = $user->update();
            
            if ($result) {
                $msg['success'] = "L'utilisateur a été modifié avec succès.";
            } else {
                $msg['error'] = "Erreur lors de la mise à jour du véhicule.";
            }
        }

        // Utilisation de sessions pour stocker temporairement les messages
            $_SESSION['msg'] = $msg;
            $_SESSION['error'] = $error;

            header('Location: /controllers/dashboard/users/list-ctrl.php');
            exit;
        }

    $id_user = User::get($id_user);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/users/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

