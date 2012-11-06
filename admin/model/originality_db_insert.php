<?php
require_once "../model/db_connection.php";

$originality = $_POST[originality];
$article_id = $_POST[article_id];
$query = "UPDATE user_articles SET originality='$originality' WHERE id='$article_id'";
if (mysql_query($query)) {
    echo '<p>Значение уникальности обновлено</p>';
} else echo'<p>Запрос не прошел</p>';
?>