<!-- Début du main -->
<main>
    <div class="title py-5">
        <h1>PORTFOLIO</h1>
    </div>

    <section>
        <div class="container-fluid">
            <a class="text-black" href="/controllers/home/portfolio-ctrl.php">Retour</a>
            <div class="row text-center justify-content-center">
                <?php foreach($pictures as $picture) { ?>
                    <div class="bloc col col-md-4 py-2">
                        <img class="portfolioPictures object-fit-cover py-3" src="/public/uploads/pictures/picture/<?= $picture->picture ?>">
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>
<!-- fin du main -->