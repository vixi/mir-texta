<?php $header = new AdminFormation(); ?>
<div class="page_header">
    <div class="navbar">
      <div class="navbar-inner">
          <ul class="nav">
            <li class="active">
              <a href="index.php">Управление сайтом</a>
            </li>
            <li><a href="./articles.php?action=show_all_articles">Статьи <span class="badge badge-info"><?php echo $header->countUserArticles(); ?></span></a></li>
            <li><a href="./users.php">Пользователи  <span class="badge badge-info"><?php echo $header->countUsers(); ?></span></a></li>
            <li><a href="./settings.php">Настройки </a></li>
          </ul>
          <a href="../index.php"><div class="btn" style="float: right;">Выход</div></a>
      </div>
    </div>
</div>