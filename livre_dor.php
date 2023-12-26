<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/assets/css/styleLivredor.css">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Livre d'or</title>
</head>
<body >

    <?php require_once(__DIR__ . '/header.php'); ?>

<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
            <h1>LIVRE D'OR</h1>


            <!-- commentaires des clients -->
            <div class="row">
                <p class="col comment"></p>
            </div>
            <hr>
            <h2>AJOUTER UN COMMENTAIRE</h2>
            <form class="row justify-content-center py-5" id="formulaire">
                <div class="col-md-6">
                    <div class="col-12 mb-3 py-3">
                        <label for="identifiant" class="form-label">Identifiant<strong>*</strong></label>
                        <input type="text" class="form-control" id="identifiant" aria-describedby="identifiant" placeholder="Votre identifiant" required>
                    </div>
                    <div class="col-12 mb-3 py-3">
                        <label for="prestation" class="form-label">Quelle prestation avons nous partagé ?<strong> *</strong></label>
                        <input type="text" class="form-control" id="prestation" aria-describedby="prestation" placeholder="Votre prestation" required>
                    </div>
                    <div class="col-12 mb-3 py-2">
                        <label for="disabledTextInput" class="form-label">Message<strong>*</strong></label>
                        <textarea id="disabledTextInput" class="form-control" rows="8" placeholder="Votre message" required></textarea>
                    </div>
                    <div class="row text-center justify-content-center py-3">
                        <button type="submit" id="btnLivre" class="btn btn-light">ENVOYER</button>
                    </div>
                </div>
            </form>
        </div>

    </main>
    <!-- fin du main -->
            
    <?php require_once(__DIR__ . '/footer.php'); ?>