INSCRIPTION :

password varchar(255)
role -> int

if ($password != $confirmPassword) {
$errors["password"] = "les mots de passe ne correspondent pas";
}


if (empty($errors)) {
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$user = new User();
$user->setPassword($passwordHash);

$user->insert()
}

Ne jamais utiliser le hachage MD5



CONNEXION:

email / Identifiant
password (pas de regex ni de pattern)

if ($_SERVER("REQUEST_METHOD") == 'POST') {
<- ...... nettoyage et validation de l'email et du password ....... ->

    public static function getByMail(string $email): object|False
    {
    $pdo = Database::connect();
    $sql = 'SELECT *
    FROM `users`
    WHERE `email` = :email;';
    $sth = $pdo->prepare($sql);
    $sth->bindValue(':email', $email);
    $sth->execute();
    $result = $sth->fetch();

    return $result;
    }


    if (empty($errors)) {
    $user = User::getByMail($email);
    if (!$user) {
    message d'erreur!!
    } else {
    $passwordHash = $user->password
    $isAuth = password_verify($password, $passwordHash); //ici $password du formulaire de connexion
    if ($isAuth) {
    if (is_null($user->confirmed_at)) {
    message erreur : veuiller confirmer!
    } else {
    unset($user->password);
    $_SESSION['user'] = $user;
    }
    } else {
    message erreur : Mauvais password!
    }
    }
    }
    }

    //securiser dashboard
    Auth::check()
    if(empty($_SESSION['user']) || $_SESSION['user']->role != 1) {
    header('location: /controllers/home/connexion-ctrl.php');
    exit;
    }



    AJAX :

    //fichier JS: // changeit est l'id du button et datetime est l'id de la div dans le fichier HTML

    changeit.addEventListener ('click', () => {
    fetch('ajaxGetDate.php')
    .then((response) => {
    return response.json
    })
    .then((data) => {
    dateTime.innertext = data;
    })
    })



    //fichier PHP: ajaxGetDate.php

    $date = date(d,m,Y h,i,s);
    echo json_encode($date)







//fichier JS: envoi en GET de l'email

const checkEmail () => 
{
    fetch('users-ajax-checkEmail-ctrl.php?email='+email.value)
        .then((response) => {
        return response.json();
        })
        .then((isExist) => {
            if(!isExist) {
                email.classList.add('error');
            }
                email.classList.remove('error');
        <!-- dateTime.innertext = data; -->
        })
}
    email.addEventListener ('blur', checkEmail);


    //fichier PHP: users-ajax-checkEmail-ctrl.php
    <?php
        include __DIR__ /../../models/users.php

        //affiche true si l'email existe
        $email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_email);
        $result = getByMail($email);
        var_dump($email);
        if ($result)
            $result = true;
            echo json_encode($result);
    ?>








//fichier JS: envoi en POST de l'email

const checkEmail () => 
{
    let myForm = new FormData();   //création d'un nouveau formulaire vide
    myForm.append('email', email.value)  //ajoute un champ à mon formulaire

    let options = {
        body: myForm,
        method: 'POST'
    }
    fetch('users-ajax-checkEmail-ctrl.php', options)
        .then((response) => {
        return response.json();
        })
        .then((isExist) => {
            if(!isExist) {
                email.classList.add('error');
            }
                email.classList.remove('error');
        <!-- dateTime.innertext = data; -->
        })
}
    email.addEventListener ('blur', checkEmail);


    //fichier PHP: users-ajax-checkEmail-ctrl.php
    <?php
        include __DIR__ /../../models/users.php

        //affiche true si l'email existe
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_email);
        $result = getByMail($email);
        var_dump($email);
        if ($result)
            $result = true;
            echo json_encode($result);
    ?>








//API code postal :

    //fichier JS : getCities.js

    const getCities (() => 
    {
        let myForm = new FormData(Form); //Form est le nom du formulaire dans HTML
        let options = {
        body: myForm,
        method: 'POST'
        }

        fetch('users-ajax-getCities-ctrl.php', options)
        .then((response) => {
            return response.json();
        })
        .then((cities) => {
            console.log(cities);
            let options = '';
            cities.foreach(city => {
                options += `<option value="${city.codeCommune}">${city.nomCommune}</option>
            });
            citySelect.innerHTML = options;
        });
    });
    zipcode.addEventListener('blur', getCities);



    //fichier PHP : users-ajax-getcities-ctrl.php
    <?php 

        $zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_NUMBER_INT);
        $ch = curl_init("https://apicarto.ign.fr/api/codes-postaux/communes/$zipcode");    //API.gouv.fr/codes-postaux
        curl_exec($ch);
        curl_close($ch);

    ?>


// redimensionnement de l'image avec JPEG : 
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            if (empty($_Files['profile']['name']) && $required) {
                throw new exception ('Fichier obligatoire!');
            }
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
    
        } catch (\Throwable $th) {
            $error ['profile'] = $th->getMessage();
        }
    }
?>




<?php
require_once __DIR__ . '/../config/init.php';

class Image
{

//     public static function resize(bool $required = true) {
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
                }

            } catch (\Throwable $th) {
                $error ['profile'] = $th->getMessage();
            }
        }
?>