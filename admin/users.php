<?php
require_once 'model/lock.php';
require_once 'model/config.php';
require_once 'model/AdminFormation.class.php';
require_once 'model/AdminEdition.class.php';
require_once "../model/UserCabinet.php";
require_once "model/db_connection.php";
require_once "controller/AdminController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
        <description></description>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css" media="screen">
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <?php
            include 'blocks/block_header.php';
            include 'blocks/block_users.php';
            include 'blocks/block_footer.php';
            ?>
        </div>
    </body>
</html>