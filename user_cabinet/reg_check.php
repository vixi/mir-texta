<?php
if (empty($_SESSION['email']) or empty($_SESSION['id'])) {
    echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
} else {
    echo "Вы вошли на сайт, как ".$_SESSION['email']."<br><a href='#'>Эта ссылка доступна только зарегистрированным пользователям</a>";
}
?>