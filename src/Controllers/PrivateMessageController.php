<?php

namespace App\Controllers;

use App\Models\PrivateMessage;
use Auth;
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

        date_default_timezone_set('Europe/Paris');
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


    public function update()
    {

        $idUser1 = $_POST['idUser1'];
        $idUser2 = $_POST['idUser2'];
        $timeMessage = $_POST['timeMessage'];

        $pvMsg = $this->getPrivateMessageByIds($idUser1, $idUser2, $timeMessage);

        if ($pvMsg->getIdUser1() == Auth::getSessionUserId()){
            errors('Vous ne pouvez pas signaler votre propre message');
            redirectAndExit(self::URL_INDEX);
        }

        if ($pvMsg->getIsReported() == 1){
            errors('Déjà signalé');

            redirectAndExit(self::URL_INDEX);
        }
        $pvMsg->setIsReported(1);

        errors('Message signalé');
         $pvMsg->save();
    }

    public function getPrivateMessageByIds(?int $idUser1, int $idUser2, string $timeMessage) : PrivateMessage
    {
        if (!$idUser1 || !$idUser2 || !$timeMessage){
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }

        $pvMsg =  DB::fetch(
            "SELECT * FROM sendprivatemessages".
            " WHERE timeMessage = :timeMessage".
            " AND (idUser1 = :idUser1 and idUser2 = :idUser2".
            " or idUser1 = :idUser2 and idUser2 = :idUser1)",

            ['idUser1' => $idUser1,
             'idUser2' => $idUser2,
             'timeMessage' => $timeMessage]
        );
        if ($pvMsg === false) {
            errors('Une erreur est survenue. Veuillez ré-essayer plus tard.');
            redirectAndExit(self::URL_INDEX);
        }
        if (empty($pvMsg)) {
            errors('404. Page introuvable');
            redirectAndExit(self::URL_INDEX);
        }

        return PrivateMessage::hydrate($pvMsg[0]);
    }

    public function getMyMsgs()
    {
        $userId = Auth::getSessionUserId();

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


}