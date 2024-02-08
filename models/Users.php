
<?php

require_once __DIR__ . '/../helpers/Database.php';


// ! création de la classe
class User
{

    // ! création des attributs
    private string $username;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $adress;
    private string $phone;
    private int $role;
    private string $password;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?int $id_user;


    // ! création de la méthode magique construct
    public function __construct(string $username = '', string $lastname = '', string $firstname = '', string $email = '', string $adress = '', string $phone = '', int $role = 0, string $password = '', ?string $created_at = NULL, ?string $updated_at = NULL, ?string $deleted_at = NULL, ?int $id_user = NULL)
    {
        $this->username = $username;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->adress = $adress;
        $this->phone = $phone;
        $this->role = $role;
        $this->password = $password;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->id_user = $id_user;
    }


    // ! création des getters

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getAdress(): string
    {
        return $this->adress;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }


    /**
     * @return string
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    /**
     * @return string
     */
    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }


    // ! création des setters


    /**
     * @param int|null $id_user
     * 
     * @return [type]
     */
    public function setIduser(?int $id_user)
    {
        $this->id_user = $id_user;
    }


    /**
     * @param string $username
     * 
     * @return [type]
     */
    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    /**
     * @param string $lastname
     * 
     * @return [type]
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @param string $firstname
     * 
     * @return [type]
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @param string $email
     * 
     * @return [type]
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @param string $adress
     * 
     * @return [type]
     */
    public function setAdress(string $adress)
    {
        $this->adress = $adress;
    }

    /**
     * @param string $phone
     * 
     * @return [type]
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }


    
    /**
     * @param int $role
     * 
     * @return [type]
     */
    public function setRole(int $role)
    {
        $this->role = $role;
    }

    /**
     * @param string $password
     * 
     * @return [type]
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    /**
     * @param string $created_at
     * 
     * @return [type]
     */
    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string $updated_at
     * 
     * @return [type]
     */
    public function setUpdatedAt(?string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @param string $deleted_at
     * 
     * @return [type]
     */
    public function setDeletedAt(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }


    // ! création de ma méthode


    /**
     * @return bool
     */
    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `users` (`id_user`, `username`, `lastname`, `firstname`, `email`, `adress`, `phone`, `role`, `password`) 
                VALUES (:id_user, :username, :lastname, :firstname, :email, :adress, :phone, :role, :password);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);
        $sth->bindValue(':username', $this->getUsername());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':email', $this->getEmail());
        $sth->bindValue(':adress', $this->getAdress());
        $sth->bindValue(':phone', $this->getPhone());
        $sth->bindValue(':role', $this->getRole(), PDO::PARAM_INT);
        $sth->bindValue(':password', $this->getPassword());

        $sth->execute();
        $nbrows = $sth->rowCount();

        return $nbrows > 0 ? true : false;
    }


    /**
     * @return [type]
     */
    public static function getAll()
    {
        $pdo = Database::connect();

        /*Sélectionne toutes les valeurs dans la table categories*/
        $sql = 'SELECT * FROM users';

        $sth = $pdo->prepare($sql);
        $sth->execute();

        /*Retourne un tableau associatif pour chaque entrée de notre table
         *avec le nom des colonnes sélectionnées en clefs*/
        $result = $sth->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }


    /**
     * @param int $id
     * 
     * @return object
     */
    public static function getId(int $id): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT *    
                FROM `users` 
                WHERE `id_user`=:id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }


    /**
     * @return [type]
     */
    public function update()
    {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            // Requête MySQL pour mettre à jour des données
            $sql = 'UPDATE `users` 
                SET 
                    `username` = :username, 
                    `lastname` = :lastname,
                    `firstname` = :firstname,
                    `email` = :email,
                    `adress` = :adress,
                    `phone` = :phone,
                    `role` = :role,
                    `password` = :password
                WHERE `id_user` = :id';

            $sth = $pdo->prepare($sql);
            $sth->bindValue(':username', $this->getUsername());
            $sth->bindValue(':lastname', $this->getLastname());
            $sth->bindValue(':firstname', $this->getFirstname());
            $sth->bindValue(':email', $this->getEmail());
            $sth->bindValue(':adress', $this->getAdress());
            $sth->bindValue(':phone', $this->getPhone());
            $sth->bindValue(':role', $this->getRole(), PDO::PARAM_INT);
            $sth->bindValue(':password', $this->getPassword());
            $sth->bindValue(':id', $this->getIdUser(), PDO::PARAM_INT);

            if ($sth->execute()) {
                return true; // La mise à jour s'est bien déroulée
            } else {
                // En cas d'échec, afficher les détails de l'erreur
                $errorInfo = $sth->errorInfo();
                throw new Exception("Erreur lors de la mise à jour : {$errorInfo[2]}");
            }
        } catch (Exception $e) {
            // En cas d'exception, afficher le message d'erreur
            die('Erreur : ' . $e->getMessage());
        }
    }



    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public static function delete(int $id)
    {
        $pdo = Database::connect();

        $sql = 'DELETE 
                FROM users 
                WHERE id_user = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }


    /**
     * @param mixed $username
     * 
     * @return [type]
     */
    public function getIdUserByUsername($username)
    {
        $pdo = Database::connect();

        $sql = "SELECT id_user FROM users WHERE username = :username";
        $sth = $pdo->prepare($sql);
        $sth->bindParam(':username', $username, PDO::PARAM_STR);
        $sth->execute();

        if ($sth->rowCount() > 0) {
            $row = $sth->fetch(PDO::FETCH_OBJ);
            return $row['id_user'];
        }

        return null;
    }

    /**
     * @param string $username
     * 
     * @return object
     */
    public static function getByUsername(string $username): object|false
    {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `users`
                WHERE `username` = :username;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':username', $username);
        $sth->execute();

        if ($sth->rowCount() > 0) {
            $row = $sth->fetch(PDO::FETCH_OBJ);
            return $row;
        }

        return null;
    }

    
    /**
     * @param mixed $username
     * 
     * @return bool
     */
    public static function isExist($username): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_user`) AS "count"
                FROM `users` 
                WHERE `username`=:username;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':username', $username, PDO::PARAM_STR);
        $sth->execute();

        $count = $sth->fetchColumn();

        return (bool) $count > 0;
    }


    // public static function confirm(string $email): bool {
    //     $pdo = Database::connect();
    //     $sql = 'UPDATE `users`
    //             SET confirmed_at = now()
    //             WHERE `email` = :email;'; 

    //     $sth = $pdo->prepare($sql);
    //     $sth->bindValue(':email', $email);
    //     $sth->execute();
    //     if ($sth->rowCount() <= 0) {
    //         throw new Exception();
    //         return true;
    //     } else {
    //     return false;
    //     }
    // }

}
