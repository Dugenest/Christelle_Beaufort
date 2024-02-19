<?php

session_start();

//Constantes de connexion à PHPMyAdmin
define('DSN', 'mysql:dbname=ChristelleBeaufort;host=localhost');
define('USERNAME', 'sebastien_christellebeaufort');
define('PASSWORD', '?N#GsGoFgLM#N66D');

//création des régex
define('USER_NAME', "^[A-Za-z0-9éèêëàâäôöûüïç' ]{2,30}$");
define('NAME', "^[A-Za-zéèêëàâäôöûüïç' ]{2,30}$");
define('EMAIL', "^[A-Za-z0-9.\_\.\-]+@[a-z0-9\_\-]+\.[a-z]{2,5}$");
define('PHONE', "^[0-9]{10}$");
define('PERFORMANCE', "^[A-Za-z0-9À-ÖØ-öø-ÿéèêëàâäôöûüïç\s\.,;\'\"!?()\[\]{}\-:]{5,50}$");
define('MESSAGE', "^[A-Za-z0-9À-ÖØ-öø-ÿéèêëàâäôöûüïç\s\.,;\'\"!?()\[\]{}\-: ]{5,300}$");
define('ADRESS', "^[A-Za-z0-9À-ÖØ-öø-ÿéèêëàâäôöûüïç\s\.,;\'\"!?()\[\]{}\-: ]{10,250}$");
define('PSWD', '^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$');

//création des constantes pour définir les photos
define('ARRAY_TYPES', ['image/jpeg', 'image/png']);
define('UPLOAD_MAXSIZE', 10*1024*1024);