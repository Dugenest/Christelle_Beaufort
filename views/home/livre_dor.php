<!-- Début du main -->
<main>
    <div class="container-fluid">
        <h1 class="title">LIVRE D'OR</h1>

        <!-- commentaires des clients -->
        <div class="row justify-content-center">
            <?php if (empty($comments)) { ?>
                <div class="col comment">Vos commentaires sur mes prestations effectuées ...</div>
            <?php } else { ?>
                <?php foreach ($comments as $comment) { ?>
                    <div class="col-12 comment">
                        <h3><?= $comment->performance ?></h3>
                        <div class="card-body">
                            <h5 class="card-title">Date : <?= $comment->created_at ?></h5>
                            <p class="card-text"><?= $comment->message ?></p>
                        </div>
                        <div class="card-footer text-center">
                            <p value="<?php $user->id_user ?>">De <?= $user->username ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
            <hr>
            <h2>AJOUTER UN COMMENTAIRE</h2>

            <form class="row justify-content-center py-5" id="formulaire" method="post" action="">
                <div class="col-md-6">
                    <!-- Ajoutez un champ select pour l'id_user -->
                    <div class="col-12 mb-3 py-3">
                        <label for="id_user" class="form-label">Identifiant de l'utilisateur<strong>*</strong></label>
                        <select class="form-control" id="id_user" name="id_user" required>
                            <option>Utilisateur</option>
                            <?php foreach ($users as $user) : ?>
                                <option value="<?= $user->id_user ?>"><?= $user->username ?></option>
                            <?php endforeach; ?>
                        </select>
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