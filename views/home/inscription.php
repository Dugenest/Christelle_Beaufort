
<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
            <h1>INSCRIPTION</h1>
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form class="row d-flex justify-content-center" id="formulaire" method="post">
                    <div class="col-md-6">
                        <div class="col-12 mb-3">
                            <label for="lastName" class="form-label">Nom<strong>*</strong></label>
                            <input type="text" class="form-control" id="lastName" aria-describedby="nom" name="lastName" value="<?=$lastName??''?>" maxlength='30' autocomplete="lastName" placeholder="Votre nom" required>
                            <div class="error">
                                <p id="error1" class="d-none"></p><br>
                                <!-- coalescente du message d'erreur de lastName -->
                                <?= $error['lastName'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="firstName" class="form-label">Prénom<strong>*</strong></label>
                            <input type="text" class="form-control" id="firstName" aria-describedby="prénom" name="firstName" value="<?=$firstName??''?>" maxlength='30' autocomplete="firstName" placeholder="Votre prénom" required>
                            <div class="error">
                                <p id="error2" class="d-none"></p><br>
                                <?= $error['firstName'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Email" class="form-label">Email<strong>*</strong></label>
                            <input type="email" class="form-control" id="Email" aria-describedby="email" name="Email" value="<?=$Email??''?>" autocomplete="Email" placeholder="Votre email" required>
                            <div class="error">
                                <p id="error3" class="d-none"></p><br>
                                <?= $error['Email'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Phone" class="form-label">Téléphone</label>
                            <input type="tel" class="form-control" id="Phone" aria-describedby="téléphone" name="Phone" value="<?=$Phone??''?>" autocomplete="Phone" placeholder="Votre numéro de téléphone">
                            <div class="error">
                                <p id="error4" class="d-none"></p><br>
                                <?= $error['Phone'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Adress" class="form-label">Adresse</label>
                            <textarea id="Adress" class="form-control" rows="3" name="Adress" value="<?=$Adress??''?>" autocomplete="Adress" placeholder="Votre adresse"></textarea>
                            <div class="error">
                                <p id="error5" class="d-none"></p><br>
                                <?= $error['Adress'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="userName" class="form-label">Identifiant<strong>*</strong></label>
                            <input type="text" class="form-control" id="userName" aria-describedby="identifiant" name="userName" value="<?=$userName??''?>" maxlength='30' autocomplete="userName" placeholder="Votre identifiant" required>
                            <div class="error">
                                <p id="error6" class="d-none"></p><br>
                                <?= $error['userName'] ?? ''?><br>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Password1" class="form-label">Mot de passe<strong>*</strong></label>
                            <input type="password" class="form-control" id="Password1" aria-describedby="password" name="Password1" value="<?=$Password1??''?>" placeholder="Votre mot de passe" required>
                            <div class="error">
                                <p id="error7" class="d-none"></p><br>
                                <?= $error['Password1'] ?? ''?><br>
                            </div>                   
                        </div>
                        <div class="col-12 mb-3">
                            <label for="Password2" class="form-label">Confirmation mot de passe<strong>*</strong></label>
                            <input type="password" class="form-control" id="Password2" aria-describedby="password" name="Password2" value="<?=$Password2??''?>" placeholder="Confirmer votre mot de passe" required>
                            <div class="error">
                                <p id="error8" class="d-none"></p><br>
                                <p id="error9" class="d-none"></p><br>
                                <?= $error['Password2'] ?? ''?><br>
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
                <?php } else { ?>
                    <div class="Data"><br><br>
                        <h2>Récapitulatif des données du formulaire</h2>
                            <p>Nom : <?=$lastName?></p>
                            <p>Prénom : <?=$firstName?></p> 
                            <p>Email : <?=$Email?></p> 
                            <p>Téléphone : <?=$Phone?></p> 
                            <p>Adresse : <?=$Adress?></p> 
                            <p>Identifiant : <?=$userName?></p>
                    </div>
                <?php } ?>
        </div>
    </main>
<!-- fin du main -->
