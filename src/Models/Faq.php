<?php

namespace App\Models;

use DB;

class Faq
{
    protected static array $allFaqList = [];
    protected static int $id;
    protected static string $question;
    protected static string $answer;


    /**
     * Hydrate FAQ
     */
    public static function hydrate(array $data): void
    {
        self::$id = $data['idFaq'];
        self::$question = $data['question'];
        self::$answer = $data['answer'];
    }


    /**
     * Save FAQ
     */
    public static function save(): int|false
    {
        return DB::statement(
            "INSERT INTO faq (question, answer) VALUES (:question, :answer)",
            [
                'question' => self::$question,
                'answer' => self::$answer,
            ],
        );
    }

    /**
     * Update FAQ
     */
    public static function update(): int|false
    {
        return DB::statement(
            "UPDATE faq SET question = :question, answer = :answer WHERE idFaq = :id",
            [
                'question' => self::$question,
                'answer' => self::$answer,
                'id' => self::$id,
            ],
        );
    }

    /**
     * Delete FAQ
     */
    public static function delete(): int|false
    {
        return DB::statement(
            "DELETE * FROM faq WHERE idFaq = :id",
            [
                'id' => self::$id,
            ],
        );
    }


    public static function getId(): int
    {
        return self::$id;
    }

    public static function setId(int $id): void
    {
        self::$id = $id;
    }

    public static function getQuestion(): string
    {
        return self::$question;
    }

    public static function setQuestion(string $question): void
    {
        self::$question = $question;
    }

    public static function getAnswer(): string
    {
        return self::$answer;
    }

    public static function setAnswer(string $answer): void
    {
        self::$answer = $answer;
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
