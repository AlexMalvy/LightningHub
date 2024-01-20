<?php

namespace App\Models;

use DB;

class Faq
{
    protected static array $allFaqList = [];
    protected int $id;
    protected string $question;
    protected string $answer;


    /**
     * Hydrate FAQ
     */
    public static function hydrate(array $data): FAQ
    {
        $faq = new Faq();

        $faq->setId($data['idFaq']);
        $faq->setQuestion($data['question'] ?? '' );
        $faq->setAnswer($data['answer'] ?? '');

        return $faq;
    }


    /**
     * Save FAQ
     */
    public function save(): int|false
    {

        return DB::statement(
            "INSERT INTO faq (question, answer) VALUES (:question, :answer)",
            [
                'question' => $this->question,
                'answer' => $this->$answer,
            ],
        );
    }

    /**
     * Update FAQ
     */
    public function update(): int|false
    {
        return DB::statement(
            "UPDATE faq SET question = :question, answer = :answer WHERE idFaq = :id",
            [
                'question' => $this->question,
                'answer' => $this->answer,
                'id' => $this->id,
            ],
        );
    }

    /**
     * Delete FAQ
     */
    public function delete(): int|false
    {
        return DB::statement(
            "DELETE FROM faq WHERE idFaq = :id",
            [
                'id' =>$this->id,
            ],
        );
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {

        $this->id = $id;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public  function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    public  function getAnswer(): string
    {
        return $this->answer;
    }

    public  function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }

    public static function getAllFaqList(): array
    {
        return self::$allFaqList = DB::fetch("SELECT * FROM faq");
    }

    public static function setAllFaqList(array $allFaqList): void
    {
        self::$allFaqList = $allFaqList;
    }

}
