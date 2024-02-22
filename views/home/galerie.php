<!-- Début du main -->
<main>
    <div class="container-fluid title">
        <h1>GALERIE</h1>
        <div class="row galeriePicture text-center">
        <?php foreach ($pictures as $picture) {
            if ($picture->category == 'Gallerie') { ?>
                <div class="col-12 col-md-3 card">
                    <img class="object-fit img-fluid" src="/public/uploads/pictures/picture/<?= $picture->picture ?>" class="card-img-top image-fluid" alt="<?= $picture->pictureTitle ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $picture->pictureTitle ?></h5>
                        <p class="card-text"><?= $picture->description ?></p>
                    </div>
                    <div class="card-footer text-end">
                        <p>Prix: <?= $picture->price ?> € TTC</p>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
        <div class="row text-center justify-content-center py-3">
            <a button type="button" id="btnGalerie" href="/controllers/home/contact-ctrl.php" class="btn btn-light">CONTACT</button></a>
        </div>
        </div>
    </div>
</main>
<!-- fin du main -->