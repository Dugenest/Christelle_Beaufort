<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/assets/css/styleContact.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Contact</title>
</head>

<body>

    <?php require_once(__DIR__ . '/header.php'); ?>

    <main>
        <section class="container-fluid contact py-5">
            <form class="row justify-content-center">
                <div class="col-md-6">
                    <fieldset>
                        <h1>CONTACT</h1>
                        <div class="mb-3 py-3">
                            <label for="identifiant" class="form-label">Identifiant</label>
                            <input type="text" class="form-control" id="identifiant" aria-describedby="identifiant" placeholder="Votre identifiant si compte créé">
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput1" class="form-label">Nom<strong>*</strong></label>
                            <input type="text" id="disabledTextInput1" class="form-control" placeholder="Votre nom">
                        </div>
                        <div class="mb-3">
                            <label for="disabledTextInput2" class="form-label">Prénom<strong>*</strong></label>
                            <input type="text" id="disabledTextInput2" class="form-control" placeholder="Votre prénom" required>
                        </div>
                        <label for="DataList" class="form-label">Prestations<strong> *</strong></label>
                            <input class="form-control" list="datalistOptions" id="DataList" placeholder="Quel est votre choix ?" required>
                            <datalist id="datalistOptions">
                            <option value="Mariage">
                            <option value="Portrait de famille">
                            <option value="Love Yourself">
                            <option value="Animaux">
                            <hr class="dropdown-divider">
                            <option value="Achats de photos">
                            </datalist>
                        <div class="mb-3 py-2">
                            <label for="disabledTextInput4" class="form-label">Message<strong>*</strong></label>
                            <textarea id="disabledTextInput4" class="form-control" rows="5" placeholder="Votre message" required></textarea>
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

    <?php require_once(__DIR__ . '/footer.php'); ?>