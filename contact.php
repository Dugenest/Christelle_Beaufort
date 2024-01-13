<?php

//création d'une constante pour une régex du nom
define('NAME', '^[a-zA-Z]{2,30}$');

//Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Création d'un tableau d'erreurs
        $error = [];

    //Récupération et nettoyage de la récupération de la donnée "userName"
        $userName = filter_input(INPUT_POST, 'userName', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($userName)) {
            $error['userName'] = 'L\'identifiant est obligatoire';
        } else {
    //Validation de la donnée "userName" grâce à la regex
        $isOk = filter_var($userName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[a-zA-Z0-9]{2,30}$/')));
        if ($isOk == false){
            $error['userName'] = 'L\'identifiant n\'est pas valide !';
        }
    }   

    //Récupération et nettoyage de la récupération de la donnée "lastName"
        $lastName = filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($lastName)) {
            $error['lastName'] = 'Le Nom est obligatoire';
        } else {
    //Validation de la donnée "lastName" grâce à la regex
        $isOk = filter_var($lastName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.NAME.'/')));
        if ($isOk == false){
            $error['lastName'] = 'Le Nom n\'est pas valide !';
        }
    }

    //Récupération et nettoyage de la récupération de la donnée "firstName"
        $firstName = filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($firstName)) {
            $error['firstName'] = 'Le Prénom est obligatoire';
        } else {
    //Validation de la donnée "firstName" grâce à la regex
        $isOk = filter_var($firstName, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/'.NAME.'/')));
        if ($isOk == false){
            $error['firstName'] = 'Le Prénom n\'est pas valide !';
        }
    }

    //Récupération, nettoyage et validation de la donnée "Performance"
        $Performance = filter_input(INPUT_POST, 'Performance', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($Performance)) {
            $error['Performance'] = 'La prestation est obligatoire';
        } else {
    //Validation de la donnée "Performance" grâce à la regex
        $isOk = filter_var($Performance, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,50}$/')));
        if ($isOk == false){
            $error['Performance'] = 'La prestation décrite n\'est pas valide !';
        }
    }

    //Récupération, nettoyage et validation de la donnée "Message"
        $Message = filter_input(INPUT_POST, 'Message', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($Message)) {
            $error['Message'] = 'Le message est obligatoire';
        } else {
    //Validation de la donnée "Message" grâce à la regex
        $isOk = filter_var($Message, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^[A-Za-z0-9À-ÖØ-öø-ÿéè\s\.,;\'\"!?()\[\]{}\-:]{5,300}$/')));
        if ($isOk == false){
            $error['Message'] = 'Le message décrit n\'est pas valide !';
        }
    }
}

?>

    <?php require_once(__DIR__ . '/head.php'); ?>

    <link rel="stylesheet" href="./public/assets/css/styleContact.css">
    <title>Contact</title>
</head>

<body>

    <?php require_once(__DIR__ . '/header.php'); ?>

    <main>
        <section class="container-fluid contact py-5">
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form class="row justify-content-center" method="post">
                    <div class="col-md-6">
                        <fieldset>
                            <h1>CONTACT</h1>
                            <div class="mb-3">
                                <label for="identifiant" class="form-label">Identifiant</label>
                                <input type="text" class="form-control" id="userName" aria-describedby="identifiant" name="userName" value="<?=$userName??''?>" maxlength='30' autocomplete="userName" placeholder="Votre identifiant si inscription" required>
                                <div class="error">
                                    <p id="error1" class="d-none"></p><br>
                                    <?= $error['userName'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Nom<strong>*</strong></label>
                                <input type="text" class="form-control" id="lastName" aria-describedby="nom" name="lastName" value="<?=$lastName??''?>" maxlength='30' autocomplete="lastName" placeholder="Votre nom" required>
                                <div class="error">
                                    <p id="error2" class="d-none"></p><br>
                                    <?= $error['lastName'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Prénom<strong>*</strong></label>
                                <input type="text" class="form-control" id="firstName" aria-describedby="prénom" name="firstName" value="<?=$firstName??''?>" maxlength='30' autocomplete="firstName" placeholder="Votre prénom" required>
                                <div class="error">
                                    <p id="error3" class="d-none"></p><br>
                                    <?= $error['firstName'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Performance" class="form-label">Prestations<strong> *</strong></label>
                                <input class="form-control" list="datalistOptions" id="Performance" aria-describedby="prestations" name="Performance" placeholder="Quel est votre choix ?" required>
                                <datalist id="datalistOptions">
                                    <option value="<?='Mariage'??''?>">Mariage</option>
                                    <option value="<?='Portrait de famille'??''?>">Portrait de famille</option>
                                    <option value="<?='Love Yourself'??''?>">Love Yourself</option>
                                    <option value="<?='Animaux'??''?>">Animaux</option>
                                    <hr class="dropdown-divider">
                                    <option value="<?='Achats de photos'??''?>">Achats de photos</option>   
                                </datalist>
                                <div class="error">
                                    <p id="error4" class="d-none"></p><br>
                                    <?= $error['Performance'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Message" class="form-label">Message<strong>*</strong></label>
                                <textarea id="Message" class="form-control" rows="5" aria-describedby="nom" name="Message" value="<?=$Message??''?>" maxlength='300' autocomplete="Message" placeholder="Votre message" required></textarea>
                                <div class="error">
                                    <p id="error5" class="d-none"></p><br>
                                    <?= $error['Message'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <label class="form-check-label" for="disabledFieldsetCheck">
                                    <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" required>
                                        En soumettant ce formulaire, j’accepte que mes informations soient utilisées uniquement dans le cadre de ma demande et de la relation commerciale éthique et personnalisée qui peut en découler
                                    </label>
                                </div>
                            </div>
                            <div class="row justify-content-center py-5">
                                <button type="submit" class="btn btn-light" id="btnForm">ENVOYER</button>
                            </div>
                        </fieldset>
                    </div>
                </form>
                <?php } else { ?>
                    <div class="Data"><br><br>
                        <h2>Récapitulatif des données du formulaire</h2>
                            <p>Identifiant : <?=$userName?></p>
                            <p>Nom : <?=$lastName?></p>
                            <p>Prénom : <?=$firstName?></p>
                            <p>Prestation : <?=$Performance?></p> 
                            <p>Message : <?=$Message?></p> 
                    </div>
                <?php } ?>
        </section>
    </main>

    <script src="./public/assets/js/scriptContact.js"></script>
    <?php require_once(__DIR__ . '/footer.php'); ?>