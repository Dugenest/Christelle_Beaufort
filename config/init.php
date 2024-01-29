<?php

//Constantes de connexion à PHPMyAdmin
define('DSN', 'mysql:dbname=ChristelleBeaufort;host=localhost');
define('USERNAME', 'sebastien_christellebeaufort');
define('PASSWORD', '?N#GsGoFgLM#N66D');

//création d'une constante pour une régex du nom
define('NAME', '^[a-zA-Z ]{2,30}$');
//création d'une constante pour une régex pour le mot de passe
define('PSWD', '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$');
