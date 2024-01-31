<!-- Début du main -->
<main>
    <div class="container-fluid py-5">
        <h1>LIVRE D'OR</h1>

        <!-- commentaires des clients -->
        <div class="row">
            <div class="col comment">Vos commentaires sur mes prestations effectuées ...<br>
            je veux mettre ici mes commentaires validés </div>
        </div>
        <hr>
        <h2>AJOUTER UN COMMENTAIRE</h2>

        <form class="row justify-content-center py-5" id="formulaire" method="post" action="">
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
                    <label for="performance" class="form-label">Quelle prestation avons nous partagé ?<strong> *</strong></label>
                    <input type="text" class="form-control" id="performance" aria-describedby="prestation" name="performance" value="<?= $performance ?? '' ?>" maxlength='50' autocomplete="performance" placeholder="Votre prestation" required>
                    <div class="error">
                        <p id="error2" class="d-none"></p><br>
                        <?= $error['performance'] ?? '' ?><br>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="message" class="form-label">Message<strong>*</strong></label>
                    <textarea id="message" class="form-control" rows="8" aria-describedby="message" name="message" value="<?= $message ?? '' ?>" maxlength='300' autocomplete="message" placeholder="Votre message" required></textarea>
                    <div class="error">
                        <p id="error3" class="d-none"></p><br>
                        <?= $error['message'] ?? '' ?><br>
                    </div>
                </div>
                <div class="row text-center justify-content-center py-3">
                    <button type="submit" id="btnLivre" class="btn btn-light">ENVOYER</button>
                </div>
            </div>
        </form>
    </div>
</main>
<!-- fin du main -->