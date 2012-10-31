<?php

class Authorization {

    public $messages = array();

    public function quote_smart($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = mysql_real_escape_string($value);
        return $value;
    }

    public function userRegistration() {
        if (isset($_POST[bot])) {
            echo 'Да ты ж бот!';
            return;
        }
        if (isset($_POST['email'])) {$email = $this->quote_smart($_POST['email']); if ($email == '') {unset($email);}}
        if (preg_match("^([a-zA-Z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$^", $email) == 0) {
            $this->messages[] = "Неверный формат e-mail";
            unset($email);
            }
        if (isset($_POST['password'])) {$password = md5($this->quote_smart($_POST['password'])); if ($password =='') {unset($password);}}
        /*if (preg_match("#[A-z!@\#$%^&*\(\)_\-\+:;,\.0-9]{6,20}#", $password) == 0) {
            $this->messages[] = "Неверный формат пароля";
            unset($password);
        }*/
        if (isset($_POST['wmz']))      {$wmz = $this->quote_smart($_POST['wmz']); if ($wmz =='') {unset($wmz);}}
        if (isset($_POST['wmr']))      {$wmr = $this->quote_smart($_POST['wmr']); if ($wmr =='') {unset($wmr);}}
        if (isset($_POST['yandex']))   {$yandex = $this->quote_smart($_POST['yandex']); if ($yandex =='') {unset($yandex);}}
        if (isset($email)&&isset($password)) {
            $registration_check_query = "SELECT id FROM users WHERE email='$email'";
            $registration_check_result = mysql_query($registration_check_query);
            $registration_check_row = mysql_fetch_array($registration_check_result);
            if (!empty($registration_check_row['id'])) {
                $this->messages[] = "<div class='alert alert-block'><h4>ОШИБКА!</h4>Извините, введённый вами email уже зарегистрирован. Введите другой email.</div>";
            } else {
                $registration_insert_query = "INSERT INTO users (email,password,wmz,wmr,yandex) VALUES('$email','$password','$wmz','$wmr','$yandex')";
                if (mysql_query($registration_insert_query)) {
                    $session_id_query = "SELECT id FROM users WHERE email='$email'";
                    $session_id_result = mysql_query($session_id_query);
                    $session_id_row = mysql_fetch_array($session_id_result);
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $session_id_row[0]; //тут беда
                    $this->messages[] = "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='./index.php'>Главная страница</a>";
/*
                    // Читаем настройки config
                    require_once './lib/mail_config.php';
                    // Подключаем класс FreakMailer
                    require_once './lib/MailClass.php';
                    // инициализируем класс
                    $mailer = new FreakMailer();
                    // Устанавливаем тему письма
                    $mailer->Subject = 'Это тест';
                    // Задаем тело письма
                    $mailer->Body = 'Это тест моей почтовой системы!';
                    // Добавляем адрес в список получателей
                    $mailer->AddAddress('sushkevichpavel@gmail.com', 'Pavel Sushkevich');
                    if(!$mailer->Send()) {
                        echo 'Не могу отослать письмо!';
                    }
                    else {
                        echo 'Письмо отослано!';
                    }
                    $mailer->ClearAddresses();
                    $mailer->ClearAttachments();
*/
                } else {
                    $this->messages[] = "<div class='alert alert-block'><h4>ОШИБКА!</h4>Ошибка! Вы не зарегистрированы.</div>";
                }
            }
        } else {
            $this->messages[] = 'Вы ввели не всю информацию, вернитесь назад и заполните поля!';
        }
    }

    public function userEnter() {
        session_start();
        if (isset($_POST['email']))    {$email = $this->quote_smart($_POST['email']); if ($email == '') {unset($email);}}
        if (isset($_POST['password'])) {$password = md5($this->quote_smart($_POST['password'])); if ($password =='') {unset($password);}}
        if (empty($email) or empty($password)) {
            $this->messages[] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
        }
        $enter_query = "SELECT * FROM users WHERE email='$email'";
        $enter_result = mysql_query($enter_query);
        $enter_row = mysql_fetch_array($enter_result);
        if (empty($enter_row['password'])) {
            $this->messages[] = "<div class='alert alert-block'><h4>ОШИБКА!</h4>Извините, введённый вами email или пароль неверный.</div>";
        } else {
            if ($enter_row['password'] == $password) {
                $_SESSION['email'] = $enter_row['email'];
                $_SESSION['id'] = $enter_row['id'];
            }
        }
    }

    public function userExit() {
        session_start();
        unset($_SESSION);
        session_destroy();
        $this->messages[] = 'Вы вышли';
    }
}

?>