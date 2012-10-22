<?php
require_once "model/db_connection.php";
require_once "model/pageFormation.php";
require_once "model/Authorization.php";
$services = new pageFormation();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        <?php echo $services->getTitle('services');?>
        </title>
        <meta name="description" content="<?php echo $services->getDescription('services');?>">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    </head>
    <body>
        <div class="bg-top">
            <?php
            include 'blocks/block_header.php';
            include 'blocks/block_services.php';
            include 'blocks/block_footer.php';
            ?>
        </div>
    </body>
</html>