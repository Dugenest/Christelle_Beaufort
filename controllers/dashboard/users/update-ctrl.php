<?php

session_start();

require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../config/init.php';

// Initialisation des tableaux pour les messages d'erreur
$error = [];
$msg = [];

try {
    $title = 'Modification d\'une catégorie';
    $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

    $category = Category::get($id_category);

    if(!$category) {
        header('Location: /controllers/dashboard/categories/list-ctrl.php');
        die;
    }

    // Si le formulaire est soumis en POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Récupérer et valider les données
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

        if (empty($name)) {
            $error['name'] = 'La catégorie est obligatoire';
        } else {
            // Valider le nom avec une expression régulière
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[a-zA-Z0-9]{2,30}$/')));
            if (!$isOk) {
                $error['name'] = 'La catégorie n\'est pas valide !';
            }
        }

        if (Category::isExist($name) && $name != $category->name) {
            $error ['name'] = 'Erreur, la catégorie existe déjà !';
        }
            
        // Si aucune erreur n'est détectée, effectuer la mise à jour
        if (empty($error)) {
            $category = new Category();
            $category->setName($name);
            $category->setIdCategory($id_category);
            
            if (!$isExist) {
                $result = $category->update();
                $msg['success'] = "La catégorie a été modifiée avec succès.";
            }

        // Utilisation de sessions pour stocker temporairement les messages
            $_SESSION['msg'] = $msg;
            $_SESSION['error'] = $error;

            sleep(2);
            header('Location: /controllers/dashboard/categories/list-ctrl.php');
            exit;
        }
    }
    $category = Category::get($id_category);

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';

