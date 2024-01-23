<?php

namespace App\Controllers\admin;


use DB;
use Datetime;

class ModerationController
{

    /**
     * Select all Ban type
     */
    public static function selectAllTypes()
    {
        return $bans = DB::fetch("SELECT * FROM BanTypes");
    }

    /**
     * create Ban
     */
    public static function storeBan(): void
    {
        AdminController::isAdmin();
        // Prepare POST
        $typeBan =$_POST['BanType'] ?? '';
        $description = $_POST['description'] ?? '';
        $duration = $_POST['duration'] ?? '';
        $idUser = $_POST['userId'] ?? '';

        $startingDate = new DateTime();
        $formattedStartingDate = $startingDate->format('Y-m-d H:i:s');

        if($typeBan and $description){
            DB::fetch("INSERT INTO Moderations (description, startingDate, duration, idBanType, idUser)" .
                "VALUES(:description, :startingDate, :duration, :idBanType, :idUser)",
                [
                'description' => $description,
                'startingDate' => $formattedStartingDate,
                'duration' => $duration,
                'idBanType' => $typeBan,
                'idUser' => $idUser
                ],
            );
        } else {
            $_SESSION['message'] = "Erreur lors de l'enregistrement";
            $_SESSION['type'] = 'danger';
        }

        require_once base_path('view/admin/user/index.php');

    }


    /**
     * Select Ban type by user id
     */
    public static function selectBanById(int $id)
    {

         return $userBans = DB::fetch("SELECT nameBan, idUser FROM BanTypes
                                           INNER JOIN Moderations
                                           ON Moderations.idBanType = Bantypes.idBanType
                                           WHERE idUser = :idUser ORDER BY startingDate DESC LIMIT 1",
                                                [
                                                    'idUser' => $id,
                                                ]
                                    );
    }


    public static function countReportsById(int $id)
    {
        return $numberUserReports = DB::fetch("SELECT COUNT(*) AS report FROM Moderations
                                                    WHERE idUser = :idUser",
                                                    [
                                                        'idUser' => $id,
                                                    ]
        );

    }

}