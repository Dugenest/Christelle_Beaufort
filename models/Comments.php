<?php

require_once __DIR__ . '/../models/Users.php';
require_once __DIR__ . '/../helpers/Database.php';


// ! création de la classe
class Comment
{

    // ! création des attributs
    private string $message;
    private string $performance;
    private ?string $created_at;
    private ?string $validated_at;
    private ?string $deleted_at;
    private ?int $id_comment;
    private ?int $id_user;



    // ! création de la méthode magique construct
    public function __construct(string $message = '', string $performance = '', ?string $created_at = NULL, ?string $validated_at = NULL, ?string $deleted_at = NULL, ?int $id_comment = NULL, ?int $id_user = NULL)
    {
        $this->message = $message;
        $this->performance = $performance;
        $this->created_at = $created_at;
        $this->validated_at = $validated_at;
        $this->deleted_at = $deleted_at;
        $this->id_comment = $id_comment;
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
    public function getPerformance(): string
    {
        return $this->performance;
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
    public function getValidatedAt(): ?string
    {
        return $this->validated_at;
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
    public function getIdComment(): ?int
    {
        return $this->id_comment;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->id_user;
    }


    // ! création des Setters

    /**
     * @param string $message
     * 
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @param string $performance
     * 
     * @return void
     */
    public function setPerformance(string $performance): void
    {
        $this->performance = $performance;
    }

    /**
     * @param string|null $created_at
     * 
     * @return void
     */
    public function setCreatedAt(?string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @param string|null $validated_at
     * 
     * @return void
     */
    public function setValidatedAt(?string $validated_at): void
    {
        $this->validated_at = $validated_at;
    }

    /**
     * @param string|null $deleted_at
     * 
     * @return void
     */
    public function setDeletedAt(?string $deleted_at): void
    {
        $this->deleted_at = $deleted_at;
    }

    /**
     * @param int|null $id_comment
     * 
     * @return void
     */
    public function setIdComment(?int $id_comment): void
    {
        $this->id_comment = $id_comment;
    }

    /**
     * @param int|null $id_user
     * 
     * @return void
     */
    public function setIdUser(?int $id_user): void
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
        
        // Insérer les données dans la table comments
        $sqlInsert = 'INSERT INTO `comments` (`id_comment`, `message`, `performance`, `id_user`) 
                    VALUES (:id_comment, :message, :performance, :id_user);';
        $sthInsert = $pdo->prepare($sqlInsert);
        
        $sthInsert->bindValue(':id_comment', $this->getIdComment(), PDO::PARAM_INT);
        $sthInsert->bindValue(':message', $this->getMessage());
        $sthInsert->bindValue(':performance', $this->getPerformance());
        $sthInsert->bindValue(':id_user', $this->getIdUser(), PDO::PARAM_INT);

        $sthInsert->execute();
        $nbrows = $sthInsert->rowCount();

        return $nbrows > 0;
    }


    /**
     * @return [type]
     */
    public static function getAll(int $id_user = 0)
    {
        $pdo = Database::connect();

        
        // Sélectionner les colonnes nécessaires avec une jointure sur la table users
        $sql = 'SELECT comments.id_comment, comments.message, comments.performance, comments.created_at, users.username
            FROM comments
            INNER JOIN users ON comments.id_user = users.id_user';

        // Ajouter la clause WHERE si id_user est spécifié
        if ($id_user != 0) {
            $sql .= ' WHERE comments.id_user = :id_user';
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
    public static function getId(int $id): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT *    
                FROM `comments`
                INNER JOIN `users` ON `users`.id_user = `comments`.id_user
                WHERE `id_comment`=:id;';

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
    public static function validate(int $id)
    {
        $pdo = Database::connect();

        // Sélection du commentaire
        $sql = 'SELECT `message`
                FROM `comments` 
                WHERE `id_comment` = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $comment = $sth->fetch(PDO::FETCH_ASSOC);

        // Validation basique (ajustez selon vos critères de validation)
        if ($comment) {
            header("Location: /./controllers/home/livre_dor-ctrl.php");
            exit(); // Assurez-vous de terminer le script après la redirection
        } else {
            // Gérez le cas où le commentaire n'est pas valide selon vos besoins
            echo "Le commentaire n'est pas valide.";
        }
    }


    /**
     * @param int $id
     * 
     * @return [type]
     */
    public static function delete(int $id)
    {
        $pdo = Database::connect();

        $sql = 'DELETE 
                FROM comments 
                WHERE id_comment = :id;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $sth->execute();

        return $result;
    }
}
