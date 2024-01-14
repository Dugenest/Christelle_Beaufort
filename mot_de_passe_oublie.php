<?php
//Condition principale pour tous les input (es ce que la méthode de récupération est bien 'POST'?)
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Récupération, nettoyage et validation de la donnée "Email"
        $Email = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_EMAIL);
        if (empty($Email)) {
            $errorEmail = 'L\'Email est obligatoire';
        } else {
            $isOk = filter_var($Email, FILTER_VALIDATE_EMAIL);
            if ($isOk == false){
                $errorEmail = 'l\'Email n\'est pas valide !';
            }
        }
    }

?>

    
    <?php require_once(__DIR__ . '/views/templates/Home/head.php'); ?>

    <link rel="stylesheet" href="./public/assets/css/styleMdpo.css">
    <title>Mot de passe oublié</title>
</head>

<body>

    <?php require_once(__DIR__ . '/views/templates/Home/header.php'); ?>

<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
        <h1>MOT DE PASSE OUBLIE</h1>
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($errorEmail)) { ?>
                <form class="row justify-content-center" id="formulaire" method="post">
                    <div class="col-md-6 mb-3 py-5">
                        <label for="Email" class="form-label">Email<strong>*</strong></label>
                        <input type="email" class="form-control" id="Email" aria-describedby="email" name="Email" value="<?=$Email??''?>" autocomplete="Email" placeholder="Votre email" required>
                        <div class="error">
                            <p id="error1" class="d-none"></p><br>
                            <?= $errorEmail ?? ''?><br>
                        </div>
                    </div>
                    <div class="col-12 text-end py-2">
                        <a href="./connexion.php" alt="Connexion" id="retourConnexion">Retour à la page de connexion</a>
                    </div>
                    <div class="col-12 text-center justify-content-center">
                        <button type="submit" id="btnReinitialise" class="btn btn-light justify-content-center">Envoyer un lien pour réinitialiser mon mot de passe</button>
                    </div>
                </form>
                <?php } else { ?>
                    <div class="Data"><br><br>
                        <h2>Récapitulatif des données du formulaire</h2>
                            <p>Email : <?=$Email?></p> 
                    </div>
                <?php } ?>
        </div>
    </main>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-12 text-start">
                <p>Politique de confidentialité des données personnelles</p>
            </div>
        </div>
    </footer>

    <script src="./public/assets/js/scriptMdpo.js"></script>
    <?php require_once(__DIR__ . '/views/templates/Home/footer.php'); ?>