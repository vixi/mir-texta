тут надо бутштраповских тэгов наставить
<?php
$admin_users_query = "SELECT id,email FROM users";
$admin_users_result = mysql_query($admin_users_query);
while ($admin_users_row = mysql_fetch_array($admin_users_result)) {
    $admin_users_exit[] = "<a href=./index.php?action=users&user_id=$admin_users_row[0]>$admin_users_row[1]</a><br>";
}
echo "<div>";
foreach ($admin_users_exit as $key => $value) {
        echo $value;
}
echo "</div>";
?>