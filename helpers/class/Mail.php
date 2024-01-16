<?php

require_once __DIR__.'/../../bootstrap/app.php';

use Nette\Mail\Message;
use Nette\Mail\SmtpMailer;

class Mail
{
    public static function sendMail()
    {

        $mail = new Message;
        $mail->setFrom($_POST['mail'])
            ->addTo('recipient@example.com')
            ->setBody($_POST['message']);

        $mailer = new SmtpMailer(
            host: '',
            username: '',
            password: '',
            port: 587,
            encryption: Nette\Mail\SmtpMailer::EncryptionSSL,
        );

        $mailer->send($mail);
    }
}

