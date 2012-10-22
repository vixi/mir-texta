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
        <title>Статьи</title>
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
        ?>

<div class="bs-docs-example">
  <div class="well" style="min-width:230px; padding: 8px 0;">
    <ul class="nav nav-list">
      <li class="nav-header">Статьи</li>
        <li><a href="#">Новые статьи <span class="badge badge-info">8</span></a></li>
        <li><a href="#">Одобренные статьи <span class="badge">25</span></a></li>
    </ul>
  </div>
  <!-- /well -->
</div>

    <div class="span8">

    </div>
</div>

</body>