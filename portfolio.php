    <?php require_once(__DIR__ . '/views/templates/Home/head.php'); ?>

    <link rel="stylesheet" href="./public/assets/css/stylePortfolio.css">
    <title>Portfolio</title>
</head>

<body >

    <?php require_once(__DIR__ . '/views/templates/Home/header.php'); ?>

<!-- Début du main -->
    <main>
        <div class="container-fluid py-5">
            <h1>PORTFOLIO</h1>
                <div class="row justify-content-end py-3">
                    <ul class="navbar-nav col flex-row text-center justify-content-around">
                        <li>
                            <a class="nav-link active" id="wedding" aria-current="page" href="#sectionWedding"><button>Mariage</button></a>
                        </li>
                        <li>
                            <a class="nav-link active" id="portrait" aria-current="page" href="#sectionPortrait"><button>Portrait de famille</button></a>
                        </li>
                        <li>
                            <a class="nav-link active" id="love" aria-current="page" href="#sectionLove"><button>Love yourself</button></a>
                        </li>
                        <li>
                            <a class="nav-link active" id="pets" aria-current="page" href="#sectionPets"><button>Annimaux de compagnie</button></a>
                        </li>
                    </ul>
                    <p class="info"><-------------------- Merci de cliquer sur un boutton pour voir les photos --------------------></p>
                </div>

            <div class="row py-3">
                <section id="sectionWedding" class="d-none">
                        <h2><u>Mariage</u></h2>
                    <div id="container1">
                        <div class="bloc1"><img id="crop" src="./public/assets/img/Mariage/DSC_6556-2.jpg"></div>
                        <div class="bloc2"><img id="crop" src="./public/assets/img/Mariage/_DSC2005.jpg"></div>
                        <div class="bloc3"><img id="crop2" src="./public/assets/img/Mariage/DSC_4594-2.jpg"></div>
                        <div class="bloc4"><img id="crop2" src="./public/assets/img/Mariage/_DSC1412.jpg"></div>
                        <div class="bloc5"><img id="crop3" src="./public/assets/img/Mariage/DSC_7972-2.jpg"></div>
                        <div class="bloc6"><img id="crop3" src="./public/assets/img/Mariage/DSC_4417-2.jpg"></div>
                        <div class="bloc7"><img id="crop4" src="./public/assets/img/Mariage/DSC_7898.jpg"></div>
                        <div class="bloc8"><img id="crop5" src="./public/assets/img/Mariage/DSC_7961.jpg"></div>
                        <div class="bloc9"><img id="crop5" src="./public/assets/img/Mariage/DSC_3657-2.jpg"></div>
                        <div class="bloc10"><img id="crop6" src="./public/assets/img/Mariage/DSC_6650-2.jpg"></div>
                        <div class="bloc11"><img id="crop6" src="./public/assets/img/Mariage/DSC_6643.jpg"></div>
                        <div class="bloc12"><img id="crop7" src="./public/assets/img/Mariage/DSC_3852.jpg"></div>
                        <div class="bloc13"><img id="crop7" src="./public/assets/img/Mariage/DSC_8623-2.jpg"></div>
                        <div class="bloc14"><img id="crop8" src="./public/assets/img/Mariage/_DSC1290-2.jpg"></div>
                        <div class="bloc15"><img id="crop8" src="./public/assets/img/Mariage/_DSC1491.jpg"></div>
                        <div class="bloc16"><img id="crop9" src="./public/assets/img/Mariage/_DSC1930.jpg"></div>
                        <div class="bloc17"><img id="crop9" src="./public/assets/img/Mariage/DSC_4033-2.jpg"></div>
                        <div class="bloc18"><img id="crop10" src="./public/assets/img/Mariage/_DSC1029-2.jpg"></div>
                        <div class="bloc19"><img id="crop10" src="./public/assets/img/Mariage/_DSC1260.jpg"></div>
                        <div class="bloc20"><img id="crop11" src="./public/assets/img/Mariage/_DSC1969.jpg"></div>
                        <div class="bloc21"><img id="crop11" src="./public/assets/img/Mariage/_DSC1401.jpg"></div>
                    </div>
                </section>

                <section id="sectionPortrait" class="d-none">
                    <h2><U>Portrait</U></h2>
                    <div id="container2">
                        <div class="bloc1"><img id="crop" src="./public/assets/img/Portrait de famille/DSC_2715-2.jpg"></div>
                        <div class="bloc2"><img id="crop" src="./public/assets/img/Portrait de famille/DSC_1840-3.jpg"></div>
                        <div class="bloc3"><img id="crop2" src="./public/assets/img/Portrait de famille/DSC_3026-2.jpg"></div>
                        <div class="bloc4"><img id="crop2" src="./public/assets/img/Portrait de famille/DSC_5235.jpg"></div>
                        <div class="bloc5"><img id="crop3" src="./public/assets/img/Portrait de famille/DSC_1791-2.jpg"></div>
                        <div class="bloc6"><img id="crop3" src="./public/assets/img/Portrait de famille/DSC_2199-2.jpg"></div>
                        <div class="bloc7"><img id="crop5" src="./public/assets/img/Portrait de famille/DSC_1849-2.jpg"></div>
                        <div class="bloc8"><img id="crop6" src="./public/assets/img/Portrait de famille/DSC_3040-3.jpg"></div>
                        <div class="bloc9"><img id="crop7" src="./public/assets/img/Portrait de famille/DSC_5091-2.jpg"></div>
                        <div class="bloc10"><img id="crop8" src="./public/assets/img/Portrait de famille/DSC_2649-2.jpg"></div>
                        <div class="bloc11"><img id="crop9" src="./public/assets/img/Portrait de famille/DSC_5141-3.jpg"></div>
                        <div class="bloc12"><img id="crop10" src="./public/assets/img/Portrait de famille/DSC_5106-3.jpg"></div>
                        <div class="bloc13"><img id="crop7" src="./public/assets/img/Portrait de famille/DSC_3134-2.jpg"></div>
                    </div>
                </section>

                <section id="sectionLove" class="d-none">
                    <h2><U>Love</U></h2>
                    <div id="container3">
                        <div class="bloc1"><img id="crop" src="./public/assets/img/Love Yourself/DSC_5450-2.jpg"></div>
                        <div class="bloc2"><img id="crop" src="./public/assets/img/Love Yourself/DSC_5460-2.jpg"></div>
                        <div class="bloc3"><img id="crop2" src="./public/assets/img/Love Yourself/DSC_6467-2.jpg"></div>
                        <div class="bloc4"><img id="crop2" src="./public/assets/img/Love Yourself/DSC_6378-2.jpg"></div>
                        <div class="bloc5"><img id="crop3" src="./public/assets/img/Love Yourself/DSC_6390-2.jpg"></div>
                        <div class="bloc6"><img id="crop3" src="./public/assets/img/Love Yourself/DSC_6463-2.jpg"></div>
                        <div class="bloc7"><img id="crop7" src="./public/assets/img/Love Yourself/DSC_6389.jpg"></div>
                    </div>
                </section>

                <section id="sectionPets" class="d-none">
                    <h2><U>Annimaux</U></h2>
                    <div id="container4">
                        <div class="bloc22"><img id="crp1" src="./public/assets/img/Animaux de compagnie/_DSC0597-2.jpg"></div>
                        <div class="bloc23"><img id="crp2" src="./public/assets/img/Animaux de compagnie/_DSC0618-2.jpg"></div>
                        <div class="bloc24"><img id="crp2" src="./public/assets/img/Animaux de compagnie/_DSC0615-2.jpg"></div>
                        <div class="bloc25"><img id="crp3" src="./public/assets/img/Animaux de compagnie/_DSC0750.jpg"></div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    <!-- fin du main -->
            
    <script src="./public/assets/js/scriptPortfolio.js"></script>
    <?php require_once(__DIR__ . '/views/templates/Home/footer.php'); ?>