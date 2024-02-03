
<?php

require_once __DIR__ . '/../helpers/Database.php';


// ! création de la classe
class Message
{

    // ! création des attributs
    private string $message;
    private string $lastname;
    private string $firstname;
    private string $performance;
    private ?string $reading;
    private ?string $created_at;
    private ?string $deleted_at;
    private ?int $id_message;
    private ?int $id_user;


    // ! création de la méthode magique construct
    public function __construct(string $message = '', string $lastname = '', string $firstname = '', string $performance = '', ?string $reading = '', ?string $created_at = NULL, ?string $deleted_at = NULL, ?int $id_message = NULL, ?int $id_user = NULL)
    {
        $this->message = $message;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->performance = $performance;
        $this->reading = $reading;
        $this->created_at = $created_at;
        $this->deleted_at = $deleted_at;
        $this->id_message = $id_message;
        $this->id_user = $id_user;
    }


    // ! création des getters
    
    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
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
    public function getPerformance(): string
    {
        return $this->performance;
    }
    
    /**
     * @return string
     */
    public function getReading(): ?string
    {
        return $this->reading;
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
    public function getDeletedAt(): ?string
    {
        return $this->deleted_at;
    }
    
    /**
     * @return int|null
     */
    public function getIdMessage(): ?int
    {
        return $this->id_message;
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
     * @param string $message
     * 
     * @return [type]
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
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
     * @param string $performance
     * 
     * @return [type]
     */
    public function setPerformance(string $performance)
    {
        $this->$performance = $performance;
    }
    
    /**
     * @param string $reading
     * 
     * @return [type]
     */
    public function setReading(?string $reading)
    {
        $this->reading = $reading;
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
     * @param string $deleted_at
     * 
     * @return [type]
     */
    public function setDeletedAt(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
    
    /**
     * @param int|null $id_message
     * 
     * @return [type]
     */
    public function setIdMessage(?int $id_message)
    {
        $this->id_message = $id_message;
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

        $sql = 'INSERT INTO `messages` (`id_message`, `message`, `lastname`, `firstname`, `performance`, `reading`, `id_user`) 
                VALUES (:id_message, :message, :lastname, :firstname, :performance, :reading, :id_user);';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_message', $this->getIdMessage(), PDO::PARAM_INT);
        $sth->bindValue(':message', $this->getMessage());
        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':performance', $this->getPerformance());
        $sth->bindValue(':reading', $this->getReading());
        $sth->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);

        $sth->execute();
        $nbrows = $sth->rowCount();

        return $nbrows > 0 ? true : false;
    }


    /**
     * @return [type]
     */
    public static function getAll(int $id_user = 0)
    {
        $pdo = Database::connect();

        /*Sélectionne toutes les valeurs dans la table messages*/
        $sql = 'SELECT * FROM messages
                LEFT OUTER JOIN users ON messages.id_user = users.id_user';

        // Ajouter la clause WHERE si id_user est spécifié
        if ($id_user != 0) {
            $sql .= ' WHERE messages.id_user = :id_user';
        }

        $sth = $pdo->prepare($sql);

        // Bind id_user si spécifié
        if ($id_user != 0) {
            $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);
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
    public static function get(int $id): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT *    
                FROM `messages` 
                WHERE `id_message`=:id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

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
                FROM messages 
                WHERE id_message = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }

}
