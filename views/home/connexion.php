<!-- Début du main -->
<main>
    <div class="container-fluid py-5">
        <h1>CONNEXION</h1>
        <form class="row justify-content-center" id="formulaire" method="post">
            <div class="col-md-6">
                <div class="col-12 mb-3 py-3">
                    <label for="username" class="form-label">Identifiant<strong>*</strong></label>
                    <input type="text" class="form-control" id="username" aria-describedby="identifiant" name="username" value="<?= $username ?? '' ?>" maxlength='30' autocomplete="username" placeholder="Votre identifiant" required>
                    <div class="error">
                        <p id="error1" class="d-none"></p><br>
                        <?= $error['username'] ?? '' ?><br>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="password" class="form-label">Mot de passe<strong>*</strong></label>
                    <input type="password" class="form-control" id="password" aria-describedby="password" name="password" value="<?= $password ?? '' ?>" placeholder="Votre mot de passe" required>
                    <div class="error">
                        <p id="error2" class="d-none"></p><br>
                        <?= $error['password'] ?? '' ?><br>
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
    </div>
</main>
<!-- fin du main -->