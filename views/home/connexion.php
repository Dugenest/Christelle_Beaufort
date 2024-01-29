
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