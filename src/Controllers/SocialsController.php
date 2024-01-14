<?php

namespace App\Controllers;

use App\Models\PrivateMessage;
use Auth;
use DB;
use App\Models\Social;
use App\Models\User;


// TODO: voir si la requete de la recup des msg prend en compte le booleen de signal // CHECK
// TODO: faire gaffe String / Time
// TODO: page de connexion qui naffiche pas les erreurs
class SocialsController
{
    const URL_CREATE = '/social-create.php';
    const URL_INDEX = '/socials.php';
    //const URL_HANDLER_MSG = '/handlers/privateMessage-handler.php';
    const URL_HANDLER_SOC = '/handlers/socials-handler.php';

    public function index()
    {
        Auth::isAuthOrRedirect();
        // Friends recovery + hydration. For displaying conversations with friends
        $friends =  $this->hydrateUsers($this->getFriends());

        // Retrieving the id + username of non-friend users, to transmit them to the js
        // and make a dynamic display when searching for new friends
        $nonFriendsNames = $this->getNonFriendsNames();

        // FRIENDS LIST TAB
        $friendsConnected = $this->hydrateUsers($this->getConnectedFriends()); // to display connected friends
        $friendsDisconnected  = $this->hydrateUsers($this->getDisconnectedFriends()); // to display disconnected friends


        $currentUser = Auth::getCurrentUser();

        // updates the last login date every time he is on this page
        $currentUserObj = User::hydrate($currentUser);
        date_default_timezone_set('Europe/Paris');
        //$currentUserObj->setDateLastConnection(date('Y-m-d H:i:s'));
        $currentUserObj->setDateLastConnection(new \DateTimeImmutable);
        $currentUserObj->updateDateLastConnection();

        // FRIENDS REQUESTS LIST TAB
        $requests = $this->hydrateUsers($this->getFriendRequests());


        // MESSAGES
        $myMsgs = (new PrivateMessageController)->getMyMsgs();
        $tabUsers = $this->hydrateUsers($myMsgs);
        $tabMsgs = (new PrivateMessageController)->hydrate($myMsgs);

        $actionUrlSoc = self::URL_HANDLER_SOC;
        $actionUrlMsg = PrivateMessageController::URL_HANDLER;
        require_once base_path('view/socials/index.php');
    }



    public function store()
    {
        $myId = Auth::getSessionUserId();
        if (!$_POST['searchFriend']) {
            errors('Veuillez entrer un nom');
            redirectAndExit(self::URL_CREATE);
        }

        $idUser2 = explode('#', $_POST['searchFriend'])[1];

        // La il faut un getUserByName(string $username)
        $user = DB::fetch(
            "SELECT * FROM users WHERE idUser = :idUser2",
            ['idUser2' => $idUser2]
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


        // Save the friendship in DB
        $social->insert();

        redirectAndExit(self::URL_INDEX);
    }



    public function delete()
    {
        $idUser = $_POST['id'] ?? null;
        $social = $this->getSocialByFriend($idUser);
        // Delete a friendship in DB
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
        $social = DB::fetch(
            "SELECT * FROM isfriend WHERE idUser1 = :myId and idUser2 = :idFriend or idUser1 = :idFriend and idUser2 = :myId",
            ['myId' => $myId, 'idFriend' => $idFriend]
        );
        if ($social === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        if (empty($social)) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }
        return Social::hydrate($social[0]);
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



    public function update()
    {
        $id = $_POST['id'] ?? null;
        $social = $this->getSocialByFriend($id);

        if (isset($_POST['accepted'])) {
            $social->setAccepted($_POST['accepted'] == 1 ? 1 : 0);
        }

        // Update the friendship in DB
        $result = $social->save();
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
        } else {
            success('Le produit a bien été modifié.');
        }

        // redirectAndExit(self::URL_EDIT.'?id='.$social->getId());
    }

    public function getNonFriendsNames(): string
    {
        //$users = $this->getUsers();
        $friends = self::getNonFriends();

        $usernames = [];
        foreach ($friends as $t) {
            $usernames[] = $t['username']. "#" . $t['idUser']; // like array_push
        }
        return implode(',', $usernames);
    }



    public function hydrateUsers (array $requests){ // TODO a deplacer dans USERController
        foreach ($requests as $key => $request) {
            $requests[$key] = User::hydrate($request);
        }
        return $requests;
    }

    public function getAllUsers() {


    }

}
