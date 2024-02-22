<!-- Début du main -->
<main>
    <div class="container-fluid">
        <h1>PORTFOLIO</h1>
        <div class="row justify-content-end py-3">
            <div class="col text text-center">
                <p>Vous êtes ici sur mon portfolio où je vais vous faire découvrir mon univers photographique avec mes différentes catégories.</p>
                <p>Bon voyage !</p>
            </div>
        </div>
        <div class="row text-center py-5 justify-content-around">
            <?php foreach ($categories as $value) {
                if (($value->category) != 'Gallerie') { ?>
                    <div class="col-12 col-md-5 my-3 card" style="width: 20rem;">
                        <a href="./portfolioPicture-ctrl.php?id=<?= $value->id_category ?>">
                            <img src="/public/uploads/pictures/categories/<?= $value->picture ?>" class="card-img-top object-fit img-fluid"" alt="<?= $value->category ?>">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?= $value->category ?></h5>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</main>
<!-- fin du main -->