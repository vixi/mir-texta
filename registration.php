<?php
require_once "model/db_connection.php";
require_once "model/pageFormation.php";
require_once "model/Authorization.php";
$faq = new pageFormation();
$authorization = new Authorization();

switch($_POST[submit]) {
    case 'registration' : $authorization->userRegistration();
        break;
    case 'enter' : $authorization->userEnter();
        //тут будет кабинет, который выводиться после успешного входа
        break;
}

switch($_GET[action]) {
    case 'exit' : $authorization->userExit();
        break;
}
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
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    </head>
    <body>
        <div class="bg-top">
            <?php
            include 'blocks/block_header.php';
            include 'blocks/block_registration.php';
            include 'blocks/block_footer.php';
            ?>
        </div>
    </body>
</html>