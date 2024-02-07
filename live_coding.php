
INSCRIPTION :

password varchar(255)
role -> int

if ($password != $confirmPassword)  {
    $errors["password"] = "les mots de passe ne correspondent pas";
}


if (empty($errors)) {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $user = new User();
    $user->setPassword($passwordHash);

    $user->insert()
}

Ne jamais utiliser le hachage MD5



CONNEXION:

email / Identifiant
password (pas de regex ni de pattern)

if ($_SERVER("REQUEST_METHOD") == 'POST') {
    <- ...... nettoyage et validation de l'email et du password .......  ->

    public static function getByMail(string $email): object|False
    {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `users`
                WHERE `email` = :email;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':email', $email);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    
    if (empty($errors)) {
        $user = User::getByMail($email);
        if (!$user) {
            message d'erreur!!
        } else {
            $passwordHash = $user->password
            $isAuth = password_verify($password, $passwordHash);  //ici $password du formulaire de connexion
            if ($isAuth) {
                if (is_null($user->confirmed_at)) {
                    message erreur : veuiller confirmer!
                } else {
                unset($user->password);
                $_SESSION['user'] = $user;
                }
            } else {
                message erreur : Mauvais password!
            }
        }
    }
}

//securiser dashboard
Auth::check()
if(empty($_SESSION['user']) || $_SESSION['user']->role != 1) {
    header('location: /controllers/home/connexion-ctrl.php');
    exit;
} 