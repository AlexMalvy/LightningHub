<?php

class Auth {
    const SESSION_KEY = 'user';

    private static ?array $user = null;

    public static function getCurrentUser() : ?array
    {
        $id = self::getSessionUserId();

        if (self::$user === null and $id) {
            self::$user = DB::fetch(
                "SELECT * FROM users WHERE idUser = :id LIMIT 1",
                ['id' => $id]
            );

            if (self::$user === false) {
                self::$user = null;
            } else if (self::$user) {
                self::$user = self::$user[0] ?? null;

                // Not found in records
                if (empty(self::$user)) {
                    self::removeSessionUserId();
                }
            }
        }

        return self::$user;
    }

    public static function isAuthOrRedirect() : void
    {
        // Check user is auth
        if (!Auth::getCurrentUser()) {
            // Not Auth Or account not exists
            errors('Vous devez être connecté pour accéder à cette page.');
            redirectAndExit('/login.php');
        }
    }

    public static function isGuestOrRedirect() : void
    {
        // Check user is guest (invité)
        if (Auth::getCurrentUser()) {
            redirectAndExit('/home.php');
        }
    }

    public static function getSessionUserIdKey() : string
    {
        return self::SESSION_KEY;
    }

    public static function getSessionUserId() : ?int
    {
        return $_SESSION[self::getSessionUserIdKey()] ?? null;
    }

    public static function removeSessionUserId() : void
    {
        unset($_SESSION[self::getSessionUserIdKey()]);
    }
}
