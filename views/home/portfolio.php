<!-- Début du main -->
<main>
    <div class="container-fluid py-5">
        <h1>PORTFOLIO</h1>
        <div class="row justify-content-end py-3">
            <ul class="navbar-nav col flex-row text-center justify-content-around">
                <li>
                    <a class="nav-link active py-4" id="wedding" aria-current="page" href="#sectionWedding"><button>Mariage</button></a><br>
                </li>
                <li>
                    <a class="nav-link active py-4" id="portrait" aria-current="page" href="#sectionPortrait"><button>Portrait de famille</button></a><br>
                </li>
                <li>
                    <a class="nav-link active py-4" id="love" aria-current="page" href="#sectionLove"><button>Love yourself</button></a><br>
                </li>
                <li>
                    <a class="nav-link active py-4" id="pets" aria-current="page" href="#sectionPets"><button>Animaux de compagnie</button></a><br>
                </li>
            </ul>
            <div class="text text-center">
                <p>Vous êtes ici sur mon portfolio où je vais vous faire découvrir mon univers photographique avec mes différentes catégories.</p>
                <p>Bon voyage !</p>
            </div>
        </div>
    </div>

    <section id="sectionWedding" class="d-none">
        <div class="container-fluid">
            <div class="row text-center justify-content-center">
                <h2><u>Mariage</u></h2>
                <?php foreach ($pictures as $picture) {
                    if ($picture->category == 'Portfolio' && $picture->sub_category == 'Mariage') { ?>
                        <div class="bloc col col-md-4 py-3"><img class="object-fit-cover" src="<?= '/public/uploads/pictures/' . $picture->picture ?>"></div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="sectionPortrait" class="d-none">
        <div class="container-fluid">
            <div class="row text-center justify-content-center">
                <h2><u>Portrait de famille</u></h2>
                <?php foreach ($pictures as $picture) {
                    if ($picture->category == 'Portfolio' && $picture->sub_category == 'Portrait de famille') { ?>
                        <div class="bloc col col-md-4 py-3"><img class="object-fit-cover" src="<?= '/public/uploads/pictures/' . $picture->picture ?>"></div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="sectionLove" class="d-none">
        <div class="container-fluid">
            <div class="row text-center justify-content-center">
                <h2><u>Love yourself</u></h2>
                <?php foreach ($pictures as $picture) {
                    if ($picture->category == 'Portfolio' && $picture->sub_category == 'Love yourself') { ?>
                        <div class="bloc col col-md-4 py-3"><img class="object-fit-cover" src="<?= '/public/uploads/pictures/' . $picture->picture ?>"></div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>

    <section id="sectionPets" class="d-none">
        <div class="container-fluid">
            <div class="row text-center justify-content-center">
                <h2><u>Animaux de compagnie</u></h2>
                <?php foreach ($pictures as $picture) {
                    if ($picture->category == 'Portfolio' && $picture->sub_category == 'Animaux de compagnie') { ?>
                        <div class="bloc col col-md-4 py-3"><img class="object-fit-cover" src="<?= '/public/uploads/pictures/' . $picture->picture ?>"></div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </section>
</main>
<!-- fin du main -->