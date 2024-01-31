<?php

session_start();

require_once __DIR__ . '/../../../models/Comments.php';
require_once __DIR__ . '/../../../config/init.php';


try 
{
    $title = 'Ajout d\'un commentaire';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "comment"
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($comment)) {
            $error['comment'] = 'Le commentaire est obligatoire';
        } else {
        //Validation de la donnée "comment" grâce à la regex
            $isOk = filter_var($comment, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z0-9 ]{2,300}$/')));
            if ($isOk == false){
                $error['comment'] = 'Le commentaire n\'est pas valide !';
            }
        }


    // Insertion des données
        if (empty($error)) {
            $comments = new Comment();
            $comments->setcomment($comment);
            
            $result = $comments->insert();
    
            if($result) {
                $msg['success'] = 'La donnée a bien été insérée !';
            } else {
                $msg['error'] = 'Erreur, la donnée n\'a pas été insérée';
            }

            // Utilisation de sessions pour stocker temporairement les messages
            $_SESSION['msg'] = $msg;
            $_SESSION['error'] = $error;

            header('Location:list-ctrl.php');
            exit;
        }

    }
} catch (PDOException $e) {
die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/comments/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';