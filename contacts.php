<?php
require_once "model/db_connection.php";
require_once "model/Authorization.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Конаткты</title>
        <description></description>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="js/forms.js"></script>
    </head>
    <body>
        <div class="bg-top">
            <?php
            include 'blocks/block_header.php';
            include 'blocks/block_contacts.php';
            include 'blocks/block_footer.php';
            ?>
        </div>
    </body>
</html>