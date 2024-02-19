
<?php

require_once __DIR__ . '/../helpers/Database.php';


// ! création de la classe
class Picture
{

    // ! création des attributs
    private string $pictureTitle;
    private int $price;
    private ?string $picture;
    private ?string $description;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?int $id_picture;
    private ?int $id_category;
    private ?int $id_user;



    // ! création de la méthode magique construct
    public function __construct(string $pictureTitle = '', int $price = 0, ?string $picture = '', ?string $description = '', ?string $created_at = NULL, ?string $updated_at = NULL, ?string $deleted_at = NULL, ?int $id_picture = NULL, ?int $id_category = NULL, ?int $id_user = NULL)
    {
        $this->pictureTitle = $pictureTitle; 
        $this->price = $price;
        $this->picture = $picture;
        $this->description = $description;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->id_picture = $id_picture;
        $this->id_category = $id_category;
        $this->id_user = $id_user;
    }


    // ! création des getters

    /**
     * @return string
     */
    public function getPictureTitle(): string
    {
        return $this->pictureTitle;
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
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
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
    public function getIdPicture(): ?int
    {
        return $this->id_picture;
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
     * @param string $pictureTitle
     * 
     * @return [type]
     */
    public function setPictureTitle(string $pictureTitle)
    {
        $this->pictureTitle = $pictureTitle;
    }

    /**
     * @param string|null $price
     * 
     * @return [type]
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }

    /**
     * @param string $picture
     * 
     * @return [type]
     */
    public function setPicture(?string $picture)
    {
        $this->picture = $picture;
    }

    /**
     * @param string|null $description
     * 
     * @return [type]
     */
    public function setDescription(?string $description)
    {
        $this->description = $description;
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
     * @param int|null $id_picture
     * 
     * @return [type]
     */
    public function setIdPicture(?int $id_picture)
    {
        $this->id_picture = $id_picture;
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

        $sql = 'INSERT INTO `pictures` (`pictureTitle`, `price`, `picture`, `description`, `id_category`) 
                VALUES (:pictureTitle, :price, :picture, :description, :id_category);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':pictureTitle', $this->getPictureTitle());
        $sth->bindValue(':price', $this->getPrice(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getpicture());
        $sth->bindValue(':description', $this->getDescription());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        $sth->execute();
        $nbrows = $sth->rowCount();

        return $nbrows > 0 ? true : false;
    }


    /**
     * @return [type]
     */
    public static function getAll(int $id_category = 0)
    {
        $pdo = Database::connect();

        /*Sélectionne toutes les valeurs dans la table categories*/
        $sql = 'SELECT categories.category, pictures.pictureTitle, pictures.picture, pictures.description, pictures.id_picture, pictures.price, pictures.id_category
                FROM pictures
                INNER JOIN categories ON pictures.id_category = categories.id_category';
                
        // Ajouter la clause WHERE si id_category est spécifié
        if ($id_category != 0) {
            $sql .= ' WHERE pictures.$id_category = :id_category';
        }

        $sth = $pdo->prepare($sql);

        // Bind $id_category si spécifié
        if ($id_category != 0) {
            $sth->bindValue(':$id_category', $id_category, PDO::PARAM_INT);
        }

        $sth->execute();

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
                FROM `pictures` 
                WHERE `id_picture`=:id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }



    /**
     * @param int $id
     * 
     * @return [type]
     */
    public static function getIdCat(int $id)
    {
        $pdo = Database::connect();

        $sql = 'SELECT `pictures`.`picture`, `pictures`.`id_category`
                FROM `pictures` 
                INNER JOIN `categories` ON `pictures`.`id_category` = `categories`.`id_category`
                WHERE `pictures`.`id_category`=:id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetchALL(PDO::FETCH_OBJ);

        return $result;
    }


    /**
     * @return bool
     */
    public function update(): bool
{
    $pdo = Database::connect();

    $sql = 'UPDATE `pictures` 
            SET `pictureTitle` = :pictureTitle, `price` = :price, `picture` = :picture, `description` = :description, `id_category` = :id_category
            WHERE `id_picture` = :id_picture;';

    $sth = $pdo->prepare($sql);

    $sth->bindValue(':pictureTitle', $this->getPictureTitle());
    $sth->bindValue(':price', $this->getPrice(), PDO::PARAM_INT);
    $sth->bindValue(':picture', $this->getPicture());
    $sth->bindValue(':description', $this->getDescription());
    $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);
    $sth->bindValue(':id_picture', $this->getIdPicture(), PDO::PARAM_INT);

    $sth->execute();
    $nbrows = $sth->rowCount();

    return $nbrows > 0 ? true : false;
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
                FROM pictures 
                WHERE id_picture = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }


    /**
     * @param mixed $picture
     * 
     * @return [type]
     */
    public function getIdUserByPicture($picture)
    {
        $pdo = Database::connect();

        $sql = "SELECT id_picture 
                FROM pictures 
                WHERE picture = :picture";

        $sth = $pdo->prepare($sql);
        $sth->bindParam(':picture', $picture, PDO::PARAM_STR);
        $sth->execute();

        if ($sth->rowCount() > 0) {
            $row = $sth->fetch(PDO::FETCH_OBJ);
            return $row['id_picture'];
        }

        return null;
    }

    /**
     * @param string $picture
     * 
     * @return object
     */
    public static function getByPicture(string $picture): object|false
    {
        $pdo = Database::connect();
        $sql = 'SELECT *
                FROM `pictures`
                WHERE `picture` = :picture;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':picture', $picture);
        $sth->execute();

        if ($sth->rowCount() > 0) {
            $row = $sth->fetch(PDO::FETCH_OBJ);
            return $row;
        }

        return null;
    }


    /**
     * @param mixed $picture
     * 
     * @return bool
     */
    public static function isExist($picture): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_picture`) AS "count"
                FROM `pictures` 
                WHERE `picture` = :picture;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':picture', $picture, PDO::PARAM_STR);
        $sth->execute();

        $count = $sth->fetchColumn();

        return (bool) $count > 0;
    }
}