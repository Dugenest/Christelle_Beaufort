
<!-- Début du main -->
<main class="main-container py-5 img-fluid object-fit" style="background-image: url('/public/uploads/pictures/categories/<?= $imgPerformance ?>');">
    <div class="container-fluid">
        <div class="row tarifCard">
            <?php if (!empty($performances)) { ?>
                <h2 class="titleH2 text-white py-4">Tarifs <?= $performances[0]->category ?></h2>
                <?php } ?>
                <a class="text-white" href="/controllers/home/tarif-ctrl.php">Retour</a>
            <?php foreach ($performances as $performance) { ?>
                <div class="col-12 col-md-3 card my-3">
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
1490 --> -->
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