<?php


require_once __DIR__ . '/../../../models/Performances.php';
require_once __DIR__ . '/../../../config/init.php';


try 
{
    $title = 'Ajout d\'un tarif';
    
    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "name"
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($name)) {
            $error['name'] = 'Le nom de la prestation est obligatoire';
        } else {
        //Validation de la donnée "name" grâce à la regex
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z0-9]{2,30}$/')));
            if ($isOk == false){
                $error['name'] = 'Le nom de la prestation n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "type"
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($description)) {
            $error['description'] = 'La description est obligatoire';
        } else {
        //Validation de la donnée "description" grâce à la regex
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s.,;\'\"!?()\[\]{}\-_:€\*%=\+@ ]{5,300}$/')));
            if ($isOk == false){
                $error['description'] = 'La description n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "price"
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
        if (empty($price)) {
            $error['price'] = 'Le tarif est obligatoire';
        } else {
        //Validation de la donnée "price" grâce à la regex
            $isOk = filter_var($price, FILTER_VALIDATE_INT);
            if ($isOk == false){
                $error['price'] = 'Le tarif n\'est pas valide !';
            }
        }


        // Insertion des données
        if (empty($error)) {
            $performance = new Performance();
            $performance->setName($name);
            $performance->setDescription($description);
            $performance->setPrice($price);
            
            $result = $performance->insert();
    
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
include __DIR__ . '/../../../views/dashboard/performances/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';