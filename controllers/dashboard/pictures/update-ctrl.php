<?php


require_once __DIR__ . '/../../../models/Pictures.php';
require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = 'Modification d\'une photo';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    $result = Picture::getAll();
    $categories = Category::getAll();

    $id_picture = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $pictures = Picture::getId($id_picture);

    if (!$pictures) {
        header('Location: /controllers/dashboard/pictures/list-ctrl.php');
        die;
    }

    // Si le formulaire est soumis en POST
    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération, nettoyage et validation de la donnée "category"
        $id_category = intval(filter_input(INPUT_POST, 'id_category', FILTER_SANITIZE_NUMBER_INT));
        if (empty($id_category)) {
            $error['id_category'] = 'La catégorie est obligatoire';
        } else {
            //Validation de la donnée "$id_category" grâce à la regex
            //vérification de l'id
            $categoriesId = array_column($categories, 'id_category');
            $isOk = in_array($id_category, $categoriesId);

            if ($isOk == false) {
                $error['id_category'] = 'La catégorie n\'existe pas !';
            }
        }

        $picture = $pictures->picture ?? null;
        //Récupération et nettoyage de la récupération de la donnée "picture"
        if (!empty($_FILES['picture']['name'])) {
            try {
                @unlink(__DIR__ . '/../../../public/uploads/vehicles/' . $filename . '.' . $extension); //le @ permet de ne pas mettre de message d'erreurs car ici on veut juste supprimer l'image si on la change
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
                $to = __DIR__ . '/../../../public/uploads/pictures/' . $filename . '.' . $extension;
                move_uploaded_file($from, $to);
                $picture = $filename . '.' . $extension;
            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }


        // Si aucune erreur n'est détectée, effectuer la mise à jour
        if (empty($error)) {
            $filename = $pictures->picture;

                if (!empty($filename)) { // Vérifier si le nom du fichier est non vide

                    $filepath = __DIR__ . "/../../../public/uploads/pictures/$filename";
                    if (file_exists($filepath)) {

                        if (unlink($filepath)) {
                            // Suppression réussie
                        } else {
                            $msg['error'] = 'Erreur lors de la suppression du fichier associé à la catégorie.';
                        }
                    } else {
                        $msg['error'] = 'Le fichier associé à la catégorie n\'existe pas.';
                    }
                } else {
                    $msg['error'] = 'Le nom de fichier associé à la catégorie est vide.';
                }
            }
            $pictures = new Picture($picture, NULL, NULL, NULL, $id_picture, $id_category, NULL);
            $result = $pictures->update();

            if ($result) {
                $msg['success'] = "La donnée a été modifiée avec succès.";
                
        }

        // Utilisation de sessions pour stocker temporairement les messages
        $_SESSION['msg'] = $msg;
        $_SESSION['error'] = $error;

        header('Location: /controllers/dashboard/pictures/list-ctrl.php');
        exit;

        $id_picture = Picture::getId($id_picture);
    }

} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}

// Afficher la vue de mise à jour
include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/pictures/update.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
