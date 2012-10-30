<?php
$admin_articles_query = "SELECT ua.*, t.theme theme1, t1.type type1, s.status status1 FROM user_articles ua inner join themes t on t.id = ua.theme inner join types t1 on t1.id = ua.type inner join status s on s.id = ua.status";
$admin_articles_result = mysql_query($admin_articles_query);
while ($admin_articles_row = mysql_fetch_array($admin_articles_result)) {
    $admin_articles_exit[] = "<tr>
                                <td><a href='./users.php?action=show_article&article_id=$admin_articles_row[0]'>$admin_articles_row[3]</a></td>
                                <td><a href='./users.php?action=show_user_articles&user_id=$admin_articles_row[1]&user_email=$admin_articles_row[2]'>$admin_articles_row[2]</a></td>
                                <td>$admin_articles_row[13]</td>
                                <td>$admin_articles_row[14]</td>
                                <td>$admin_articles_row[8]</td>
                                <td>$admin_articles_row[9]</td>
                                <td>$admin_articles_row[10]</td>
                                <td>$admin_articles_row[11]</td>
                                <td>$admin_articles_row[15]</td>
                             </tr>";
    }
foreach ($admin_articles_exit as $key => $value) {
        echo $value;
}
?>