тут надо бутштраповских тэгов наставить
<table>
    <tr>
        <td>Пользователь</td>
        <td>Заголовок статьи</td>
        <td>Тематика</td>
        <td>Вид статьи</td>
        <td>Символов</td>
        <td>Стоимость</td>
        <td>Уникальность</td>
        <td>Дата</td>
        <td>Статус</td>
    </tr>
<?php
$admin_articles_query = "SELECT * FROM user_articles";
$admin_articles_result = mysql_query($admin_articles_query);
while ($admin_articles_row = mysql_fetch_array($admin_articles_result)) {
    $admin_articles_exit[] = "<tr>
                                <td>$admin_articles_row[1]</td>
                                <td>$admin_articles_row[2]</td>
                                <td>$admin_articles_row[4]</td>
                                <td>$admin_articles_row[5]</td>
                                <td>$admin_articles_row[7]</td>
                                <td>$admin_articles_row[8]</td>
                                <td>$admin_articles_row[9]</td>
                                <td>$admin_articles_row[10]</td>
                                <td>$admin_articles_row[11]</td>
                             </tr>";
    }
    foreach ($admin_articles_exit as $key => $value) {
           echo $value;
    }
    echo "</table>";
?>
