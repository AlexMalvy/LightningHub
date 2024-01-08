<?php

namespace Models;

use DB;

class User 
{
    protected ?int $id;
    protected ?string $userName;
    protected ?string $password;
    protected ?string $mail;
    protected ?string $profilPicture;
    protected \DateTimeImmutable $dateSignUp;
    protected ?\DateTimeImmutable $dateLastConnection;
    protected ?bool $notificationEnabled;
    protected ?bool $isAdmin;
    protected ?bool $isRoomOwner;


    public function __construct(string $userName, string $email, string $password)
    {
        $this->userName = $userName;
        $this->mail = $email;
        $this->password = $password;
    }
    

    /**
     * Create New User
     */ 
    public function save() : int|false
    {
        /**
         * Secure password with hash method
         */
        $hachedpPassword = password_hash($this->password, PASSWORD_DEFAULT);

        return DB::statement(
            "INSERT INTO users (username, password, mail)"
            ." VALUES (:userName, :password, :mail)",
            [
                'userName' => $this->userName,
                'password' => $hachedpPassword,
                'mail' => $this->mail,
            ],
        );
    }

    public function AlreadyExistUser(): bool
    {
        // Check User
        $users = DB::fetch("SELECT * FROM Users WHERE mail = :email;", ['email' => $this->mail]);
        if (count($users) >= 1) {
            return true;
        }

        return false;
    }


     /**
     * Get the value of id
     */ 
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id): int
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of userName
     */ 
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * Set the value of userName
     *
     * @return  self
     */ 
    public function setUserName($userName): string
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password): string
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email): string
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of profilPicture
     */ 
    public function getProfilPicture(): string
    {
        return $this->profilPicture;
    }

    /**
     * Set the value of profilPicture
     *
     * @return  self
     */ 
    public function setProfilPicture($profilPicture): string
    {
        $this->profilPicture = $profilPicture;

        return $this;
    }

    /**
     * Get the value of dateSignUp
     */ 
    public function getDateSignUp(): dateTimeImmutable
    {
        return $this->dateSignUp;
    }

    /**
     * Set the value of dateSignUp
     *
     * @return  self
     */ 
    public function setDateSignUp($dateSignUp): dateTimeImmutable
    {
        $this->dateSignUp = $dateSignUp;

        return $this;
    }

    /**
     * Get the value of dateLastConnection
     */ 
    public function getDateLastConnection(): dateTimeImmutable
    {
        return $this->dateLastConnection;
    }

    /**
     * Set the value of dateLastConnection
     *
     * @return  self
     */ 
    public function setDateLastConnection($dateLastConnection):  dateTimeImmutable
    {
        $this->dateLastConnection = $dateLastConnection;

        return $this;
    }

    /**
     * Get the value of notificationEnabled
     */ 
    public function getNotificationEnabled(): bool
    {
        return $this->notificationEnabled;
    }

    /**
     * Set the value of notificationEnabled
     *
     * @return  self
     */ 
    public function setNotificationEnabled($notificationEnabled): bool
    {
        $this->notificationEnabled = $notificationEnabled;

        return $this;
    }

    /**
     * Get the value of isAdmin
     */ 
    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }

    /**
     * Set the value of isAdmin
     *
     * @return  self
     */ 
    public function setIsAdmin($isAdmin): bool
    {
        $this->isAdmin = $isAdmin;

        return $this;
    }

    /**
     * Get the value of isRoomOwner
     */ 
    public function getIsRoomOwner(): bool
    {
        return $this->isRoomOwner;
    }

    /**
     * Set the value of isRoomOwner
     *
     * @return  self
     */ 
    public function setIsRoomOwner($isRoomOwner): bool
    {
        $this->isRoomOwner = $isRoomOwner;

        return $this;
    }

}
