
<!DOCTYPE html>
<html lang="fr">
<!-- Début du head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <?php if ($title == 'Christelle Beaufort') { ?>
        <link rel="stylesheet" href="/public/assets/css/styleHome.css">
    <?php } elseif ($title == 'Connexion') { ?>
        <link rel="stylesheet" href="/public/assets/css/styleConnexion.css">
    <?php } elseif ($title == 'Contact') { ?>
        <link rel="stylesheet" href="/public/assets/css/styleContact.css">
    <?php } elseif ($title == 'Inscription') { ?>
        <link rel="stylesheet" href="/public/assets/css/styleInscription.css">
    <?php } elseif ($title == 'Galerie') { ?>
        <link rel="stylesheet" href="/public/assets/css/styleGalerie.css">
    <?php } elseif ($title == 'Livre d\'or') { ?>
        <link rel="stylesheet" href="/public/assets/css/styleLivredor.css">  
    <?php } elseif ($title == 'Portfolio') { ?>    
        <link rel="stylesheet" href="/public/assets/css/stylePortfolio.css">
    <?php } elseif ($title == 'Tarif') { ?>
        <link rel="stylesheet" href="/public/assets/css/styleTarif.css">
    <?php } ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>Christelle Beaufort - <?= $title ?? ''?></title>
</head>
<!-- Fin du head -->

    <!-- Début du header -->
<header>
    <!-- Début de la navbar -->
        <nav class="navbar bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/controllers//home/home-ctrl.php">Accueil</a>
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
                                <a class="nav-link active" aria-current="page" href="/controllers/home/portfolio-ctrl.php">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/home/galerie-ctrl.php">Galerie</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/home/livre_dor-ctrl.php">Livre d'or</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/controllers/home/tarif-ctrl.php">Tarif</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Connexion / Inscription
                                </a>
                                <ul class="dropdown-menu">
                                <?php if(empty($_SESSION['user'])) { ?>
                                        <li><a class="dropdown-item" href="/controllers/home/inscription-ctrl.php">Inscription</a></li>
                                        <li><a class="dropdown-item" href="/controllers/home/connexion-ctrl.php">Connexion</a></li>
                                <?php } ?>   
                                <?php if(!empty($_SESSION['user'])) { ?>
                                        <li><a class="dropdown-item" href="/controllers/home/logout-ctrl.php">Déconnexion</a></li>
                                <?php } ?>
                                <?php if(!empty($_SESSION['user']) && $_SESSION['user']->role == 1) { ?>
                                        <li><a class="dropdown-item" href="/controllers/dashboard/users/list-ctrl.php">Dashboard</a></li>
                                <?php } ?>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="./../../../controllers/dashboard/users/list-ctrl.php">Dashboard</a>
                            </li>
                        </ul>
                        <!-- <form class="d-flex mt-3" role="search">
                            <input class="form-control me-2" type="search" placeholder="Mot clé" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Recherche</button>
                        </form> -->
                    </div>
                </div>
            </div>
        </nav>
    <!-- Fin de la navbar -->
</header>
<!-- Fin du header -->

<!-- Début du body -->
<body>
    