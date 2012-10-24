<?php
require_once 'model/lock.php';
require_once 'model/config.php';
require_once 'model/AdminFormation.class.php';
require_once 'model/AdminEdition.class.php';
require_once "model/db_connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
        <?php
        switch ($_GET[action]) {
        case 'section_data_edit':
        echo 'Редактировать section_data';
            break;
        case 'top_news_edit':
        echo 'Редактирование главной новости';
            break;
        case 'articles_edit':
        echo 'Редактирование статьи';
            break;
        case 'news_add':
        echo 'Добавление новости';
            break;
        case 'news_del':
        echo 'Удаление новости';
            break;
        case 'news_edit':
        echo 'Редактирование новости';
            break;
        case 'advantages_add':
        echo 'Добавление преимущества';
            break;
        case 'advantages_del':
        echo 'Удаление преимущества';
            break;
        case 'advantages_edit':
        echo 'Редактирование преимущества';
            break;
        case 'feedback_add':
        echo 'Добавление отзыва';
            break;
        case 'feedback_del':
        echo 'Удалиение отзыва';
            break;
        case 'feedback_edit':
        echo 'Редактирование отзыва';
            break;
        case 'mission_edit':
        echo 'Редактирование миссии';
            break;
        case 'services_features_edit':
        echo 'Редактирование фишек';
            break;
        case 'top_features_edit':
        echo 'Редактирование топ фишек';
            break;
        case 'qa_add':
        echo 'Добавление QA';
            break;
        case 'qa_del':
        echo 'Удаление QA';
            break;
        case 'qa_edit':
        echo 'Редактирование QA';
            break;
        default :
        echo 'Админка';
            break;
        }
        ?>
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
            switch ($_GET[action]) {
                case 'articles': include 'blocks/block_articles.php';
                    break;
                case 'users': include 'blocks/block_users.php';
                    break;

                default:
                    include 'blocks/block_sidebar.php';
                    include 'blocks/block_admin.php';
                    break;
            }
            include 'blocks/block_footer.php';
            ?>
        </div>
    </body>
</html>