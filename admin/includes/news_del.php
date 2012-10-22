<h4>Удаление новости</h4>
<?php
$news_del_query = "SELECT id,title FROM news";
$news_del_result = mysql_query($news_del_query);
while ($news_del_row = mysql_fetch_array($news_del_result)) {
    $news_del_exit[] = "<label class='radio'><input type='radio' name='news_del_id' value='$news_del_row[0]'>$news_del_row[1]</label>";
}
echo "<form action='./index.php' method='post'>";
    foreach ($news_del_exit as $k => $v) {
        echo $v;
    }
echo "<button type='submit' class='btn btn-primary' name='submit' value='news_del_submit'>Delete news</button>";
echo "</form>";
?>