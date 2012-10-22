<aside class="bg2 padcontent4">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_24 padRT">
                <?php
                $cabinet = new UserCabinet();
                if (!isset($_GET[action])) {

                } else {

                    switch ($_GET[action]) {
                        case 'article_add' :
                            $date = date("Y-m-d");
                            echo "<form action='cabinet.php' method='post'>
                                <label>Тема статьи:<br>
                                <select name='theme'>";
                                    foreach ($cabinet->selectThemes() as $k => $v) {
                                        echo $v;
                                    }
                                echo
                                "</select>
                                </label><br>

                                <label>Тип статьи:<br>
                                <select name='type'>";
                                    foreach ($cabinet->selectTypes() as $key => $value) {
                                        echo $value;
                                    }
                                echo
                                "</select>
                                </label><br>

                                <label>Заголовок статьи:<br><input type='text' name='title'></label><br>
                                <label>Текст статьи:<br><textarea name='text' rows='20'></textarea></label><br>
                                <label>Теги:<br><input type='text' name='tags'></label><br>
                                <input type='hidden' name='email' value='$_SESSION[email]'>
                                <input type='hidden' name='date' value='$date'>";
                                echo $cabinet->selectStatus(1);
                                echo
                                "<button type='submit' name='submit' value='article_add'>Отправить</button>
                            </form>";
                            break;
                        case 'cabinet' : echo '<a href="cabinet.php?action=article_add">Добавить статью</a>';
                    echo "
                        <table>
                        <tr>
                            <td>Название статьи</td>
                            <td>Тема</td>
                            <td>Тип статьи</td>
                            <td>Теги статьи</td>
                            <td>Символов</td>
                            <td>Стоимость</td>
                            <td>Уникальность</td>
                            <td>Дата</td>
                            <td>Статус</td>
                        </tr>";
                    foreach ($cabinet->selectUserArticles() as $key => $value) {
                        echo $value;
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