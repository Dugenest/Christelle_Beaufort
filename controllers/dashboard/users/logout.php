<?php
    session_start();

    unset($_SESSION['user']);

    header('location: /controllers/home/home-ctrl.php');
    die;