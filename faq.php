<?php
require_once "model/db_connection.php";
require_once "model/pageFormation.php";
require_once "model/Authorization.php";
$faq = new pageFormation();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        <?php echo $faq->getTitle('faq');?>
        </title>
        <meta name="description" content="<?php echo $faq->getDescription('faq');?>">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>
    </head>
    <body>
        <div class="bg-top">
            <?php
            include 'blocks/block_header.php';
            include 'blocks/block_faq.php';
            include 'blocks/block_footer.php';
            ?>
        </div>
    </body>
</html>