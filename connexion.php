<?php

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

    //Récupération, nettoyage et validation de la donnée "Mot de passe"
        $Password1 = filter_input(INPUT_POST, 'Password1', FILTER_SANITIZE_SPECIAL_CHARS);
        if (empty($Password1)) {
            $error['Password1'] = 'Le Mot de Passe est obligatoire';
        } else {
    //Validation de la donnée "Password1" grâce à la regex
            $isOk = filter_var($Password1, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>'/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/')));
            if ($isOk == false){
                $error['Password1'] = 'Le Mot de Passe n\'est pas valide !';
            }
        }
}

?>

    <?php require_once(__DIR__ . '/head.php'); ?>

    <link rel="stylesheet" href="./public/assets/css/styleConnexion.css">
    <title>Connexion</title>
</head>

<body >

    <?php require_once(__DIR__ . '/header.php'); ?>

<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
            <h1>CONNEXION</h1>
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form class="row justify-content-center" id="formulaire" method="post">
                    <div class="col-md-6">
                        <div class="col-12 mb-3 py-3">
                            <label for="userName" class="form-label">Identifiant<strong>*</strong></label>
                            <input type="text" class="form-control" id="userName" aria-describedby="identifiant" name="userName" value="<?=$userName??''?>" maxlength='30' autocomplete="userName" placeholder="Votre identifiant" required>
                            <div class="error">
                                <p id="error1" class="d-none"></p><br>
                                <?= $error['userName'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Password1" class="form-label">Mot de passe<strong>*</strong></label>
                            <input type="password" class="form-control" id="Password1" aria-describedby="password" name="Password1" value="<?=$Password1??''?>" placeholder="Votre mot de passe" required>
                            <div class="error">
                                <p id="error2" class="d-none"></p><br>
                                <?= $error['Password1'] ?? ''?><br>
                            </div>                   
                        </div>
                        <div class="row text-end py-3">
                            <a href="./mot_de_passe_oublie.php" alt="Mot de passse oublié" id="MDPO">Mot de passe oublié ?</a>
                        </div>
                        <div class="row text-center justify-content-center py-3">
                            <button type="submit" id="btnConnexion" class="btn btn-light">S'identifier</button>
                        </div>
                    </div>
                </form>
                <?php } else { ?>
                    <div class="Data"><br><br>
                        <h2>Récapitulatif des données du formulaire</h2>
                            <p>Identifiant : <?=$userName?></p>
                    </div>
                <?php } ?>
        </div>
    </main>
<!-- fin du main -->

    <script src="./public/assets/js/scriptConnexion.js"></script>
    <?php require_once(__DIR__ . '/footer.php'); ?>