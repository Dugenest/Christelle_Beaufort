<?php


require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';


try 
{
    $title = 'Ajout d\'un utilisateur';
    
    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "username"
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($username)) {
            $error['username'] = 'L\'identifiant est obligatoire';
        } else {
        //Validation de la donnée "username" grâce à la regex
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME . '/')));
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
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME . '/')));
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
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME . '/')));
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

        //Récupération et nettoyage de la récupération de la donnée "phone"
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($phone)) {
            $error['phone'] = 'Le numéro de téléphone est obligatoire';
        } else {
        //Validation de la donnée "phone" grâce à la regex
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . PHONE . '/')));
            if ($isOk == false){
                $error['phone'] = 'Le numéro de téléphone n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "role"
        $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT);
        if (empty($role)) {
            $error['role'] = 'Le rôle est obligatoire';
        } else {
        //Validation de la donnée "role" grâce à la regex
            $isOk = filter_var($role, FILTER_VALIDATE_INT);
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
            $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . PSWD . '/')));
            if ($isOk == false){
                $error['password'] = 'Le mot de passe n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "password"
        $confirmPassword = filter_input(INPUT_POST, 'confirmPassword', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($confirmPassword)) {
            $error['confirmPassword'] = 'Le mot de passe est obligatoire';
        } else {
            //Validation de la donnée "confirmPassword" grâce à la regex
            $isOk = filter_var($confirmPassword, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . PSWD . '/')));
            if ($isOk == false) {
                $error['confirmPassword'] = 'Le mot de passe n\'est pas valide !';
            }
        }

        //vérification de la correspondance des mots de passe
        if ($password != $confirmPassword) {
            $error["password"] = "les mots de passe ne correspondent pas";
        }


        // Insertion des données
        if (empty($error)) {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $user = new User();
            $user->setUsername($username);
            $user->setLastname($lastname);
            $user->setFirstname($firstname);
            $user->setEmail($email);
            $user->setPhone($phone);
            $user->setRole($role);
            $user->setPassword($passwordHash);
            
            $result = $user->insert();
    
            if($result) {
                $msg['success'] = 'La donnée a bien été insérée !';
            } else {
                $msg['error'] = 'Erreur, la donnée n\'a pas été insérée';
            }

            // Utilisation de sessions pour stocker temporairement les messages
            $_SESSION['msg'] = $msg;
            $_SESSION['error'] = $error;

            //Redirection vers la liste des utilisateurs
            header('Location:list-ctrl.php');
            exit;
        }
    }

} catch (PDOException $e) {
die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/users/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';