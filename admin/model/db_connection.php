<?php
require_once "db_settings.php";
if (!mysql_connect($db_server, $db_username, $db_password)) {
    die('DB connection failed');
}
mysql_select_db($db_name);
mysql_query('SET NAMES utf8');
?>
