<?php
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
                                    <td><a href='users.php?action=show_article&article_id=$user_articles_row[0]'>$user_articles_row[3]</a></td>
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
?>
