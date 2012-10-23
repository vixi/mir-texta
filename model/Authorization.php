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
        if (isset($_POST['email']))    {$email = $this->quote_smart($_POST['email']); if ($email == '') {unset($email);}}
        if (preg_match("^([a-zA-Z0-9_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}\$^", $email) == 0) {
            $this->messages[] = "Неверный формат e-mail";
            unset($email);
            }
        if (isset($_POST['password'])) {$password = $this->quote_smart($_POST['password']); if ($password =='') {unset($password);}}
        /*if (preg_match("[a-zA-Z0-9_]", $password) == 0) {
            $this->messages[] = "Неверный формат пароля";
            unset($password);
            }*/
        if (isset($_POST['wmz']))      {$wmz = $this->quote_smart($_POST['wmz']); if ($wmz =='') {unset($wmz);}}
        if (isset($_POST['wmr']))      {$wmr = $this->quote_smart($_POST['wmr']); if ($wmr =='') {unset($wmr);}}
        if (isset($_POST['yandex']))   {$yandex = $this->quote_smart($_POST['yandex']); if ($yandex =='') {unset($yandex);}}

        if (isset($email)&&isset($password)&&isset($wmz)&&isset($wmr)&&isset($yandex)) {
            if ($wmz != '' or $wmr != '' or $yandex != '') {
                $registration_check_query = "SELECT id FROM users WHERE email='$email'";
                $registration_check_result = mysql_query($registration_check_query);
                $registration_check_row = mysql_fetch_array($registration_check_result);
                if (!empty($registration_check_row['id'])) {
                    $this->messages[] = 'Извините, введённый вами логин уже зарегистрирован. Введите другой логин.';
                } else {
                    $registration_insert_query = "INSERT INTO users (email,password,wmz,wmr,yandex) VALUES('$email','$password','$wmz','$wmr','$yandex')";
                    if (mysql_query($registration_insert_query)) {
                        $this->messages[] = "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
                    } else {
                        $this->messages[] = 'Ошибка! Вы не зарегистрированы.';
                    }
                }
            } else {
                $this->messages[] = 'Вы ввели не всю информацию, любо ввели ее неверно!';
            }
        } else {
            $this->messages[] = 'Вы ввели не всю информацию, вернитесь назад и заполните поля!';
        }
    }

    public function userEnter() {
        session_start();
        if (isset($_POST['email']))    {$email = $this->quote_smart($_POST['email']); if ($email == '') {unset($email);}}
        if (isset($_POST['password'])) {$password = $this->quote_smart($_POST['password']); if ($password =='') {unset($password);}}
        if (empty($email) or empty($password)) {
            $this->messages[] = 'Вы ввели не всю информацию, вернитесь назад и заполните все поля!';
        }
        $enter_query = "SELECT * FROM users WHERE email='$email'";
        $enter_result = mysql_query($enter_query); //извлекаем из базы все данные о пользователе с введенным логином
        $enter_row = mysql_fetch_array($enter_result);
        if (empty($enter_row['password'])) {
            //если пользователя с введенным логином не существует
            $this->messages[] = 'Извините, введённый вами email или пароль неверный.';
        } else {
            //если существует, то сверяем пароли
            if ($enter_row['password'] == $password) {
            //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
                $_SESSION['email'] = $enter_row['email'];
                $_SESSION['id'] = $enter_row['id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
                $this->messages[] = "Вы успешно вошли на сайт! <a href='../index.php'>Главная страница</a>";
            } else {
                $this->messages[] = 'Извините, введённый вами email или пароль неверный.';
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