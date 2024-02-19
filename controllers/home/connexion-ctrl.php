<?php

require_once __DIR__ . '/../../config/init.php';
require_once __DIR__ . '/../../models/Users.php';

try
{
    $title = 'Connexion';
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
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=> '/' . USER_NAME . '/')));
            if ($isOk == false){
                $error['username'] = 'L\'identifiant n\'est pas valide !';
                }
            }

        //Récupération, nettoyage et validation de la donnée "Mot de passe"
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($password)) {
                $error['password'] = 'Le Mot de Passe est obligatoire';
            } else {
        //Validation de la donnée "password" grâce à la regex
                $isOk = filter_var($password, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=> '/' . PSWD . '/')));
                if ($isOk == false){
                    $error['password'] = 'Le Mot de Passe n\'est pas valide !';
                }
            }
                
            if (empty($error)) {
                $user = User::getByUsername($username);
            
                if (!$user) {
                    $error[] = "Nom d'utilisateur incorrect";
                } else {
                    $passwordHash = $user->password;
            
                    if (password_verify($password, $passwordHash)) {
                            // Supprimez les informations sensibles avant de stocker en session
                            unset($user->password);
            
                            // Stockez l'utilisateur en session
                            $_SESSION['user'] = $user;
                        
                    } else {
                        $error[] = "Mot de passe incorrect";
                    }
                }
            }
            
            // Gestion générale des erreurs
            if (!empty($error)) {
                foreach ($error as $value) {
                    echo $value . "<br>";
                }
                // Vous pouvez rediriger l'utilisateur vers une page d'erreur ou afficher un message approprié.
            } else {
                // L'utilisateur est authentifié avec succès, redirigez-le vers la page d'accueil ou une autre page sécurisée.
                header("Location: /../../../../index.php");
                exit();
            }
        }     

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include_once __DIR__ . '/../../views/templates/Home/header.php';
include_once __DIR__ . '/../../views/home/connexion.php';
include_once __DIR__ . '/../../views/templates/Home/footer.php';