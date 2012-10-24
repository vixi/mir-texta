<aside class="bg2 padcontent4">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_24 padRT">
                <?php
                $cabinet = new UserCabinet();
                echo "<a href='./cabinet.php?action=exit'>Выйти</a>";
                if (!isset($_GET[action])) {

                } else {

                    switch ($_GET[action]) {
                        case 'article_add' :
                            $date = date("Y-m-d");
                            echo "
<ul class='breadcrumb'>
  <li><a href='/cabinet.php?action=cabinet'>Статьи</a> <span class='divider'>/</span></li>
  <!--<li><a href='#'>Library</a> <span class='ivider'>/</span></li>-->
  <li class='active'>Добавить статью</li>
</ul>



<form action='cabinet.php' method='post'>
                                <label><span>Тема статьи:</span>
                                <select name='theme'>";
                                    foreach ($cabinet->selectThemes() as $k => $v) {
                                        echo $v;
                                    }
                                echo
                                "</select>
                                </label>
                               <div class='popover bottom'>
  <div class='arrow'></div>
  <h5 class='popover-title'>Описание раздела</h5>
  <div class='popover-content'>
    <p>Sed posuere consectetur est at lobortis. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
  </div>
</div>


                               <br> <label><span>Тип статьи:</span>
                                <select name='type'>";
                                    foreach ($cabinet->selectTypes() as $key => $value) {
                                        echo $value;
                                    }
                                echo
                                "</select>
                                </label>
                                <label><span>Теги, через запятую:</span><input type='text' name='tags' style='width:40%; min-width: 80px'></label>
                                <label><span>Заголовок статьи:</span><input type='text' name='title' style='width:40%; min-width: 80px; font-weight: bold;'></label>
                                <label>Текст статьи<textarea id='text' name='text' rows='20'></textarea></label><br>
                                <input type='hidden' name='email' value='$_SESSION[email]'>
                                <input type='hidden' name='date' value='$date'>";
                                echo $cabinet->selectStatus(1);
                                echo
                                "<button type='submit' name='submit' value='article_add'>Отправить</button>
                            </form>";
                            break;
                        case 'cabinet' :
                        if ($cabinet->selectUserArticles()) {
                            echo "<table>
                                    <tr>
                                        <td>Название статьи</td>
                                        <td>Тема</td>
                                        <td>Тип статьи</td>
                                        <td>Символов</td>
                                        <td>Стоимость</td>
                                        <td>Уникальность</td>
                                        <td>Дата</td>
                                        <td>Статус</td>
                                    </tr>";
                            foreach ($cabinet->selectUserArticles() as $key => $value) {
                                echo $value;
                            }
                            echo "<p>
                                      <a class='btn btn-primary btn-success' href='cabinet.php?action=article_add'>Добавить статью</a>
                                  </p>";
                        } else {
                            echo "<div class='hero-unit'>
                                    <h1>Добро пожаловать!</h1>
                                    <p>Рады видеть Вас в нашей команде! Теперь Вы можете приступить к работе. Для этого Вам необходимо добавить статью.</p>
                                    <p>
                                        <a class='btn btn-primary btn-success' href='cabinet.php?action=article_add'>Добавить статью</a>
                                    </p>
                                 </div>";
                        }
                        echo "</table>";
                            break;
                    }
                }

                switch ($_POST[submit]) {
                    case 'article_add' : $cabinet->articleAdd();
                        break;
                }
                ?>
            </div>
        </div>
    </div>
</aside>