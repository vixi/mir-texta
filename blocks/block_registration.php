<aside class="bg2 padcontent4">
    <div class="container_24">
        <div class="wrapper">
            <div class="grid_24">
                <?php
                switch($_GET[action]) {
                    case 'enter':
                      echo "  <form class='grid_10 bs-docs-example form-horizontal' action='./cabinet.php?action=cabinet' method='post'>
                                <legend>Вход в личный кабинет</legend>
                                <div class='control-group'>
                                <label class='control-label' for='inputEmail'>Ваш Email: </label>
                                <div class='controls'>
                                <input type='text' id='inputEmail' placeholder='Email' name='email' size='15' maxlength='25'>
                                </div>
                                </div>
                                <div class='control-group'>
                                <label class='control-label' for='inputPassword'>Ваш Пароль: </label>
                                <div class='controls'>
                                <input id='inputPassword' placeholder='Password' name='password' type='password' size='15' maxlength='25'>
                                </div>
                                </div>
                                <div class='control-group'>
                                <div class='controls'>
                                <button type='submit' class='btn' name='submit' value='enter' >Вход</button>
                                </div>
                                </div>
                            </form>";

                      echo "<form class='grid_10 bs-docs-example form-horizontal' style='float:right' action='./cabinet.php?action=cabinet' method='post'>
                                <legend>Регистрация на сайте</legend>
                                <div class='control-group'>
                                <label class='control-label' for='inputEmail'>Ваш Email:<b>*</b> </label>
                                <div class='controls'>
                                <input type='text' id='inputEmail' placeholder='Email' name='email' size='15' maxlength='75'>
                                </div>
                                </div>
                                <div class='control-group'>
                                <label class='control-label' for='inputPassword'>Ваш Пароль:<b>* </b></label>
                                <div class='controls'>
                                <input id='inputPassword' placeholder='Пароль' name='password' type='password' size='15' maxlength='25'>
                                </div>
                                </div>
                                    <h4>Ваши платежные реквизиты (изменить можно только через админа).</h4>
                                <div class='control-group'>
                                <label class='control-label' for='inputEmail'>WMZ: </label>
                                <div class='controls'>
                                <input type='text' placeholder='WMZ' name='wmz' size='15' maxlength='25'>
                                </div>
                                </div>
                                <div class='control-group'>
                                <label class='control-label' for='inputEmail'>WMR: </label>
                                <div class='controls'>
                                <input type='text' placeholder='WMR' name='wmr' size='15' maxlength='25'>
                                </div>
                                </div>
                                <div class='control-group'>
                                <label class='control-label' for='inputEmail'>Yandex.money: </label>
                                <input type='checkbox' name='bot' style='display: none;'>
                                <div class='controls'>
                                <input type='text' placeholder='WMZ' name='yandex' size='15' maxlength='25'>
                                </div>
                                </div>
                                <label class='checkbox'>
                                <input type='checkbox' class='confirm'>
                                С <a href='about.php'>правилами</a> работы сайта согласен!
                                </label>
                                <div class='control-group'>
                                <div class='controls'>
                                <button id='reg_submit' type='submit' class='btn' name='submit' value='registration'>Регистрация</button>
                                </div>

                            </form>";
                            break;
                }

                if (isset($authorization->messages)) {
                    foreach ($authorization->messages as $k => $v) {
                        echo $v;
                    }
                }
                ?>
                <script>



                </script>
            </div>
        </div>
    </div>
</aside>