<aside class="bg2 padcontent4">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_8">
                <?php
                switch($_GET[action]) {
                    case 'enter':
                        echo "<form action='./cabinet.php?action=cabinet' method='post'>
                                <label>Ваш логин:<br><input name='email' type='text' size='15' maxlength='15'></label><br>
                                <label>Ваш пароль:<br><input name='password' type='password' size='15' maxlength='15'></label><br>
                                <button type='submit' name='submit' value='enter'>Войти</button>
                              </form>";
                        echo "<form action='./cabinet.php' method='post'>
                                <label for='email'>Ваш логин:<br><input name='email' type='text' size='20'></label><br>
                                <label for='password'>Ваш пароль:<br><input name='password' type='password' size='20'></label><br>
                                <label for='wmz'>WMZ:<br><input name='wmz' type='text' size='20'></label><br>
                                <label for='wmr'>WMR:<br><input name='wmr' type='text' size='20'></label><br>
                                <label for='yandex'>Yandex money:<br><input name='yandex' type='text' size='20'></label><br>
                                <button type='submit' name='submit' value='registration'>Зарегистрироваться</button>
                              </form>";
                        break;
                }

                if (isset($authorization->messages)) {
                    foreach ($authorization->messages as $k => $v) {
                        echo $v;
                    }
                }
                ?>
            </div>
        </div>
    </div>
</aside>