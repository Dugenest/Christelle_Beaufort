<!-- Début du main -->
<main>
    <div class="container-fluid py-5">
        <h1>MOT DE PASSE OUBLIE</h1>
            <form class="row justify-content-center" id="formulaire" method="post">
                <div class="col-md-6 mb-3 py-5">
                    <label for="email" class="form-label">Email <strong>*</strong></label>
                    <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="<?= $email ?? '' ?>" autocomplete="email" placeholder="Votre email" required>
                    <div class="error">
                        <p id="error1" class="d-none"></p><br>
                        <?= $error['email'] ?? '' ?><br>
                    </div>
                </div>
                <div class="col-12 text-end py-2">
                    <a href="/controllers/home/connexion-ctrl.php" alt="Connexion" id="retourConnexion">Retour à la page de connexion</a>
                </div>
                <div class="row text-center justify-content-center py-3">
                    <button type="submit" id="btnReturnConnexion" class="btn btn-light">Envoyer un lien</button>
                </div>
            </form>
    </div>
</main>
<!-- Fin du main -->