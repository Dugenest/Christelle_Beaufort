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

    <?php require_once(__DIR__ . '/views/templates/Home/head.php'); ?>

    <link rel="stylesheet" href="./public/assets/css/styleLivredor.css">
    <title>Livre d'or</title>
</head>

<body >

    <?php require_once(__DIR__ . '/views/templates/Home/header.php'); ?>

<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
            <h1>LIVRE D'OR</h1>

            <!-- commentaires des clients -->
            <div class="row">
                <div class="col comment">Vos commentaires sur mes prestations effectuées ...</div>
            </div>
            <hr>
            <h2>AJOUTER UN COMMENTAIRE</h2>
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form class="row justify-content-center py-5" id="formulaire" method="post">
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
                            <label for="Performance" class="form-label">Quelle prestation avons nous partagé ?<strong> *</strong></label>
                            <input type="text" class="form-control" id="Performance" aria-describedby="prestation" name="Performance" value="<?=$Performance??''?>" maxlength='50' autocomplete="Performance" placeholder="Votre prestation" required>
                                <div class="error">
                                    <p id="error2" class="d-none"></p><br>
                                    <?= $error['Performance'] ?? ''?><br>
                                </div>
                            </div>
                        <div class="col-12 mb-3">
                            <label for="Message" class="form-label">Message<strong>*</strong></label>
                            <textarea id="Message" class="form-control" rows="8" aria-describedby="message" name="Message" value="<?=$Message??''?>" maxlength='300' autocomplete="Message" placeholder="Votre message" required></textarea>
                                <div class="error">
                                    <p id="error3" class="d-none"></p><br>
                                    <?= $error['Message'] ?? ''?><br>
                                </div>
                            </div>
                        <div class="row text-center justify-content-center py-3">
                            <button type="submit" id="btnLivre" class="btn btn-light">ENVOYER</button>
                        </div>
                    </div>
                </form>
                <?php } else { ?>
                    <div class="Data"><br><br>
                        <h2>Récapitulatif des données du formulaire</h2>
                            <p>Identifiant : <?=$userName?></p>
                            <p>Prestation : <?=$Performance?></p> 
                            <p>Message : <?=$Message?></p> 
                    </div>
                <?php } ?>
        </div>

    </main>
    <!-- fin du main -->
            
    <script src="./public/assets/js/scriptLivreDor.js"></script>
    <?php require_once(__DIR__ . '/views/templates/Home/footer.php'); ?>