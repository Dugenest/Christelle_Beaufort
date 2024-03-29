
<?php

require_once __DIR__ . '/../helpers/Database.php';


// ! création de la classe
class Performance
{

    // ! création des attributs
    private string $titlePerformance;
    private string $description;
    private int $price;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?int $id_performance;
    private ?int $id_category;
    private ?int $id_user;


    // ! création de la méthode magique construct
    public function __construct(string $titlePerformance = '', string $description = '', int $price = 0, ?string $created_at = NULL, ?string $updated_at = NULL, ?string $deleted_at = NULL, ?int $id_performance = NULL, ?int $id_category = NULL, ?int $id_user = NULL)
    {
        $this->titlePerformance = $titlePerformance;
        $this->description = $description;
        $this->price = $price;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->id_performance = $id_performance;
        $this->id_user = $id_category;
        $this->id_user = $id_user;
    }


    // ! création des getters


    /**
     * @return string
     */
    public function getTitlePerformance(): string
    {
        return $this->titlePerformance;
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
    public function getIdCategory(): ?int
    {
        return $this->id_category;
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
     * @param string $titlePerformance
     * 
     * @return [type]
     */
    public function setTitlePerformance(string $titlePerformance)
    {
        $this->titlePerformance = $titlePerformance;
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
     * @param int|null $id_category
     * 
     * @return [type]
     */
    public function setIdCategory(?int $id_category)
    {
        $this->id_category = $id_category;
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

        //Insertion des données de la table performances
        $sql = 'INSERT INTO `performances` (`id_performance`, `titlePerformance`, `description`, `price`, `id_category`, `id_user`) 
                VALUES (:id_performance, :titlePerformance, :description, :price, :id_category, :id_user);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_performance', $this->getIdPerformance(), PDO::PARAM_INT);
        $sth->bindValue(':titlePerformance', $this->getTitlePerformance());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':price', $this->getPrice());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);
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

        /*Sélectionne toutes les valeurs communes de la table performances et categories*/
        $sql = 'SELECT * 
                FROM performances
                INNER JOIN categories ON categories.id_category = performances.id_category
                WHERE id_performance';

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

        /*Sélectionne toutes les valeurs dans la table performances*/
        $sql = 'SELECT *    
                FROM `performances` 
                WHERE `id_performance`=:id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public static function getIdCat(int $id): array|false
    {
        $pdo = Database::connect();

        // Sélectionner les colonnes nécessaires de la table performances et categories
        $sql = 'SELECT categories.picture, performances.titlePerformance, performances.description, performances.price, performances.id_category, performances.id_performance, categories.category   
                FROM `performances` 
                INNER JOIN `categories`ON `performances`.`id_category` = `categories`.`id_category` 
                WHERE `performances`.`id_category`=:id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

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
                SET `id_category` = :id_category,
                    `titlePerformance` = :titlePerformance, 
                    `description` = :description,
                    `price` = :price
                WHERE `id_performance` = :id';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);
        $sth->bindValue(':titlePerformance', $this->getTitlePerformance());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':price', $this->getPrice());
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

        //Suppression des données de la table performances en fonction de l'id_performance
        $sql = 'DELETE 
                FROM performances 
                WHERE id_performance = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }



    /**
     * @param string $titlePerformance
     * 
     * @return object
     */
    public static function getByTitle(string $titlePerformance): object|false
    {
        $pdo = Database::connect();

        /*Sélectionne toutes les valeurs dans la table performances en fonction du titre*/
        $sql = 'SELECT *
                FROM `performances`
                WHERE `titlePerformance` = :titlePerformance;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':titlePerformance', $titlePerformance);
        $sth->execute();

        if ($sth->rowCount() > 0) {
            $row = $sth->fetch(PDO::FETCH_OBJ);
            return $row;
        }

        return null;
    }


    /**
     * @param mixed $titlePerformance
     * 
     * @return bool
     */
    public static function isExist($titlePerformance): bool
    {
        $pdo = Database::connect();

        //selectionne tous les id_performance en fonction du titre
        $sql = 'SELECT COUNT(`id_performance`) AS "count"
                FROM `performances` 
                WHERE `titlePerformance` = :title;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':title', $titlePerformance, PDO::PARAM_STR);
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
