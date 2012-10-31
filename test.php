<?php
require_once "model/db_connection.php";

$row = mysql_fetch_array(mysql_query("SELECT user_articles.*, themes.*, types.*, status.* FROM user_articles INNER JOIN themes ON user_articles.theme = themes.id INNER JOIN types ON user_articles.type = types.id INNER JOIN status ON user_articles.status = status.id"));

print_r($row[theme]);
print_r($row[type]);
print_r($row[status]);
?>