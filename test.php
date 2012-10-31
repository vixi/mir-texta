<form action="test.php" method="post">
    <input type="text" name="theme">
    <input type="text" name="text">
    <input type="submit">
</form>

<?php

require_once "model/db_settings.php";
if (!mysql_connect($db_server, $db_username, $db_password)) {
    die('DB connection failed');
}
mysql_select_db($db_name);
mysql_query('SET NAMES utf8');

foreach ($_POST as $key => $value) {
        $$key = quote_smart($_POST[$key]);
        echo $$key;
    }

function quote_smart($value)
{
    $value = trim($value);
    $value = stripslashes($value);
    $value = mysql_real_escape_string($value);
    return $value;
}
?>