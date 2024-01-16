<?php

namespace App\Controllers;

use App\Models\Faq;

class FaqController
{

    // todo: change url
    const URL_FAQ = '/admin/faq/index.php';


    /**
     * Save FAQ
     */
    public static function index()
    {
        return FAQ::getAllFaqList();
    }

    public function storeFaq(): void
    {
        // Prepare POST
        $question =$_POST['question'] ?? '';
        $answer = $_POST['answer'] ?? '';

        if(!$question and !$answer){
            FAQ::hydrate($_POST);
            FAQ::save();
        } else {
            $_SESSION['message'] = "Erreur lors de l'enregistrement";
            $_SESSION['type'] = 'danger';
        }

        redirectAndExit(self::URL_FAQ);
    }

    /**
     * Update FAQ
     */
    public function updateFaq(): void
    {
        // Prepare POST
        $id =$_POST['idFaq'] ?? '';
        $question = $_POST['question'] ?? '';
        $answer = $_POST['answer'] ?? '';

        if(!$id and !$question and !$answer){
            FAQ::hydrate($_POST);
            FAQ::update();
        } else {
            $_SESSION['message'] = "Erreur lors de la mise à jour";
            $_SESSION['type'] = 'danger';
        }


        redirectAndExit(self::URL_FAQ);
    }

    /**
     * Delete FAQ
     */
    public function deleteFaq(): void
    {
        // Prepare POST
        $id = $_POST['idFaq'] ?? '';

        if(!$id){
            FAQ::hydrate($_POST);
            FAQ::delete();
        } else {
            $_SESSION['message'] = "Erreur de traitement";
            $_SESSION['type'] = 'danger';
        }

        redirectAndExit(self::URL_FAQ);
    }

}