<?php
require_once "model/db_connection.php";
require_once "model/pageFormation.php";
require_once "model/Authorization.php";
require_once "model/UserCabinet.php";
$faq = new pageFormation();
$authorization = new Authorization();

switch($_POST[submit]) {
    case 'registration' : $authorization->userRegistration();
        break;
    case 'enter' : $authorization->userEnter();
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
        <title></title>
        <meta name="description" content="">
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
        <link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
    </head>
    <body>
        <div class="bg-top">
            <?php
            include 'blocks/block_header.php';
            if (isset($_SESSION[id])&&isset($_SESSION[email])) {
                include 'blocks/block_cabinet.php';
            } else {
                include 'blocks/block_registration.php';
            }
            include 'blocks/block_footer.php';
            ?>
        </div>
    </body>
</html>