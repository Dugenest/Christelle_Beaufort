<?php


require_once __DIR__ . '/../../../models/Pictures.php';
require_once __DIR__ . '/../../../config/init.php';

try {
    $title = 'Supprimer une photo';
    $msg = [];

    //Récupération de l'id de la photo et nettoyage
    $id_picture = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
    
    //Récupération de l'image en base de données
    $filePicture = Picture::getId($id_picture);
    $filename = $filePicture->picture;
    
    //Suppression de la photo
    $deleteResult = Picture::delete($id_picture);

    if ($deleteResult) {
        $msg['success'] = 'Suppression réussie';
        
        if (!empty($filename)) { // Vérifier si le nom du fichier est non vide
            
            $filepath = __DIR__ . "/../../../public/uploads/pictures/picture/$filename";
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

    // Utilisation de sessions pour stocker temporairement les messages
    $_SESSION['msg'] = $msg;

    // Rediriger vers la page des photos après la suppression
    header("Location:/controllers/dashboard/pictures/list-ctrl.php");
    exit();


} catch (PDOException $e) {
    die('Erreur : ' . $e->getMessage());
}
