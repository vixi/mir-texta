<h4>Удаление преимущества</h4>
<?php
$advantages_del_query = "SELECT id,title FROM advantages";
$advantages_del_result = mysql_query($advantages_del_query);
while ($advantages_del_row = mysql_fetch_array($advantages_del_result)) {
    $advantages_del_exit[] = "<label class='radio'><input type='radio' name='advantages_del_id' value='$advantages_del_row[0]'>$advantages_del_row[1]</label>";
}
echo "<form action='./index.php' method='post'>";
    foreach ($advantages_del_exit as $k => $v) {
        echo $v;
    }
echo "<button type='submit' class='btn btn-primary' name='submit' value='advantages_del_submit'>Delete advantages</button>";
echo "</form>";
?>