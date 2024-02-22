<?php


require_once __DIR__ . '/../../../models/Pictures.php';
require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';



try {
    $title = 'Modification d\'une photo';

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    //Récupération des données pour picture et category
    $result = Picture::getAll();
    $categories = Category::getAll();

    //récupération de l'id-picture avec l'url
    $id_picture = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    $pictures = Picture::getId($id_picture);

    if (!$pictures) {
        header('Location: /controllers/dashboard/pictures/list-ctrl.php');
        die;
    }

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "pictureTitle"
        $pictureTitle = filter_input(INPUT_POST, 'pictureTitle', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($pictureTitle)) {
            $error['pictureTitle'] = 'Le titre est obligatoire';
        } else {
            //Validation de la donnée "pictureTitle" grâce à la regex
            $isOk = filter_var($pictureTitle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME . '/')));
            if ($isOk == false) {
                $error['pictureTitle'] = 'Le titre n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "price"
        $price = intval(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($price)) {
            //Validation de la donnée "price" grâce à la regex
            $isOk = filter_var($price, FILTER_VALIDATE_INT);
            if ($isOk == false) {
                $error['price'] = 'Le prix n\'est pas valide !';
            }
        }

        //Récupération, nettoyage et validation de la donnée "id_category"
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
                $to = __DIR__ . '/../../../public/uploads/pictures/picture/' . $filename;
                @unlink(__DIR__ . '/../../../public/uploads/pictures/picture/' . $pictures->picture);
                move_uploaded_file($from, $to);
                $picture = $filename;

                $image = imagecreatefromjpeg($to); // utilisation de la fonction pour la librairie GD

                $widthOriginal = imagesx($image);
                $heightOriginal = imagesy($image);
                if ($heightOriginal > $widthOriginal) { // portrait
                    $height = 1280;
                    $width = ceil(($widthOriginal * $height) / $heightOriginal);
                } else {
                    $width = 1280; // max de qualité sans réduire la largeur
                    $height = -1;
                }

                $mode = IMG_BILINEAR_FIXED; // algo de l'image
                $resampledObject = imagescale($image, $width, $height, $mode); // transformation de l'image en objet
                imagejpeg($resampledObject, $to, 80); // transformation de l'objet en image


            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }


        //Récupération et nettoyage de la récupération de la donnée "description"
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($description)) {
            //Validation de la donnée "description" grâce à la regex
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . MESSAGE . '/')));
            if ($isOk == false) {
                $error['description'] = 'La description n\'est pas valide !';
            }
        }


        // Si aucune erreur n'est détectée, effectuer la mise à jour
        if (empty($error)) {
            $pictures = new Picture($pictureTitle, $price, $picture, $description, NULL, NULL, NULL, $id_picture, $id_category, NULL);
            $result = $pictures->update();
        }

        if ($result) {
            $msg['success'] = "La donnée a été modifiée avec succès.";
        }

        // Utilisation de sessions pour stocker temporairement les messages
        $_SESSION['msg'] = $msg;
        $_SESSION['error'] = $error;

        //Redirection vers la liste des photos
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
