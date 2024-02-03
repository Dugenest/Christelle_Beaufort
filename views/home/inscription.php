
<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
            <h1>INSCRIPTION</h1>
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form class="row d-flex justify-content-center" id="formulaire" method="post">
                    <div class="col-md-6">
                        <div class="col-12 mb-3">
                            <label for="lastname" class="form-label">Nom<strong>*</strong></label>
                            <input type="text" class="form-control" id="lastname" aria-describedby="nom" name="lastname" value="<?=$lastname??''?>" maxlength='30' autocomplete="lastname" placeholder="Votre nom" required>
                            <div class="error">
                                <p id="error1" class="d-none"></p><br>
                                <!-- coalescente du message d'erreur de lastname -->
                                <?= $error['lastname'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="firstname" class="form-label">Prénom<strong>*</strong></label>
                            <input type="text" class="form-control" id="firstname" aria-describedby="prénom" name="firstname" value="<?=$firstname??''?>" maxlength='30' autocomplete="firstname" placeholder="Votre prénom" required>
                            <div class="error">
                                <p id="error2" class="d-none"></p><br>
                                <?= $error['firstname'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="email" class="form-label">Email<strong>*</strong></label>
                            <input type="email" class="form-control" id="email" aria-describedby="email" name="email" value="<?=$email??''?>" autocomplete="email" placeholder="Votre email" required>
                            <div class="error">
                                <p id="error3" class="d-none"></p><br>
                                <?= $error['email'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="phone" aria-describedby="téléphone" name="phone" value="<?=$phone??''?>" autocomplete="phone" placeholder="Votre numéro de téléphone">
                            <div class="error">
                                <p id="error4" class="d-none"></p><br>
                                <?= $error['phone'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="adress" class="form-label">Adresse</label>
                            <textarea id="adress" class="form-control" rows="3" name="adress" value="<?=$adress??''?>" autocomplete="adress" placeholder="Votre adresse"></textarea>
                            <div class="error">
                                <p id="error5" class="d-none"></p><br>
                                <?= $error['adress'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="username" class="form-label">Identifiant<strong>*</strong></label>
                            <input type="text" class="form-control" id="username" aria-describedby="identifiant" name="username" value="<?=$username??''?>" maxlength='30' autocomplete="username" placeholder="Votre identifiant" required>
                            <div class="error">
                                <p id="error6" class="d-none"></p><br>
                                <?= $error['username'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password" class="form-label">Mot de passe<strong>*</strong></label>
                            <input type="password" class="form-control" id="password" aria-describedby="password" name="password" value="<?=$password??''?>" placeholder="Votre mot de passe" required>
                            <div class="error">
                                <p id="error7" class="d-none"></p><br>
                                <?= $error['password'] ?? ''?><br>
                            </div>                   
                        </div>
                        <div class="col-12 mb-3">
                            <label for="password1" class="form-label">Confirmation mot de passe<strong>*</strong></label>
                            <input type="password" class="form-control" id="password1" aria-describedby="password" name="password1" value="<?=$password1??''?>" placeholder="Confirmer votre mot de passe" required>
                            <div class="error">
                                <p id="error8" class="d-none"></p><br>
                                <p id="error9" class="d-none"></p><br>
                                <?= $error['password1'] ?? ''?><br>
                            </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <label class="form-check-label" for="disabledFieldsetCheck">
                                <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" required>
                                    J’accepte les conditions générales du site et J’accepte que mes information soient 
                                    utilisées uniquement dans le cadre de ma demande et de la relation commerciale 
                                    éthique et personnalisée qui peut en découler
                                </label>
                            </div>
                        </div>
                        <div class="row text-center justify-content-center py-3">
                            <button type="submit" id="btnInscription" class="btn btn-light">S'inscrire</button>
                        </div>
                    </div>
                </form>
                <?php } ?>
        </div>
    </main>
<!-- fin du main -->
