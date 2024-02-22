<!-- Début du main -->
<main>
    <section class="container-fluid contact py-3">
        <div class="card mx-auto m-5">
            <form method="post" action="">
                <div class="row styleCard m-3 py-3">
                    <h1>CONNEXION</h1>
                    <div class="col-12 col-md-6 mb-3"> 
                        <label for="username" class="form-label">Identifiant<strong> *</strong></label>
                        <input type="text" class="form-control" id="username" aria-describedby="identifiant" name="username" value="<?= $username ?? '' ?>" maxlength='30' autocomplete="username" placeholder="Votre identifiant" required>
                        <div class="error">
                            <p id="error1" class="d-none"></p><br>
                            <?= $error['username'] ?? '' ?><br>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 mb-3"> 
                        <label for="password" class="form-label">Mot de passe<strong> *</strong></label>
                        <input type="password" class="form-control" id="password" aria-describedby="password" name="password" value="<?= $password ?? '' ?>" placeholder="Votre mot de passe" required>
                        <div class="error">
                            <p id="error2" class="d-none"></p><br>
                            <?= $error['password'] ?? '' ?><br>
                        </div>
                    </div>

                    <div class="text-end py-3">
                        <a href="/controllers/home/mot_de_passe_oublie-ctrl.php" alt="Mot de passse oublié" id="MDPO">Mot de passe oublié ?</a>
                    </div>
                    <div class="text-center py-3">
                        <button type="submit" id="btnConnexion" class="btn btn-light">S'identifier</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</main>
<!-- Fin du main -->
