<!-- Début du header -->
<header>
    <!-- Début de la navbar -->
        <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">Accueil</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navbar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./portfolio.php">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./galerie.php">Galerie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./livre_dor.php">Livre d'or</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./tarif.php">Tarif</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Connexion / Inscription
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="./inscription.php">Inscription</a></li>
                                    <li><a class="dropdown-item" href="./connexion.php">Connexion</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Mot clé" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Recherche</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    <!-- Fin de la navbar -->
</header>
<!-- Fin du header -->