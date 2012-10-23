<?php
require_once "model/db_connection.php";
require_once "model/pageFormation.php";
require_once "model/Authorization.php";
$index = new pageFormation();
if (isset($_GET[news_id])) {$news_id = $index->get_protect($_GET[news_id]);}
if (isset($_GET[articles_id])) {$articles_id = $index->get_protect($_GET[articles_id]);}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Заработай тут. Заработок в интернете. Дополнительный доход.
        <?php
        if (isset($news_id)) {
            echo $index->getTitle('news');
        }
        elseif (isset($articles_id)) {
            echo $index->getTitle('articles');
        }
        else {
            echo $index->getTitle('index');
        }
        ?>
        </title>
        <meta name="description" content="<?php echo $index->getDescription('index');?>">
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
            if (!isset($news_id) and !isset ($articles_id)) {
                include 'blocks/block_header_index.php';
            } else {
                include 'blocks/block_header.php';
            }
            if (isset($news_id)) {
                include 'blocks/block_news.php';
            }
            elseif (isset($articles_id)) {
                include 'blocks/block_articles.php';
            } else {
                include 'blocks/block_section.php';
                include 'blocks/block_aside.php';
            }
            include 'blocks/block_footer.php';
            ?>
        </div>
    </body>
</html>