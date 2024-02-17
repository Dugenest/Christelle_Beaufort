<?php


require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = 'Ajout d\'une catégorie';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

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


         //Récupération et nettoyage de la récupération de la donnée "picture"
        if (!empty($_FILES['picture']['name'])) {
            try {
                if ($_FILES['picture']['error'] != 0) {
                    throw new Exception("Une erreur s'est produite.");
                }
                if (!in_array($_FILES['picture']['type'], ARRAY_TYPES)) {
                    throw new Exception("Le format de l'image n'est pas correct.");
                }
                if ($_FILES['picture']['size'] > UPLOAD_MAXSIZE) {
                    throw new Exception("Le fichier est trop lourd.");
                }
                $filename = uniqid("img");
                $extension = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);

                $from = $_FILES['picture']['tmp_name'];
                $to = __DIR__ . '/../../../public/uploads/pictures/categories/' . $filename . '.' . $extension;
                move_uploaded_file($from, $to);
                $picture = $filename . '.' . $extension;
            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }



        // Insertion des données
        if (empty($error)) {
            $categories = new Category();
            $categories->setCategory($category);
            $categories->setPicture($picture);

            $result = $categories->insert();

            if ($result) {
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
include __DIR__ . '/../../../views/dashboard/categories/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
