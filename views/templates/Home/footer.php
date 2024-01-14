<!-- Début du footer -->
<?php
// Obtenir l'année actuelle
$currentYear = date("Y");
$year = (!empty($_GET['year'])) ? $_GET['year'] : $currentYear;
?>

<footer>
        <div class="container-fluid">
            <section class="row reseaux py-2 text-center">
                <div class="col-4">
                    <a href="https://www.facebook.com/ChristelleFeryPhotographie" target="_blank"><img src="./public/assets/img/fb.png" class="logoSociaux" alt="Logo facebook"></a>
                </div>
                <div class="col-4">
                    <a href="./contact.php" target="_blank"><img src="./public/assets/img/téléchargement.jpeg" class="logoSociaux" alt="Logo contact"></a>
                </div>
                <div class="col-4">
                    <a href="https://www.instagram.com/christelle_beaufort" target="_blank"><img src="./public/assets/img/insta.png" class="logoSociaux" alt="Logo instagram"></a>
                </div>
            </section>

            <section class="row mentionsLegales text-center py-3">
                <a target="_blank">© Christelle-Beaufort - <?="$year"?></a>
                <a href="" target="_blank">Politique de confidentialité</a>
                <a href="" target="_blank">Mentions Légales</a>
            </section>
        </div>
    </footer>
<!-- Fin du footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>