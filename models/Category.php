
<?php

require_once __DIR__ . '/../helpers/Database.php';


// ! création de la classe
class Category
{

    // ! création des attributs
    private ?int $id_category; // le ? précise si la donnée est obligatoire ou pas
    private string $name;


    // ! création de la méthode magique construct
    public function __construct(string $name = '', ?int $id_category = NULL)
    {
        $this->name = $name;
        $this->id_category = $id_category;
    }


    // ! création des getters
    /**
     * retourne la valeur de id_category
     * @return int
     */
    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }
    /**
     * retourne la valeur de name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    // ! création des setters
    /**
     * modifies la valeur de id_category
     * @param int $id_category
     * 
     * @return [type]
     */
    public function setIdCategory(?int $id_category)
    {
        $this->id_category = $id_category;
    }
    /**
     * modifies la valeur de name
     * @param string $name
     * 
     * @return [type]
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }


    // ! création de ma méthode
    /**
     * @return [type]
     */
    public function insert()
    {
        // $pdo = new PDO(DSN, USERNAME, PASSWORD);
        $pdo = Database::connect(); //autre méthode pour se connecter an appelant le fichier helpers/Database et en appelant la méthode connect()

        $sql =  'INSERT INTO
                `categories`(`name`)
                VALUES
                (:name);'; // on utilise les marqueurs dans la classe PDO et non pas les variables (sécurité)

        $sth = $pdo->prepare($sql); // méthode de la classe PDO
        $sth->bindValue(':name', $this->getName()); // méthode de la classe PDOStatement, qui est retournée par prepare()
        $result = $sth->execute(); // méthode de la classe PDOStatement
        
        return $result;
    }


    /**
     * @return [type]
     */
    public static function getAll() 
    {
        $pdo = Database::connect(); 

        //gérer les erreurs et les exceptions (a utiliser uniquement sur php 7)
        // $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*Sélectionne toutes les valeurs dans la table categories*/
        $sql = 'SELECT * FROM categories'; 
        // $sql = 'SELECT `name`, ìd_category` FROM `categories`;' //autre méthode en choisissant les colonnes 
        
        $sth = $pdo->prepare($sql);
        $sth->execute();
        // $sth = $pdo->query($sql); //autre méthode a la place de prepare() et execute() mais uniquement lorsqu'il n'y a pas de marqueurs nominatifs
        
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

        $sql = 'SELECT *    
                FROM `categories` 
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
        
        // Requête mysql pour insérer des données
        $sql = 'UPDATE `categories` 
                SET `name` = :name 
                WHERE `id_category` = :id';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name', $this->getName());
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

        $sql = 'DELETE 
                FROM categories 
                WHERE id_category = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }


    /**
     * @return [type]
     */
    public static function isExist(string $name): bool { //static : pas besoin de creer un nouvel objet pour utiliser cette méthode
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(*) AS `nbcolumn`
                FROM `categories` 
                WHERE `name`= :name;';
                
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':name', $name, PDO::PARAM_STR);
        $sth->execute();

        $result = $sth->fetchColumn();

        return $result > 0;
    }
    
}