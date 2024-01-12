<?php

namespace App\Controllers;

use Auth;
use DB;
use App\Models\Social;
use App\Models\User;

// TODO: signaler les messages,
// TODO: voir si la requete de la recup des msg prend en compte le booleen de signal
// TODO: séparer ce qui utilise des autres controllers
// TODO: utiliser les CURRENT_USER
// TODO: utiliser les #id partout
// TODO: gérer chaque action met a jour le "last connection"
// TODO: gérer quand y a pas de user ni connecté ni disc, ni de demandes d'ajout
class SocialsController
{
    const URL_CREATE = '/social-create.php';
    const URL_INDEX = '/socials.php';
    const URL_HANDLER_MSG = '/handlers/messages-handler.php';
    const URL_HANDLER_SOC = '/handlers/socials-handler.php';

    public function index()
    {

        $friends =  $this->hydrateUser($this->getFriends());
        $nonFriendsNames = $this->getNonFriendsNames();

        // FRIENDS LIST TAB
        $friends_connected = $this->hydrateUser($this->getConnectedFriends());
        $friends_disconnected  = $this->hydrateUser($this->getDisconnectedFriends());


        $current_user = Auth::getCurrentUser();
        // FRIENDS REQUESTS LIST TAB
        $requests = $this->hydrateUser($this->getFriendRequests());


        // MESSAGES
        $myMsgs = $this->getMyMsgs();
        $tab_users = $this->hydrateUser($myMsgs);
        $tab_msgs = (new PrivateMessageController)->hydrate($myMsgs);

        $actionUrlSoc = self::URL_HANDLER_SOC;
        $actionUrlMsg = self::URL_HANDLER_MSG;
        require_once base_path('view/socials/index.php');
    }



    public function store()
    {
        $myId = Auth::getSessionUserId();
        if (!$_POST['searchFriend']) {
            errors('Veuillez entrer un nom');
            redirectAndExit(self::URL_CREATE);
        }

        // La il faut un getUserByName(string $username)
        $user = DB::fetch(
            "SELECT * FROM users WHERE username = :username",
            ['username' => $_POST['searchFriend']]
        );
        if ($user === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        if (empty($user)) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }



        $social = new Social(
            $myId ?? null,
            $user[0]['idUser'] ?? null,
            0 ?? null
        );


        // Save the product in DB
        $social->insert();

        redirectAndExit(self::URL_INDEX);
    }



    public function delete()
    {
        $idUser = $_POST['id'] ?? null;
        $social = $this->getSocialByFriend($idUser);
        // Delete a product in DB
        $social->delete();

        redirectAndExit(self::URL_INDEX);
    }

    protected function getSocialByFriend(?int $idFriend): Social
    {
        if (!$idFriend) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }
        $myId = Auth::getSessionUserId();
        $product = DB::fetch(
            "SELECT * FROM isfriend WHERE idUser1 = :myId and idUser2 = :idFriend or idUser1 = :idFriend and idUser2 = :myId",
            ['myId' => $myId, 'idFriend' => $idFriend]
        );
        if ($product === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        if (empty($product)) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }
        return Social::hydrate($product[0]);
    }


    public function getConnectedFriends()
    {
        $friendsID = $this->getFriendsId();
        $friendsConnected = DB::fetch(
        // SQL
            "SELECT * FROM users"
            . " WHERE users.idUser IN (" . $friendsID . ")"
            . " AND TIMESTAMPDIFF(MINUTE, lastConnection, NOW()) <= 5"
            . " ORDER BY SignUpDate DESC",


        );
        if ($friendsConnected === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        return $friendsConnected;
    }


    public function getDisconnectedFriends()
    {

        $friendsID = $this->getFriendsId();
        $friendsDisconnected = DB::fetch(
        // SQL
            "SELECT * FROM users"
            . " WHERE users.idUser IN (" . $friendsID . ")"
            . " AND TIMESTAMPDIFF(MINUTE, lastConnection, NOW()) > 5"
            . " ORDER BY SignUpDate DESC",


        );
        if ($friendsDisconnected === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        return $friendsDisconnected;
    }

    public function getFriendRequests()
    {
        $userId = Auth::getSessionUserId();
        //$userId = 1;

        $requests = DB::fetch(
        // SQL
            "SELECT * FROM users"
            . " INNER JOIN isfriend ON users.idUser = isfriend.idUser1"
            . " WHERE isfriend.idUser2 = :user_id"
            . " AND accepted = 0",

            // Params
            [':user_id' => $userId],

        );
        if ($requests === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        return $requests;
    }

    public static function getFriendsId(): string
    {
        $userId = Auth::getSessionUserId();
        //$userId = 1;

        $friendsId = DB::fetch(
        // SQL
            "SELECT * FROM isfriend"
            . " WHERE (isfriend.idUser1 = :user_id OR isfriend.idUser2 = :user_id)"
            . " AND accepted = 1",

            // Params
            [':user_id' => $userId],

        );
        if ($friendsId === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        $tempFriendList = [];
        foreach ($friendsId as $friendId) {
            if ($friendId["idUser1"] === $userId) {
                array_push($tempFriendList, $friendId["idUser2"]);
            } else {
                array_push($tempFriendList, $friendId["idUser1"]);
            }
        }

        return "'" . implode("', '", $tempFriendList) . "'";
    }

    public static function getFriendsAndRequestsId(): string
    {
        $userId = Auth::getSessionUserId();
        //$userId = 1;

        $friendsId = DB::fetch(
        // SQL
            "SELECT * FROM isfriend"
            . " WHERE (isfriend.idUser1 = :user_id OR isfriend.idUser2 = :user_id)",

            // Params
            [':user_id' => $userId],

        );
        if ($friendsId === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        $tempFriendList = [];
        foreach ($friendsId as $friendId) {
            if ($friendId["idUser1"] === $userId) {
                array_push($tempFriendList, $friendId["idUser2"]);
            } else {
                array_push($tempFriendList, $friendId["idUser1"]);
            }
        }

        return "'" . implode("', '", $tempFriendList) . "'";
    }



    public function getFriends()
    {
        $friendsID = $this->getFriendsId();
        $friends = DB::fetch(
        // SQL
            "SELECT * FROM users"
            . " WHERE users.idUser IN (" . $friendsID . ")",
        );
        if ($friends === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        return $friends;
    }

    public function getNonFriends()
    {
        $userId = Auth::getSessionUserId();

        $friendsId = $this->getFriendsAndRequestsId();
        //  dd($friendsId);
        $friends = DB::fetch(
        // SQL
            "SELECT * FROM users"
            . " WHERE users.idUser NOT IN (". $friendsId . ")"
            . " AND users.idUser != :userId",

            // Params
            [':userId' => $userId],
        );
        if ($friends === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        return $friends;
    }

    public function getMyMsgs()
    {
        $userId = Auth::getSessionUserId();
        //$userId = 1;

        $myMsgs = DB::fetch(
        // SQL
            "SELECT * FROM sendprivatemessages"
            . " INNER JOIN users ON users.idUser = sendprivatemessages.idUser1"
            . " WHERE (sendprivatemessages.idUser1 = :user_id OR sendprivatemessages.idUser2 = :user_id)"
            . " ORDER BY sendprivatemessages.timeMessage",

            // Params
            [':user_id' => $userId],

        );
        if ($myMsgs === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }


        return $myMsgs;

    }


    public function update()
    {
        $id = $_POST['id'] ?? null;
        $product = $this->getSocialByFriend($id);

        if (isset($_POST['accepted'])) {
            $product->setAccepted($_POST['accepted'] == 1 ? 1 : 0);
        }

        // Update the product in DB
        $result = $product->save();
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
        } else {
            success('Le produit a bien été modifié.');
        }

        // redirectAndExit(self::URL_EDIT.'?id='.$product->getId());
    }

    public function getNonFriendsNames(): string
    {
        //$users = $this->getUsers();
        $friends = self::getNonFriends();

        $usernames = [];
        foreach ($friends as $t) {
            $usernames[] = $t['username']; // like array_push
        }
        return implode(',', $usernames);
    }



    public function hydrateUser (array $requests){
        foreach ($requests as $key => $request) {
            $requests[$key] = User::hydrate($request);
        }
        return $requests;
    }

    public function getAllUsers() {


    }

}
