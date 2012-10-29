<?php
$admin_controller = new AdminController();
$admin_controller->getController($_GET[action]);
$admin_controller->postController($_POST[submit],$_POST[theme_id]);

$admin_users_query = "SELECT id,email FROM users";
$admin_users_result = mysql_query($admin_users_query);
while ($admin_users_row = mysql_fetch_array($admin_users_result)) {
    $admin_users_exit[] = "<li><a href=./users.php?action=users&user_id=$admin_users_row[0]&user_email=$admin_users_row[1]>$admin_users_row[1]</a></li>";
}
echo "<div class='well' style='float:left; width:180px; overflow: hidden;'><ul class='nav nav-list'> ";
foreach ($admin_users_exit as $key => $value) {
        echo $value;
}
echo "</ul></div>";

if (isset($_GET[user_id])) {
    $user_info_query = "SELECT email,wmz,wmr,yandex FROM users WHERE id='$_GET[user_id]'";
    $user_info_result = mysql_query($user_info_query);
    $user_info_row = mysql_fetch_array($user_info_result);
    $email = $user_info_row[0];
    $wmz = $user_info_row[1];
    $wmr = $user_info_row[2];
    $yandex = $user_info_row[3];
    echo "<div class='span9'>E-mail: <a href='mailto:".$email."?subject=Zarabotai-tut.com'>$email</a><br>
          WMZ: $wmz<br>
          WMR: $wmr<br>
          Yandex: $yandex";
    $user_articles_query = "SELECT * FROM user_articles WHERE email='$_GET[user_email]'";
    $user_articles_result = mysql_query($user_articles_query);

    while ($user_articles_row = mysql_fetch_array($user_articles_result)) {
        $user_articles_exit[] = "<tr>
                                    <td><a href='users.php?action=users&article_id=$user_articles_row[0]'>$user_articles_row[3]</a></td>
                                    <td>$user_articles_row[5]</td>
                                    <td>$user_articles_row[6]</td>
                                    <td>$user_articles_row[8]</td>
                                    <td>$user_articles_row[9]</td>
                                    <td>$user_articles_row[10]</td>
                                    <td>$user_articles_row[11]</td>
                                    <td>$user_articles_row[12]</td>
                                </tr>";
    }
    echo "<table class='table table-hover'>
            <tr>
                <th>Название статьи</th>
                <th>Тема</th>
                <th>Тип статьи</th>
                <th>Символов</th>
                <th>Стоимость</th>
                <th>Уникальность</th>
                <th>Дата</th>
                <th>Статус</th>
            </tr>";
    if ($user_articles_exit) {
        foreach ($user_articles_exit as $k => $v) {
            echo $v;
        }
    } else {
        echo "У этого пользователя нету статей";
    }
    echo "</table></div>";
}

if (isset($_GET[article_id])) {
    $read_article_query = "SELECT title,text,theme,type,tags,date,status FROM user_articles WHERE id='$_GET[article_id]'";
    $read_article_result = mysql_query($read_article_query);
    $read_article_row = mysql_fetch_array($read_article_result);
    $admin = new UserCabinet();
    echo
        "<div class='span8'>
        <form action='users.php' method='post'>
            Тема статьи: <p>$read_article_row[2]</p>
            Тип статьи: <p>$read_article_row[3]</p>
            Теги, через запятую: <p>$read_article_row[4]</p>
            Заголовок статьи: <p>$read_article_row[0]</p>
            Текст статьи: <p>$read_article_row[1]</p>
            Статус:
            <p>
            <select name='article_status'>";
        $result = mysql_query("SELECT id,status FROM status");
        while ($row = mysql_fetch_array($result)) {
            $exit[] = "<option value='$row[0]'>$row[1]</option>";
        }
        foreach ($exit as $q => $e) {
            echo $e;
        }
        echo
        "</select>
        <input type='hidden' name='article_id' value='$_GET[article_id]'>
        </p>

            <button type='submit' name='submit' value='article_response'>Отправить</button>
        </div>
        </form>";
}
?>