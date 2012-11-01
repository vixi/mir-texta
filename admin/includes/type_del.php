<h4>Удаление типа</h4>
<?php
$type_del_query = "SELECT id,type,multiplier FROM types";
$type_del_result = mysql_query($type_del_query);
while ($type_del_row = mysql_fetch_array($type_del_result)) {
    $type_del_exit[] = "<label class='radio'><input type='radio' name='type_id' value='$type_del_row[0]'>".$type_del_row[1]."<br>Коэффициент: $type_del_row[2]"."</label>";
}
echo "<form action='./settings.php' method='post'>";
    foreach ($type_del_exit as $k => $v) {
        echo $v;
    }
echo "<button type='submit' class='btn btn-primary' name='submit' value='type_del_submit'>Delete type</button>";
echo "</form>";
?>