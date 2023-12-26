<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/assets/css/styleConnexion.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Connexion</title>
</head>
<body >

    <?php require_once(__DIR__ . '/header.php'); ?>

<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
            <h1>CONNEXION</h1>
            <form class="row justify-content-center" id="formulaire">
                <div class="col-md-6">
                    <div class="col-12 mb-3 py-5">
                        <label for="identifiant" class="form-label">Identifiant<strong>*</strong></label>
                        <input type="text" class="form-control" id="identifiant" aria-describedby="identifiant" placeholder="Votre identifiant">
                    </div>
                    <div class="col-12 mb-3 py-3">
                        <label for="Password" class="form-label">Mot de passe<strong>*</strong></label>
                        <input type="password" class="form-control" id="Password" aria-describedby="password" placeholder="Votre mot de passe">
                    </div>
                    <div class="row text-end py-3">
                        <a href="./mot_de_passe_oublie.php" alt="Mot de passse oublié" id="MDPO">Mot de passe oublié ?</a>
                    </div>
                    <div class="row text-center justify-content-center py-3">
                        <button type="submit" id="btnConnexion" class="btn btn-light">S'identifier</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
<!-- fin du main -->

    <?php require_once(__DIR__ . '/footer.php'); ?>