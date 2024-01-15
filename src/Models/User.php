<?php

namespace App\Models;

use DB;

class User 
{
    protected ?int $id;
    protected ?string $userName;
    protected ?string $password;
    protected ?string $mail;
    protected ?string $profilPicture;
    protected ?\DateTimeImmutable $signUpDate;
    protected ?\DateTimeImmutable $lastConnection;
    protected ?bool $notificationEnabled;
    protected ?bool $isAdmin;
    protected ?bool $isRoomOwner;


    public function __construct(?string $userName = null, ?string $email = null, ?string $password = null)
    {
        $this->userName = $userName;
        $this->mail = $email;
        $this->password = $password;
    }

    /**
     * Hydrate User to display
     */ 
    public static function hydrate(array $data): User
    {
        $user = new User(
            $data['IdUser'] ?? null,
            $data['username'] ?? null,
            $data['password'] ?? null,
            $data['mail'] ?? null,
            $data['profilPicture'] ?? null,
            $data['SignUpDate'] ?? null,
            $data['lastConnection'] ?? null,
            $data['notificationEnabled'] ?? null,
            $data['isAdmin'] ?? null,
            $data['isRoomOwner'] ?? null,
        );

        $user->id = $data['IdUser'] ?? null;
        $user->userName = $data['username'] ?? null;
        $user->password = $data['password'] ?? null;
        $user->mail = $data['mail'] ?? null;
        $user->profilPicture = $data['profilPicture'] ?? null;
        //$user->signUpDate = $data['SignUpDate'];
        //$user->lastConnection = $data['lastConnection'];
        $user->notificationEnabled = $data['notificationEnabled'] ?? null;
        $user->isAdmin = $data['isAdmin'] ?? null;
        $user->isRoomOwner = $data['isRoomOwner'] ?? null;

        return $user;
    }
    

    /**
     * Create New User
     */ 
    public function save() : int|false
    {
        /**
         * Secure password with hash method
         */
        $hachedPassword = password_hash($this->password, PASSWORD_DEFAULT);

        return DB::statement(
            "INSERT INTO users (username, password, mail)"
            ." VALUES (:userName, :password, :mail)",
            [
                'userName' => $this->userName,
                'password' => $hachedPassword,
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


    public function updateDateLastConnection(): int|false
    {
        return DB::statement(
            "UPDATE Users SET lastConnection = :lastConnection WHERE mail = :email",
            [
                'lastConnection' => $this->lastConnection,
                 'email' => $this->mail,
            ],
        );
    }


    public static function deleteAccount(int $id): int|false
    {
        return DB::statement(
            "DELETE FROM Users WHERE idUser = :id",
            ['id' => $id],
        );
    }

    /**
     * Save picture
     */
    public function savePicture(int $id, string $profilPicture) : int|false
    {

        return DB::statement(
            "UPDATE Users SET profilePicture = :profilPicture WHERE idUser = :id",
            [
                'profilPicture' => $profilPicture,
                'id' => $id,

            ],
        );
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
    public function setId($id)
    {
        $this->id = $id;

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
     */ 
    public function setUserName($userName)
    {
        $this->userName = $userName;
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
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->mail;
    }

    /**
     * Set the value of email
     *
     */ 
    public function setEmail($email)
    {
        $this->mail = $email;
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
     */ 
    public function setProfilPicture($profilPicture)
    {
        $this->profilPicture = $profilPicture;
    }

    /**
     * Get the value of dateSignUp
     */ 
    public function getSignUpDate(): \dateTimeImmutable
    {
        return $this->signUpDate;
    }

    /**
     * Set the value of dateSignUp
     *
     */ 
    public function setSignUpDate($signUpDate)
    {
        $this->signUpDate = $signUpDate;
    }

    /**
     * Get the value of dateLastConnection
     */ 
    public function getLastConnection(): \dateTimeImmutable
    {
        return $this->lastConnection;
    }

    /**
     * Set the value of dateLastConnection
     *
     */ 
    public function setLastConnection($lastConnection)
    {
        $this->lastConnection = $lastConnection;
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
    public function setNotificationEnabled($notificationEnabled)
    {
        $this->notificationEnabled = $notificationEnabled;
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
     */ 
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
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
     */ 
    public function setIsRoomOwner($isRoomOwner)
    {
        $this->isRoomOwner = $isRoomOwner;
    }

}
