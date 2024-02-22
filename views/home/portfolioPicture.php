<!-- Début du main -->
<main>
    <div class="container-fluid title py-5">
        <?php if (!empty($pictures)) { ?>
            <h1><?= $pictures[0]->category ?></h1>
        <?php } ?>
    </div>
    <a class="text-black" href="/controllers/home/portfolio-ctrl.php">Retour</a>
    <div class="row text-center justify-content-center">
        <?php foreach ($pictures as $picture) { ?>
            <div class="bloc col-12 col-md-4 py-2">
                <img class="portfolioPictures py-3 object-fit img-fluid" src="/public/uploads/pictures/picture/<?= $picture->picture ?>">
            </div>
        <?php } ?>
    </div>
    </div>
</main>
<!-- fin du main -->