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
                                <p>De : <?= $comment->lastname ?> <?= $comment->firstname ?></p>
                            </div>
                        </div><br>
                <?php }
                }
            } else { ?>
                <div class="col comment">Aucun commentaire.</div>
            <?php } ?>
        </div>

        <div class="card m-5">
            <form id="formulaire" method="post" action="">
                <div class="row styleCard justify-content-center m-3 py-3">
                    <h2>AJOUTER UN COMMENTAIRE</h2>
                    <!-- <div class="col-12 mb-3 py-3">
                    <label for="username" class="form-label">Identifiant de l'utilisateur<strong> *</strong></label>
                    <input type="text" class="form-control" id="username" aria-describedby="username" name="username" value="<?= $username ?? '' ?>" maxlength='30' placeholder="Votre identifiant" required>
                </div>
                <div class="error">
                    <?php if (!empty($username) && $username != NULL) {
                        if ($isexistUsername) { ?>
                            <p class="error-message text-success"><?= $success['messageSuccess'] ?? '' ?></p><br>
                            <?php } else { ?>
                                <p class="error-message text-danger"><?= $error['messageError'] ?? '' ?></p><br>
                                <?php } ?>
                                <?php } ?>
                                <p id="error1" class="d-none">
                                    <?= $error['username'] ?? '' ?>
                                </p><br>
                            </div> -->

                    <div class="text-center">
                        <p class="error-message text-success"><?= $success['messageSuccess'] ?? '' ?></p>
                        <p class="error-message text-danger"><?= $error['messageError'] ?? '' ?></p>
                    </div>

                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="lastname" class="form-label">Nom<strong> *</strong></label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="nom" name="lastname" value="<?= $lastname ?? '' ?>" maxlength='30' autocomplete="lastname" placeholder="Votre nom" required>
                        <div class="error">
                            <p id="error1" class="d-none"></p><br>
                            <?= $error['lastname'] ?? '' ?><br>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="firstname" class="form-label">Prénom<strong> *</strong></label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="prénom" name="firstname" value="<?= $firstname ?? '' ?>" maxlength='30' autocomplete="firstname" placeholder="Votre prénom" required>
                        <div class="error">
                            <p id="error2" class="d-none"></p><br>
                            <?= $error['firstname'] ?? '' ?><br>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="performance" class="form-label">Quelle prestation avons-nous partagée ?<strong> *</strong></label>
                        <input type="text" class="form-control" id="performance" aria-describedby="prestation" name="performance" value="<?= $performance ?? '' ?>" maxlength='50' placeholder="Votre prestation" required>
                        <div class="error">
                            <p id="error3" class="d-none"></p>
                            <?= $error['performance'] ?? '' ?><br>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 mb-3">
                        <label for="message" class="form-label">Message<strong> *</strong></label>
                        <textarea id="message" class="form-control" rows="5" aria-describedby="message" name="message" maxlength='300' placeholder="Votre message" required><?= $message ?? '' ?></textarea>
                        <div class="error">
                            <p id="error4" class="d-none"></p>
                            <?= $error['Message'] ?? '' ?><br>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="form-check text-center">
                            <label class="form-check-label" for="disabledFieldsetCheck">
                                <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" required>
                                En soumettant ce formulaire, j’accepte que mes informations soient utilisées uniquement dans le cadre de ma demande et de la relation commerciale éthique et personnalisée qui peut en découler
                            </label>
                        </div>
                    </div>
                    <div class="row text-center justify-content-center py-3">
                        <button type="submit" id="btnLivre" class="btn btn-light">ENVOYER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
<!-- Fin du main -->