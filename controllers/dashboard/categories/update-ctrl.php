<?php


require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = 'Modification d\'une catégorie';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    $result = Category::getAll();

    $id_category = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $categories = Category::getId($id_category);


    if (!$categories) {
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
            $isOk = filter_var($category, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/^[a-zA-Z0-9 ]{2,40}$/')));
            if ($isOk == false) {
                $error['category'] = 'La catégorie n\'est pas valide !';
            }
        }

        $picture = $categories->picture ?? null;
        //Récupération et nettoyage de la récupération de la donnée "picture"
        if (!empty($_FILES['picture']['name'])) {
            try {
                @unlink(__DIR__ . '/../../../public/uploads/pictures/categories/' . $filename . '.' . $extension); //le @ permet de ne pas mettre de message d'erreurs car ici on veut juste supprimer l'image si on la change
                if ($_FILES['picture']['error'] != 0) {
                    throw new Exception("Une erreur s'est produite.");
                }
                if (!in_array($_FILES['picture']['type'], ARRAY_TYPES)) {
                    throw new Exception("Le format de l'image n'est pas correct.");
                }
                if ($_FILES['picture']['size'] > UPLOAD_MAXSIZE) {
                    throw new Exception("Le fichier est trop lourd.");
                }
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $extension;
                $from = $_FILES['picture']['tmp_name'];
                $to = __DIR__ . '/../../../public/uploads/pictures/categories/' . $filename;
                @unlink(__DIR__ . '/../../../public/uploads/pictures/categories/' . $categories->picture);
                move_uploaded_file($from, $to);
                $picture = $filename;

            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }


        // Si aucune erreur n'est détectée, effectuer la mise à jour
        if (empty($error)) {
    
            $categories = new Category($category, $picture, NULL, NULL, NULL, $id_category);
            $result = $categories->update();
        }

        if ($result) {
            $msg['success'] = "La donnée a été modifiée avec succès.";
        }

        // Utilisation de sessions pour stocker temporairement les messages
        $_SESSION['msg'] = $msg;
        $_SESSION['error'] = $error;

        header('Location: /controllers/dashboard/categories/list-ctrl.php');
        exit;

        $id_category = Category::getId($id_category);
    }
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/categories/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
