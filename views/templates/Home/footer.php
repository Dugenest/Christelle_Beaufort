<?php
// Obtenir l'année actuelle
$currentYear = date("Y");
$year = (!empty($_GET['year'])) ? $_GET['year'] : $currentYear;
?>

<!-- Début du footer -->
<footer>
    <section class="row reseaux py-2 text-center">
        <div class="col-4">
            <a href="https://www.facebook.com/ChristelleFeryPhotographie" target="_blank"><img src="/public/assets/img/fb.png" class="logoSociaux" alt="Logo facebook"></a>
        </div>
        <div class="col-4">
            <a href="/controllers/home/contact-ctrl.php" target="_blank"><img src="/public/assets/img/téléchargement.jpeg" class="logoSociaux" alt="Logo contact"></a>
        </div>
        <div class="col-4">
            <a href="https://www.instagram.com/christelle_beaufort" target="_blank"><img src="/public/assets/img/insta.png" class="logoSociaux" alt="Logo instagram"></a>
        </div>
    </section>

    <section class="row mentionsLegales text-center py-3">
        <a target="_blank">© Christelle-Beaufort - <?= "$year" ?></a>
        <a href="/controllers/home/politiquedeconfidentialite-ctrl.php" target="_blank">Politique de confidentialité</a>
        <a href="/controllers/home/mentionslegales-ctrl.php" target="_blank">Mentions Légales</a>
    </section>

<!-- Fin du footer -->
</footer>
<?php if ($title == 'Inscription') { ?>
    <script src="/public/assets/js/scriptInscription.js"></script>
<?php } elseif ($title == 'Connexion') { ?>
    <script src="/public/assets/js/scriptConnexion.js"></script>
<?php } elseif ($title == 'Contact') { ?>
    <script src="/public/assets/js/scriptContact.js"></script>
<?php } elseif ($title == 'Livre d\'or') { ?>
    <script src="/public/assets/js/scriptLivreDor.js"></script>
<?php } elseif ($title == 'Mot de passe oublié') { ?>
    <script src="/public/assets/js/scriptMdpo.js"></script>
<?php } ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Fin du body -->
</body>
<!-- Fin de HTML -->
</html>