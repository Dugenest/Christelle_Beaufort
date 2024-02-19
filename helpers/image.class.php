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
                
                return $picture;

            } catch (\Throwable $th) {
                $error['picture'] = $th->getMessage();
            }
        }
    }
}
