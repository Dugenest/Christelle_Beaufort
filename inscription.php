<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/assets/css/styleInscription.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inscription</title>
</head>
<body>

    <?php require_once(__DIR__ . '/header.php'); ?>

<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
            <h1>INSCRIPTION</h1>
            <form class="row d-flex justify-content-center" id="formulaire">
                <div class="col-md-6">
                    <div class="col-12  mb-3 py-3">
                        <label for="lastname" class="form-label">Nom<strong>*</strong></label>
                        <input type="text" class="form-control" id="lastname" aria-describedby="nom" placeholder="Votre nom" required>
                    </div>
                    <div class="col-12  mb-3 py-3">
                        <label for="firstname" class="form-label">Prénom<strong>*</strong></label>
                        <input type="text" class="form-control" id="firstname" aria-describedby="prenom" placeholder="Votre prénom" required>
                    </div>
                    <div class="col-12  mb-3 py-3">
                        <label for="email" class="form-label">Email<strong>*</strong></label>
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Votre email" required>
                    </div>
                    <div class="col-12  mb-3 py-3">
                        <label for="phone" class="form-label">Téléphone</label>
                        <input type="tel" class="form-control" id="phone" aria-describedby="telephone" placeholder="Votre numéro de téléphone">
                    </div>
                    <div class="col-12  mb-3 py-3">
                        <label for="adress" class="form-label">Adresse</label>
                        <textarea id="adress" class="form-control" rows="3" placeholder="Votre adresse"></textarea>
                    </div>
                    <div class="col-12  mb-3 py-3">
                        <label for="identifiant" class="form-label">Identifiant<strong>*</strong></label>
                        <input type="text" class="form-control" id="identifiant" aria-describedby="identifiant" placeholder="Votre identifiant" required>
                    </div>
                    <div class="col-12  mb-3 py-3">
                        <label for="Password" class="form-label">Mot de passe<strong>*</strong></label>
                        <input type="password" class="form-control" id="Password" aria-describedby="password" placeholder="Votre mot de passe" required>
                    </div>
                    <div class="col-12  mb-3 py-3">
                        <label for="Password2" class="form-label">Confirmation mot de passe<strong>*</strong></label>
                        <input type="password2" class="form-control" id="Password2" aria-describedby="password" placeholder="Confirmer votre mot de passe" required>
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
        </div>
    </main>
<!-- fin du main -->

    <?php require_once(__DIR__ . '/footer.php'); ?>