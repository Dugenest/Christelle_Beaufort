<?php

class Auth
{

    /**
     * @return [type]
     */
    public static function check()
    {
        if (empty($_SESSION['user']) || $_SESSION['user']->role != 1) {
            header('location: /controllers/home/connexion-ctrl.php');
            exit;
        }
    }
}
