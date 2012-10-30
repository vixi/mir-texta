<?php
// Читаем настройки config
require_once 'config.php';

// Подключаем класс FreakMailer
require_once 'MailClass.php';

// инициализируем класс
$mailer = new FreakMailer();

// Устанавливаем тему письма
$mailer->Subject = 'Это тест';

// Задаем тело письма
$mailer->Body = 'Это тест моей почтовой системы!';

// Добавляем адрес в список получателей
$mailer->AddAddress('sushkevichpavel@gmail.com', 'Pavel Sushkevich');

if(!$mailer->Send())
{
  echo 'Не могу отослать письмо!';
}
else
{
  echo 'Письмо отослано!';
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();
?>
