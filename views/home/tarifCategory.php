
<!-- Début du main -->
<main class="main-container" style="background-image: url('/public/uploads/pictures/categories/<?= $performance->picture ?>');">
    <div class="container-fluid">
        <a class="text-black" href="/controllers/home/tarif-ctrl.php">Retour</a>
        <div class="row">
            <h2 class="titleH2">Tarifs prestations</h2>
            <?php foreach ($performances as $performance) { ?>
                <div class="col-12 col-md-3 py-5 card">
                    <h3>∞ <?= $performance->titlePerformance ?> ∞</h3>
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title"><U>Cette option comprend :</U></h5>
                        <ul class="card-text">
                            <li><?= $performance->description ?></li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <p>- <?= $performance->price ?>€ -</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row text-center justify-content-center py-3">
        <a button type="button" id="btnGalerie" href="/controllers/home/contact-ctrl.php" class="btn btn-light">CONTACT</button></a>
    </div>
</main>
<!-- fin du main -->


    <!-- <?php foreach ($performances as $performance) { ?>
        <img class="imgPerformance" src="/public/uploads/pictures/categories/<?= $performance->picture ?>" alt="image prestation" id="imgLogo">
    <?php } ?>
    <div class="container-fluid">
        <a class="text-black" href="/controllers/home/tarif-ctrl.php">Retour</a>
        <div class="row">
            <h2 class="titleH2">Tarifs prestations</h2>
            <?php foreach ($performances as $performance) { ?>
                <div class="col-12 col-md-3 py-5 card">
                    <h3>∞ <?= $performance->titlePerformance ?> ∞</h3>
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title"><U>Cette option comprend :</U></h5>
                        <ul class="card-text">
                            <li><?= $performance->description ?></li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <p>- <?= $performance->price ?>€ -</p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="row text-center justify-content-center py-3">
        <a button type="button" id="btnGalerie" href="/controllers/home/contact-ctrl.php" class="btn btn-light">CONTACT</button></a>
    </div>
</main> -->
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