<main>
    <section class="container-fluid contact py-5">
        <form class="row justify-content-center" method="post" action="">
            <div class="col-md-6">
                <fieldset>
                    <h1>CONTACT</h1>
                    <div class="mb-3">
                        <div class="col-12 mb-3 py-3">
                            <label for="id_user" class="form-label">Identifiant de l'utilisateur si enregistré</label>
                            <select class="form-control" id="id_user" name="id_user">
                                <option>Utilisateur</option>
                                <?php foreach ($users as $user) : ?>
                                    <option value="<?= $user->id_user ?>"><?= $user->username ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="error">
                            <p id="error1" class="d-none"></p><br>
                            <?= $error['username'] ?? '' ?><br>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Nom<strong>*</strong></label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="nom" name="lastname" value="<?= $lastname ?? '' ?>" maxlength='30' autocomplete="lastname" placeholder="Votre nom" required>
                        <div class="error">
                            <p id="error2" class="d-none"></p><br>
                            <?= $error['lastname'] ?? '' ?><br>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="firstname" class="form-label">Prénom<strong>*</strong></label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="prénom" name="firstname" value="<?= $firstname ?? '' ?>" maxlength='30' autocomplete="firstname" placeholder="Votre prénom" required>
                        <div class="error">
                            <p id="error3" class="d-none"></p><br>
                            <?= $error['firstname'] ?? '' ?><br>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="performance" class="form-label">Prestations<strong> *</strong></label>
                        <input class="form-control" list="datalistOptions" id="performance" aria-describedby="prestations" name="performance" placeholder="Quel est votre choix ?" required>
                        <datalist id="datalistOptions">
                            <option value="<?= 'Mariage' ?? '' ?>">Mariage</option>
                            <option value="<?= 'Portrait de famille' ?? '' ?>">Portrait de famille</option>
                            <option value="<?= 'Love Yourself' ?? '' ?>">Love Yourself</option>
                            <option value="<?= 'Animaux' ?? '' ?>">Animaux</option>
                            <hr class="dropdown-divider">
                            <option value="<?= 'Achats de photos' ?? '' ?>">Achats de photos</option>
                        </datalist>
                        <div class="error">
                            <p id="error4" class="d-none"></p><br>
                            <?= $error['performance'] ?? '' ?><br>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message<strong>*</strong></label>
                        <textarea id="message" class="form-control" rows="5" aria-describedby="nom" name="message" value="<?= $message ?? '' ?>" maxlength='300' autocomplete="message" placeholder="Votre message" required></textarea>
                        <div class="error">
                            <p id="error5" class="d-none"></p><br>
                            <?= $error['message'] ?? '' ?><br>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <label class="form-check-label" for="disabledFieldsetCheck">
                                <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" required>
                                En soumettant ce formulaire, j’accepte que mes informations soient utilisées uniquement dans le cadre de ma demande et de la relation commerciale éthique et personnalisée qui peut en découler
                            </label>
                        </div>
                    </div>
                    <div class="row justify-content-center py-5">
                        <button type="submit" class="btn btn-light" id="btnForm">ENVOYER</button>
                    </div>
                </fieldset>
            </div>
        </form>
    </section>
</main>