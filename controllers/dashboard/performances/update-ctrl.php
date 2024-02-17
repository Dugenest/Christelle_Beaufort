<?php


require_once __DIR__ . '/../../../models/Performances.php';
require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = 'Modification d\'un tarif';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];
    $categories = Category::getAll();
    $result = Performance::getAll();

    $id_performance = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $performance = Performance::getId($id_performance);

    if (!$performance) {
        header('Location: /controllers/dashboard/performances/list-ctrl.php');
        die;
    }

    // Si le formulaire est soumis en POST
    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "name"
        $id_category = filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT);
        if (empty($id_category)) {
            $error['id_category'] = 'L\'id est obligatoire';
        } else {
            //Validation de la donnée "id_category" grâce à la regex
            $isOk = filter_var($id_category, FILTER_VALIDATE_INT);
            if ($isOk == false) {
                $error['id_category'] = 'L\'id n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "titlePerformance"
        $titlePerformance = filter_input(INPUT_POST, 'titlePerformance', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($titlePerformance)) {
            $error['titlePerformance'] = 'Le titre est obligatoire';
        } else {
            //Validation de la donnée "titlePerformance" grâce à la regex
            $isOk = filter_var($titlePerformance, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[a-zA-Z0-9]{2,30}$/')));
            if ($isOk == false) {
                $error['titlePerformance'] = 'Le titre n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "type"
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($description)) {
            $error['description'] = 'Le description est obligatoire';
        } else {
            //Validation de la donnée "description" grâce à la regex
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s.,;\'\"!?()\[\]{}\-_:€\*%=\+@ ]{5,300}$/')));
            if ($isOk == false) {
                $error['description'] = 'Le type n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "price"
        $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
        if (empty($price)) {
            $error['price'] = 'Le tarif est obligatoire';
        } else {
            //Validation de la donnée "price" grâce à la regex
            $isOk = filter_var($price, FILTER_VALIDATE_INT);
            if ($isOk == false) {
                $error['price'] = 'Le tarif n\'est pas valide !';
            }
        }


        // Si aucune erreur n'est détectée, effectuer la mise à jour
        if (empty($error)) {
            $performance = new Performance();
            $performance->setIdCategory($id_category);
            $performance->setTitlePerformance($titlePerformance);
            $performance->setDescription($description);
            $performance->setPrice($price);
            $performance->setIdPerformance($id_performance);

            $result = $performance->update();

            if ($result) {
                $msg['success'] = "Le tarif a été modifié avec succès.";
            } else {
                $msg['error'] = "Erreur lors de la mise à jour du tarif.";
            }
        }

        // Utilisation de sessions pour stocker temporairement les messages
        $_SESSION['msg'] = $msg;
        $_SESSION['error'] = $error;

        header('Location: /controllers/dashboard/performances/list-ctrl.php');
        exit;

        $performance = Performance::getId($id_performance);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/performances/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
