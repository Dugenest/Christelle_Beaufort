<?php
    //Appel de la session start
    session_start();

    //Suppression de la session utilisateur
    unset($_SESSION['user']);

    //redirection vers la page d'accueil après déconnexion
    header('location: /controllers/home/home-ctrl.php');
    die;