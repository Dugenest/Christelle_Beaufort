
<?php

require_once __DIR__ . '/../helpers/Database.php';


// ! création de la classe
class Performance
{

    // ! création des attributs
    private string $name;
    private string $description;
    private int $price;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?int $id_performance;
    private ?int $id_user;


    // ! création de la méthode magique construct
    public function __construct(string $name = '', string $description = '', int $price = 0, ?string $created_at = NULL, ?string $updated_at = NULL, ?string $deleted_at = NULL, ?int $id_performance = NULL, ?int $id_user = NULL)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->id_performance = $id_performance;
        $this->id_user = $id_user;
    }


    // ! création des getters


    
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    
    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
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

    /**
     * @return int|null
     */
    public function getIdPerformance(): ?int
    {
        return $this->id_performance;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }


    // ! création des setters


    /**
     * @param string $name
     * 
     * @return [type]
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $type
     * 
     * @return [type]
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @param string $price
     * 
     * @return [type]
     */
    public function setPrice(string $price)
    {
        $this->price = $price;
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

    /**
     * @param int|null $id_performance
     * 
     * @return [type]
     */
    public function setIdPerformance(?int $id_performance)
    {
        $this->id_performance = $id_performance;
    }

    /**
     * @param int|null $id_user
     * 
     * @return [type]
     */
    public function setIdUser(?int $id_user)
    {
        $this->id_user = $id_user;
    }


    // ! création de ma méthode


    /**
     * @return bool
     */
    public function insert(): bool
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `performances` (`id_performance`, `name`, `description`, `price`, `id_user`) 
                VALUES (:id_performance, :name, :description, :price, :id_user);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_performance', $this->getIdPerformance(), PDO::PARAM_INT);
        $sth->bindValue(':name', $this->getName());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':price', $this->getPrice());
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);

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
        $sql = 'SELECT * 
                FROM performances';

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
                FROM `performances` 
                WHERE `id_performance`=:id;';

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

            // Requête MySQL pour mettre à jour des données
            $sql = 'UPDATE `performances` 
                SET 
                    `name` = :name, 
                    `description` = :description,
                    `price` = :price
                WHERE `id_performance` = :id';

            $sth = $pdo->prepare($sql);
            $sth->bindValue(':name', $this->getname());
            $sth->bindValue(':description', $this->getDescription());
            $sth->bindValue(':price', $this->getprice());
            $sth->bindValue(':id', $this->getIdPerformance(), PDO::PARAM_INT);
            $result = $sth->execute();

            return $result;
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
                FROM performances 
                WHERE id_performance = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }



    /**
     * @param string $name
     * 
     * @return object
     */
    public static function getByname(string $name): object|false
    {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `users`
                WHERE `name` = :name;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name', $name);
        $sth->execute();

        if ($sth->rowCount() > 0) {
            $row = $sth->fetch(PDO::FETCH_OBJ);
            return $row;
        }

        return null;
    }

    
    /**
     * @param mixed $name
     * 
     * @return bool
     */
    public static function isExist($name): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_performance`) AS "count"
                FROM `performances` 
                WHERE `name`=:name;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name', $name, PDO::PARAM_STR);
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
