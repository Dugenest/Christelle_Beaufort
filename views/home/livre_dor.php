<!-- Début du main -->
<main>
    <div class="container-fluid">
        <h1 class="title">LIVRE D'OR</h1>

        <!-- Commentaires des clients -->
        <div class="row justify-content-center py-4">
            <?php if (!empty($comments)) {
                foreach ($comments as $comment) {
                    if ($comment->validated_at !== NULL) { ?>
                        <div class="col-12 comment">
                            <div class="card-body">
                                <p class="card-title">Date : <?= $comment->created_at ?></p>
                                <p class="card-text"><?= $comment->message ?></p>
                            </div>
                            <div class="card-footer text-center">
                                <p>De <?= $comment->username ?></p>
                            </div>
                        </div><br>
                <?php }
                }
            } else { ?>
                <div class="col comment">Aucun commentaire.</div>
            <?php } ?>
        </div>

        <h2>AJOUTER UN COMMENTAIRE</h2>
        <form class="row justify-content-center py-5" id="formulaire" method="post" action="">
            <div class="col-md-6">
                <div class="col-12 mb-3 py-3">
                    <label for="username" class="form-label">Identifiant de l'utilisateur<strong> *</strong></label>
                    <input type="text" class="form-control" id="username" aria-describedby="username" name="username" value="<?= $username ?? '' ?>" maxlength='30' autocomplete="username" placeholder="Votre identifiant" required>
                </div>
                <?php if ($isexistUsername) { ?>
                    <p class="error-message text-success"><?= $errorMessage ?></p><br>
                <?php } else { ?>
                    <p class="error-message text-danger"><?= $errorMessage ?></p><br>
                <?php } ?>
                <div class="col-12 mb-3">
                    <label for="performance" class="form-label">Quelle prestation avons-nous partagée ?<strong> *</strong></label>
                    <input type="text" class="form-control" id="performance" aria-describedby="prestation" name="performance" value="<?= $performance ?? '' ?>" maxlength='50' autocomplete="performance" placeholder="Votre prestation" required>
                    <div class="error">
                        <p id="error2" class="d-none"></p>
                        <?= $error['performance'] ?? '' ?><br>
                    </div>
                </div>
                <div class="col-12 mb-3">
                    <label for="message" class="form-label">Message<strong> *</strong></label>
                    <textarea id="message" class="form-control" rows="8" aria-describedby="message" name="message" maxlength='300' autocomplete="message" placeholder="Votre message" required><?= $message ?? '' ?></textarea>
                    <div class="error">
                        <p id="error3" class="d-none"></p>
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
<!-- Fin du main -->