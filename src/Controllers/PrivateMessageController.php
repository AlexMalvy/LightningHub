<?php

namespace App\Controllers;

use App\Models\PrivateMessage;
use DB;

class PrivateMessageController
{
    const URL_INDEX = '/socials.php';
    const URL_HANDLER = '/handlers/privateMessage-handler.php';

    public function store() : void
    {

        // Prepare POST
        $message = $_POST['message'] ?? '';

        $_SESSION['old'] = [
            'message' => $message,
        ];

        // Prepare GET
        $idUser1 = $_GET['idUser1'];
        $idUser2 = $_GET['idUser2'];

        // Validation
        if (!$message) {
            errors("Le message est vide.");
            redirectAndExit(self::URL_INDEX);
        }

        // Create new private message
        $result = DB::statement(
            "INSERT INTO sendprivatemessages(idUser1, idUser2, timeMessage, message, isReported)"
            ." VALUE(:idUser1, :idUser2, :timeMessage, :message, :isReported);",
            [
                'idUser1' => $idUser1,
                'idUser2' => $idUser2,
                'timeMessage' => date('Y-m-d H:i:s'),
                'message' => $message,
                'isReported' => 0,
            ]
        );
        if ($result === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }

        // Redirection
        redirectAndExit(self::URL_INDEX);
    }

    public function hydrate(array $requests): array
    {
        foreach ($requests as $key => $request) {
            $requests[$key] = PrivateMessage::hydrate($request);
        }
        return $requests;
    }

//    public function delete()
//    {
//        $idUser = $_POST['id'] ?? null;
//        $social = $this->getSocialByFriend($idUser);
//        //dd($social);
//        // Delete a product in DB
//        $social->delete();
//
//        redirectAndExit(self::URL_INDEX);
//    }

//    protected function getSocialByFriend(?int $idFriend): Social
//    {
//        if (!$idFriend) {
//            errors('404. Page introuvable');
//            redirectAndExit(self::URL_INDEX);
//        }
//        $myId = 1; // A changer
//        $product = DB::fetch(
//            "SELECT * FROM isfriend WHERE idUser1 = :myId and idUser2 = :idFriend or idUser1 = :idFriend and idUser2 = :myId",
//            ['myId' => $myId, 'idFriend' => $idFriend]
//        );
//        if ($product === false) {
//            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
//            redirectAndExit(self::URL_INDEX);
//        }
//        if (empty($product)) {
//            errors('404. Page introuvable');
//            redirectAndExit(self::URL_INDEX);
//        }
//        return Social::hydrate($product[0]);
//    }

}