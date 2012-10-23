<header>
    <div class=" container_24">
      <nav class="main_menu">
                <ul class="sf-menu">
                    <li><a href="index.php">Заработай</a></li>
                    <li><a href="index.php?articles_id=1">Цены</a></li>
                    <li><a href="about.php">Правила</a></li>
                    <li><a href="faq.php">Вопросы</a></li>
                    <?php
                    if (isset($_SESSION['email']) and isset($_SESSION['id'])) {
                        echo "<li class='last'><a href='cabinet.php?action=cabinet'>Кабинет</a></li>";
                    } else {
                        echo "<li class='last'><a href='cabinet.php?action=enter'>Вход</a></li>";
                    }
                    ?>
                </ul>
                <div class="clear"></div>
            </nav>
        </div>
        <div class="clear"></div>
    </div>
</header>