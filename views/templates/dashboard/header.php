<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/styleDashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>
        Christelle Beaufort - <?= $title ?? '' ?>
    </title>
</head>

<body>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"><strong><I>Dashboard</I></strong></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="./../../../index.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li>
                            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="/controllers/dashboard/categories/list-ctrl.php" class="nav-link px-4"><img src=""><span class="d-none d-sm-inline"> Utilisateurs</span></a>
                                </li>
                                <li> 
                                    <a href="#" class="nav-link px-4"><img src=""><span class="d-none d-sm-inline">Commentaires</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-4"><img src=""><span class="d-none d-sm-inline"> Messages</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-4"><img src=""><span class="d-none d-sm-inline"> Galerie</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-4"><img src=""><span class="d-none d-sm-inline"> Portfolio</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-4"><img src=""><span class="d-none d-sm-inline"> Prestations</span></a>
                                </li>
                            </ul>
                        </li>
                    <!-- <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/Dugenest.png" alt="photoProfil" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1">Seb</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#">Paramètres</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Déconnexion</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="col py-3">