<?php

session_start();

require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../config/init.php';

// Initialisation des tableaux pour les messages d'erreur
$error = [];
$msg = [];

try {
    $title = 'Ajout d\'une catégorie';
    // récupérer les valeurs 
    // $name = $_POST['name'];
    //Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Création d'un tableau d'erreurs
    //Récupération et nettoyage de la récupération de la donnée "Name"
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($name)) {
            $error['name'] = 'La catégorie est obligatoire';
        } else {
    //Validation de la donnée "Name" grâce à la regex
            $isOk = filter_var($name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z0-9]{2,30}$/')));
            if ($isOk == false){
                $error['name'] = 'La catégorie n\'est pas valide !';
            }
        }
    //Condition pour savoir si la catégoeie existe
        if (Category::isExist($name)) {
            $error['name'] = 'La catégorie existe déjà !';
        }

    // Requête mysql pour insérer des données
        if (empty($error)) {
            $category = new Category();
            $category->setName($name);
            $result = $category->insert();

            if($result) {
                $msg['success'] = 'La donnée a bien été insérée !';
            } else {
                $msg['error'] = 'Erreur, la donnée n\'a pas été insérée';
            }

            // Utilisation de sessions pour stocker temporairement les messages
            $_SESSION['msg'] = $msg;
            $_SESSION['error'] = $error;

            sleep(2);
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