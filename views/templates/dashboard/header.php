<!DOCTYPE html>
<html lang="fr">
<!-- Début du head -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/assets/css/styleDashboard.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>
        Christelle Beaufort - <?= $title ?? '' ?>
    </title>
<!-- Fin du head -->
</head>

<!-- Début du main -->
<main>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline"><strong><I>Dashboard</I></strong></span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="/controllers/home/home-ctrl.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">Accueil</span>
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                            <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="/controllers/dashboard/users/list-ctrl.php" class="nav-link px-4"><span class="d-none d-sm-inline"> Utilisateurs</span></a>
                                </li>
                                <li> 
                                    <a href="/controllers/dashboard/comments/list-ctrl.php" class="nav-link px-4"><span class="d-none d-sm-inline"> Commentaires</span></a>
                                </li>
                                <li> 
                                    <a href="/controllers/dashboard/categories/list-ctrl.php" class="nav-link px-4"><span class="d-none d-sm-inline"> Catégories des photos</span></a>
                                </li>
                                <li>
                                    <a href="/controllers/dashboard/pictures/list-ctrl.php" class="nav-link px-4"><span class="d-none d-sm-inline"> Photos</span></a>
                                </li>
                                <li>
                                    <a href="/controllers/dashboard/messages/list-ctrl.php" class="nav-link px-4"><span class="d-none d-sm-inline"> Messages</span></a>
                                </li>
                                <li>
                                    <a href="/controllers/dashboard/performances/list-ctrl.php" class="nav-link px-4"><span class="d-none d-sm-inline"> Tarifs</span></a>
                                </li>
                                
                            </ul>
                        </li>
                </div>
            </div>
            <div class="col py-3">