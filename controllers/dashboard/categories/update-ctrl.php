<?php


require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = 'Modification d\'une catégorie';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    $categories = Category::getAll();

    $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $idCategories = Category::getId($id_category);

    if (!$idCategories) {
        header('Location: /controllers/dashboard/categories/list-ctrl.php');
        die;
    }

    // Si le formulaire est soumis en POST
    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "category"
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($category)) {
            $error['category'] = 'La catégorie est obligatoire';
        } else {
            //Validation de la donnée "category" grâce à la regex
            $isOk = filter_var($category, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[a-zA-Z0-9 ]{2,30}$/')));
            if ($isOk == false) {
                $error['category'] = 'La catégorie n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "category"
        $sub_category = filter_input(INPUT_POST, 'sub_category', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($sub_category)) {
            //Validation de la donnée "sub_category" grâce à la regex
            $isOk = filter_var($sub_category, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[a-zA-Z0-9 ]{2,30}$/')));
            if ($isOk == false) {
                $error['sub_category'] = 'La sous catégorie n\'est pas valide !';
            }
        }

        // Si aucune erreur n'est détectée, effectuer la mise à jour
        if (empty($error)) {
        
            $pictures = new Category($category, $sub_category, NULL, NULL, NULL, $id_category);
            $result = $pictures->update();

            if ($result) {
                $msg['success'] = "La donnée a été modifiée avec succès.";
            }

            // Utilisation de sessions pour stocker temporairement les messages
            $_SESSION['msg'] = $msg;
            $_SESSION['error'] = $error;

            header('Location: /controllers/dashboard/categories/list-ctrl.php');
            exit;

            $idCategories = Category::getId($id_category);
        }
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
