
<?php

require_once __DIR__ . '/../helpers/Database.php';


// ! création de la classe
class Category
{

    // ! création des attributs
    private string $category;
    private ?string $picture;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;
    private ?int $id_category; 


    // ! création de la méthode magique construct
    public function __construct(string $category = '', ?string $picture = NULL, ?string $created_at = NULL, ?string $updated_at = NULL, ?string $deleted_at = NULL, ?int $id_category = NULL)
    {
        $this->category = $category;
        $this->picture = $picture;
        $this->created_at = $created_at;
        $this->created_at = $updated_at;
        $this->deleted_at = $deleted_at;
        $this->id_category = $id_category;
    }


    // ! création des getters


    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @return string|null
     */
    public function getPicture(): ?string
    {
        return $this->picture;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    /**
     * @return string|null
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
    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }
    

    // ! création des setters

    
    /**
     * @param string $category
     * 
     * @return [type]
     */
    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    /**
     * @param string|null $picture
     * 
     * @return [type]
     */
    public function setPicture(?string $picture)
    {
        $this->picture = $picture;
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
     * @param string|null $updated_at
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
     * @param int|null $id_category
     * 
     * @return [type]
     */
    public function setIdCategory(?int $id_category)
    {
        $this->id_category = $id_category;
    }


    // ! création de mes méthodes


    /**
     * @return [type]
     */
    public function insert()
    {
        $pdo = Database::connect(); 

        //Insertion des données dans la table categories
        $sql =  'INSERT INTO `categories`(`id_category`, `category`, `picture`)
                VALUES (:id_category, :category, :picture);';  

        $sth = $pdo->prepare($sql); 
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);
        $sth->bindValue(':category', $this->getCategory());
        $sth->bindValue(':picture', $this->getPicture());
        $result = $sth->execute(); 
        
        return $result;
    }


    /**
     * @return [type]
     */
    public static function getAll() : array
    {
        $pdo = Database::connect(); 

        /*Sélectionne toutes les valeurs dans la table categories*/
        $sql = 'SELECT categories.id_category, categories.category, categories.picture
                FROM categories'; 
        
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
    public static function get(int $id): object|false
    {
        $pdo = Database::connect();

        /*Sélectionne toutes les valeurs dans la table categories*/
        $sql = 'SELECT *    
                FROM `categories` 
                RIGHT JOIN `pictures` ON `pictures`.`id_category` = `categories`.`id_category`
                WHERE `id_category`=:id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }


    /**
     * @return [type]
     */
    public function update() {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        
        // Requête mysql pour insérer des données modifiées
        $sql = 'UPDATE `categories` 
                SET `picture` = :picture 
                WHERE `id_category` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id', $this->getIdCategory(), PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }


    /**
     * @param mixed $id
     * 
     * @return [type]
     */
    public static function delete(int $id) {
        $pdo = Database::connect();

        //Suppression des données de la table categories
        $sql = 'DELETE 
                FROM categories 
                WHERE id_category = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();

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

        $sql = 'SELECT categories.id_category, categories.category, categories.picture  
                FROM `categories`
                WHERE id_category = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }


    /**
     * @return [type]
     */
    public static function isExist(string $category): bool { 
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*) AS `nbcolumn`
                FROM `categories` 
                WHERE `category`= :category;';
                
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':category', $category, PDO::PARAM_STR);
        $sth->execute();

        $result = $sth->fetchColumn();

        return $result > 0;
    }
    
}