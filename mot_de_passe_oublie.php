<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/assets/css/styleMotdepasseoublie.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Mot de passe oublié</title>
</head>
<body>

    <?php require_once(__DIR__ . '/header.php'); ?>

<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
        <h1>MOT DE PASSE OUBLIE</h1>
            <form class="row justify-content-center" id="formulaire">
                <div class="col-md-6 mb-3 py-5">
                    <label for="email" class="form-label">Email<strong>*</strong></label>
                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Votre email" required>
                </div>
                <div class="col-12 text-end py-2">
                    <a href="./connexion.php" alt="Connexion" id="retourConnexion">Retour à la page de connexion</a>
                </div>
                <div class="col-12 text-center justify-content-center py-3">
                    <button type="submit" id="btnReinitialise" class="btn btn-light justify-content-center">Envoyer un lien pour réinitialiser mon mot de passe</button>
                </div>
            </form>
        </div>
    </main>

    <footer class="container-fluid">
        <div class="row">
            <div class="col-12 py-5 text-start">
                <p>Politique de confidentialité des données personnelles</p>
            </div>
        </div>
    </footer>

    <?php require_once(__DIR__ . '/footer.php'); ?>