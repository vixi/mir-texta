тут надо бутштраповских тэгов наставить
<?php
$admin_users_query = "SELECT id,email FROM users";
$admin_users_result = mysql_query($admin_users_query);
while ($admin_users_row = mysql_fetch_array($admin_users_result)) {
    $admin_users_exit[] = "<a href=./index.php?action=users&user_id=$admin_users_row[0]&user_email=$admin_users_row[1]>$admin_users_row[1]</a><br>";
}
echo "<div>";
foreach ($admin_users_exit as $key => $value) {
        echo $value;
}
echo "</div>";

if (isset($_GET[user_id])) {
    $user_info_query = "SELECT email,wmz,wmr,yandex FROM users WHERE id='$_GET[user_id]'";
    $user_info_result = mysql_query($user_info_query);
    $user_info_row = mysql_fetch_array($user_info_result);
    $email = $user_info_row[0];
    $wmz = $user_info_row[1];
    $wmr = $user_info_row[2];
    $yandex = $user_info_row[3];
    echo "E-mail: $email<br>
          WMZ: $wmz<br>
          WMR: $wmr<br>
          Yandex: $yandex";
    $user_articles_query = "SELECT * FROM user_articles WHERE email='$_GET[user_email]'";
    $user_articles_result = mysql_query($user_articles_query);

    while ($user_articles_row = mysql_fetch_array($user_articles_result)) {
        $user_articles_exit[] = "<tr>
                                    <td>$user_articles_row[3]</td>
                                    <td>$user_articles_row[5]</td>
                                    <td>$user_articles_row[6]</td>
                                    <td>$user_articles_row[8]</td>
                                    <td>$user_articles_row[9]</td>
                                    <td>$user_articles_row[10]</td>
                                    <td>$user_articles_row[11]</td>
                                    <td>$user_articles_row[12]</td>
                                </tr>";
    }
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
    if ($user_articles_exit) {
        foreach ($user_articles_exit as $k => $v) {
            echo $v;
        }
    } else {
        echo "У этого пользователя нету статей";
    }
    echo "</table>";
}
?>