
    <main>
        <section class="container-fluid contact py-5">
            <?php if ($_SERVER['REQUEST_METHOD'] != 'POST' || !empty($error)) { ?>
                <form class="row justify-content-center" method="post">
                    <div class="col-md-6">
                        <fieldset>
                            <h1>CONTACT</h1>
                            <div class="mb-3">
                                <label for="identifiant" class="form-label">Identifiant</label>
                                <input type="text" class="form-control" id="userName" aria-describedby="identifiant" name="userName" value="<?=$userName??''?>" maxlength='30' autocomplete="userName" placeholder="Votre identifiant si inscription" required>
                                <div class="error">
                                    <p id="error1" class="d-none"></p><br>
                                    <?= $error['userName'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Nom<strong>*</strong></label>
                                <input type="text" class="form-control" id="lastName" aria-describedby="nom" name="lastName" value="<?=$lastName??''?>" maxlength='30' autocomplete="lastName" placeholder="Votre nom" required>
                                <div class="error">
                                    <p id="error2" class="d-none"></p><br>
                                    <?= $error['lastName'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">Prénom<strong>*</strong></label>
                                <input type="text" class="form-control" id="firstName" aria-describedby="prénom" name="firstName" value="<?=$firstName??''?>" maxlength='30' autocomplete="firstName" placeholder="Votre prénom" required>
                                <div class="error">
                                    <p id="error3" class="d-none"></p><br>
                                    <?= $error['firstName'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Performance" class="form-label">Prestations<strong> *</strong></label>
                                <input class="form-control" list="datalistOptions" id="Performance" aria-describedby="prestations" name="Performance" placeholder="Quel est votre choix ?" required>
                                <datalist id="datalistOptions">
                                    <option value="<?='Mariage'??''?>">Mariage</option>
                                    <option value="<?='Portrait de famille'??''?>">Portrait de famille</option>
                                    <option value="<?='Love Yourself'??''?>">Love Yourself</option>
                                    <option value="<?='Animaux'??''?>">Animaux</option>
                                    <hr class="dropdown-divider">
                                    <option value="<?='Achats de photos'??''?>">Achats de photos</option>   
                                </datalist>
                                <div class="error">
                                    <p id="error4" class="d-none"></p><br>
                                    <?= $error['Performance'] ?? ''?><br>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="Message" class="form-label">Message<strong>*</strong></label>
                                <textarea id="Message" class="form-control" rows="5" aria-describedby="nom" name="Message" value="<?=$Message??''?>" maxlength='300' autocomplete="Message" placeholder="Votre message" required></textarea>
                                <div class="error">
                                    <p id="error5" class="d-none"></p><br>
                                    <?= $error['Message'] ?? ''?><br>
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
                <?php } else { ?>
                    <div class="Data"><br><br>
                        <h2>Récapitulatif des données du formulaire</h2>
                            <p>Identifiant : <?=$userName?></p>
                            <p>Nom : <?=$lastName?></p>
                            <p>Prénom : <?=$firstName?></p>
                            <p>Prestation : <?=$Performance?></p> 
                            <p>Message : <?=$Message?></p> 
                    </div>
                <?php } ?>
        </section>
    </main>