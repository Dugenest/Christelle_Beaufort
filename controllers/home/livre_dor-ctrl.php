<?php


require_once __DIR__ . '/../../models/Comments.php';
require_once __DIR__ . '/../../models/Users.php';
require_once __DIR__ . '/../../config/init.php';


try {
    $title = 'Livre d\'or';

    $comments = Comment::getAll();

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Création d'un tableau d'erreurs
        $error = [];

        //Récupération, nettoyage et validation de la donnée "username"
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($username)) {
            $error['username'] = 'L\'identifiant est obligatoire';
        } else {
            //Validation de la donnée "username" grâce à la regex
            $isOk = filter_var($username, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . USER_NAME . '/')));
            if ($isOk == false) {
                $error['username'] = 'L\'identifiant décrite n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "Performance"
        $performance = filter_input(INPUT_POST, 'performance', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($performance)) {
            $error['performance'] = 'La prestation est obligatoire';
        } else {
            //Validation de la donnée "performance" grâce à la regex
            $isOk = filter_var($performance, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . PERFORMANCE . '/')));
            if ($isOk == false) {
                $error['performance'] = 'La prestation décrite n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "message"
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($message)) {
            $error['message'] = 'Le message est obligatoire';
        } else {
            //Validation de la donnée "message" grâce à la regex
            $isOk = filter_var($message, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . MESSAGE . '/')));
            if ($isOk == false) {
                $error['Message'] = 'Le message n\'est pas valide !';
            }
        }

        //vérification de l'identifiant en base de donnée avec celui tapé par l'utilisateur 
        if (!empty($username) && $username != NULL) {
            $isexistUsername = User::isExist($username);
            if ($isexistUsername) {
                if (empty($error)) {
                    $users = User::getByUsername($username);
                    $id_user = $users->id_user;

                    $comments = new Comment($message, $performance, NULL, NULL, NULL, NULL, $id_user);
                    $results = $comments->insert();
                    $success['messageSuccess'] = 'Identifiant correct! Votre message a été envoyé à l\'admin pour validation.';
                }
            } else {
                $error['messageError'] = 'Identifiant incorrect! Message non envoyé!';
            }
        }

        // Utilisation de sessions pour stocker temporairement les messages
        $_SESSION['msg'] = $msg;
        $_SESSION['error'] = $error;
        $_SESSION['messageSuccess'] = $success;
        $_SESSION['messageError'] = $error;
        
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../views/templates/home/header.php';
include __DIR__ . '/../../views/home/livre_dor.php';
include __DIR__ . '/../../views/templates/home/footer.php';
