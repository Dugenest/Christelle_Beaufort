<!-- <h1>TARIF PRESTATIONS</h1>
<section class="container-fluid logo">
    <div class="row justify-content-center">
        <img src="/public/assets/img/Photo a vendre/Lueur gelée.jpg" alt="logo" id="imgLogo">
    </div>
</section> -->

<!-- Début du main -->
<main>
    <div class="container-fluid py-md-5">
        <div class="row py-5">
            <h2 class="titleH2 py-5">Tarifs prestations</h2>
        </div>
        <div class="row text-center py-5 justify-content-around">
            <?php foreach ($categories as $category) {
                if (($category->category) != 'Gallerie') { ?>
                    <div class="col col-md-5 card" style="width: 20rem;">
                        <a href="/controllers/home/tarifCategory-ctrl.php?id=<?= $category->id_category ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $category->category ?></h5>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="row text-center justify-content-center py-3">
            <a button type="button" id="btnGalerie" href="/controllers/home/contact-ctrl.php" class="btn btn-light">CONTACT</button></a>
        </div>
</main>
<!-- fin du main -->


<!-- 

Engagement
<li>8 heures de présence continue entre 10h et 21h (à définir avec vous)</li>
<li>1 clé USB contenant toutes les photos travaillées</li>
<li>Galerie photo en ligne</li>
1090


passion
<li>12 heures de présence continue entre 10h et 21h (à définir avec vous)</li>
<li>1 clé USB contenant toutes les photos travaillées</li>
<li>Galerie photo en ligne</li>
<li>1 livre photo 30x20</li>
+
1 Tirage de la photo de votre choix
sur papier de qualité en 30x45
1490 -->
<!-- 


Inconditionnel
16 heures de présence continue (à définir avec vous)
1 clé USB contenant toutes les photos travaillées
Galerie photo en ligne
1 livre photo 30x30
+

Coffret de rangement du livre photo

OFFERT

- 1950€ - -->