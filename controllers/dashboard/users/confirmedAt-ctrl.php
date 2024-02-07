<?php

require_once __DIR__ . '/../../../models/Users.php';
require_once __DIR__ . '/../../../config/init.php';


// try {
//     $email = filter_input(INPUT_GET, `email`, FILTER_SANITIZE_EMAIL);
//     $isConfirmed = User::confirm($email);

// } catch (PDOException $e) {
//     die('Erreur : ' . $e->getMessage());
// }