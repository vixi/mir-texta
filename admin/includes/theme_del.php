<h4>Удаление темы</h4>
<?php
$theme_del_query = "SELECT id,theme FROM themes";
$theme_del_result = mysql_query($theme_del_query);
while ($theme_del_row = mysql_fetch_array($theme_del_result)) {
    $theme_del_exit[] = "<label class='radio'><input type='radio' name='theme_del_id' value='$theme_del_row[0]'>$theme_del_row[1]</label>";
}
echo "<form action='./settings.php' method='post'>";
    foreach ($theme_del_exit as $k => $v) {
        echo $v;
    }
echo "<button type='submit' class='btn btn-primary' name='submit' value='theme_del_submit'>Delete theme</button>";
echo "</form>";
?>