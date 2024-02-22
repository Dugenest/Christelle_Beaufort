<?php


require_once __DIR__ . '/../../../models/Performances.php';
require_once __DIR__ . '/../../../models/Categories.php';
require_once __DIR__ . '/../../../config/init.php';


try {
    $title = 'Ajout d\'un tarif';
    $categories = Category::getAll();

    // Initialisation des tableaux pour les messages d'erreur
    $error = [];
    $msg = [];

    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        //Récupération et nettoyage de la récupération de la donnée "id_category"
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
            $isOk = filter_var($titlePerformance, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . PERFORMANCE . '/')));
            if ($isOk == false) {
                $error['titlePerformance'] = 'Le titre n\'est pas valide !';
            }
        }

        //Récupération et nettoyage de la récupération de la donnée "description"
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($description)) {
            $error['description'] = 'La description est obligatoire';
        } else {
            //Validation de la donnée "description" grâce à la regex
            $isOk = filter_var($description, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . MESSAGE . '/')));
            if ($isOk == false) {
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
            if ($isOk == false) {
                $error['price'] = 'Le tarif n\'est pas valide !';
            }
        }


        // Insertion des données
        if (empty($error)) {
            $performance = new Performance();
            $performance->setIdCategory($id_category);

            $performance->setTitlePerformance($titlePerformance);
            $performance->setDescription($description);
            $performance->setPrice($price);

            $result = $performance->insert();

            if ($result) {
                $msg['success'] = 'La donnée a bien été insérée !';
            } else {
                $msg['error'] = 'Erreur, la donnée n\'a pas été insérée';
            }

            // Utilisation de sessions pour stocker temporairement les messages
            $_SESSION['msg'] = $msg;
            $_SESSION['error'] = $error;

            //redirection vers la page des tarifs
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
