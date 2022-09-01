<?php

namespace App\classes;

use SimpleMail;

class Mailer
{
    public static function mail($name, $phone, $email){
        SimpleMail::make()
            ->setTo("prog@it-delta.ru", 'Тестовое задание')
            ->setSubject("Новая заявка на сайте")
            ->setMessage("<strong>Имя:</strong> {$name} <br> <strong>Почта:</strong> {$email} <br><strong>Номер телефона:</strong> {$phone} <br>")
            ->setHtml()
            ->send();

    }
}