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
    $user_info_query = "SELECT email,wmz,wmr,yandex FROM users WHERE id=$_GET[user_id]";
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
    $user_articles_query = "SELECT title,date,theme,type,symbols,unique,price FROM user_articles WHERE email=$_GET[user_email]";
    $user_articles_result = mysql_query($user_articles_query);
    $user_articles_row = mysql_fetch_array($user_articles_result);
    //на завтра
}
?>