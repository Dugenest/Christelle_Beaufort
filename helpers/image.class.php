<?php

    class Image {

        public static function resize(bool $required = true) {
            try {
                if (empty($_Files['profile']['name']) && $required) {
                    throw new exception ('Fichier obligatoire!');
                }
                if (!empty($_Files['profile']['name'])) {
                    if ($_FILES['profile']['error'] != 0) {
                        throw new exception ('Erreur!');
                    }
                    if (!in_array($_FILES['profile']['type'], ARRAY_TYPES)) {
                        throw new exception ('Mauvais format!');
                    }
                    if ($_FILES['profile']['size'] > UPLOAD_MAXSIZE) {
                        throw new exception ('Fichier trop lourd!');
                    }
                    $extension = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
                    $filename = uniqid('original_').'.'.$extension;
                    $from = $_FILES['profile']['tmp_name'];
                    $to = __DIR__ . '/../public/uploads/users/'.$filename;
                    move_uploaded_file($from, $to);
            
                    $image = imagecreatefromjpeg($to);
                    $widthOriginal = imagesx($image);
                    $heightOriginal = imagesy($image);
                    $ratio = floor($heightOriginal / $widthOriginal);
                    $width = 300;
                    $height = $width * $ratio;
                    $mode = IMG_BICUBIC;
                    $resampleObject = imagescale($image, $width, $height, $mode);
                    imagejpeg($resampleObject, $to, 80);
                }
        
            } catch (\Throwable $th) {
                $error ['profile'] = $th->getMessage();
            }
        }
    }