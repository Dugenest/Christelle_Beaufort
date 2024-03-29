<?php
require_once __DIR__ . '/../config/init.php';

class Image
{
    //Récupération et nettoyage de la récupération de la donnée "picture"
    public static function resize(bool $required = true)
    {
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
                $to = __DIR__ . '/../public/uploads/pictures/picture/' . $filename . '.' . $extension;
                move_uploaded_file($from, $to);
                $picture = $filename . '.' . $extension;

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
                
                return $picture;

            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }
    }
}
