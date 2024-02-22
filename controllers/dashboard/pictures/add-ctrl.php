<?php


require_once __DIR__ . '/../../../models/Pictures.php';
require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';
require_once __DIR__ . '/../../../helpers/image.class.php';


try {
    $title = 'Ajout d\'une photo';
    $categories = Category::getAll();

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "title"
        $pictureTitle = filter_input(INPUT_POST, 'pictureTitle', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($pictureTitle)) {
            $error['pictureTitle'] = 'Le titre est obligatoire';
        } else {
        //Validation de la donnée "pictureTitle" grâce à la regex
            $isOk = filter_var($pictureTitle, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME . '/')));
            if ($isOk == false){
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
                $to = __DIR__ . '/../../../public/uploads/pictures/picture/' . $filename . '.' . $extension;
                move_uploaded_file($from, $to);
                $picture = $filename . '.' . $extension;

                $image = imagecreatefromjpeg($to); // use function from the library GD

                $widthOriginal = imagesx($image);
                $heightOriginal = imagesy($image);
                if ($heightOriginal > $widthOriginal) { // it's portrait
                    $height = 1280;
                    $width = ceil(($widthOriginal * $height) / $heightOriginal);
                } else {
                    $width = 1280; // max to have great quality with reduced weight
                    $height = -1;
                }

                $mode = IMG_BILINEAR_FIXED; // algo of img resizing
                $resampledObject = imagescale($image, $width, $height, $mode); // transform img in object to apply changes
                imagejpeg($resampledObject, $to, 80); // transform object in img

            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "model"
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($description)) {
        //Validation de la donnée "description" grâce à la regex
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . MESSAGE . '/')));
                $error['description'] = 'La description n\'est pas valide !';
            }
        }

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

        // Insertion des données
        if (empty($error)) {
            $pictures = new Picture($pictureTitle, $price, $picture, $description, NULL, NULL, NULL, $id_picture, $id_category, NULL);

            $result = $pictures->insert();

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
    
} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}


include __DIR__ . '/../../../views/templates/dashboard/header.php';
include __DIR__ . '/../../../views/dashboard/pictures/add.php';
include __DIR__ . '/../../../views/templates/dashboard/footer.php';
