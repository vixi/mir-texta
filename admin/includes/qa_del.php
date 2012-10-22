<h4>Удаление вопроса-ответа</h4>
<?php
$qa_del_query = "SELECT id,question FROM faq";
$qa_del_result = mysql_query($qa_del_query);
while ($qa_del_row = mysql_fetch_array($qa_del_result)) {
    $qa_del_exit[] = "<label class='radio'><input type='radio' name='qa_del_id' value='$qa_del_row[0]'>$qa_del_row[1]</label>";
}
echo "<form action='./index.php' method='post'>";
    foreach ($qa_del_exit as $k => $v) {
        echo $v;
    }
echo "<button type='submit' class='btn btn-primary' name='submit' value='qa_del_submit'>Delete faq</button>";
echo "</form>";
?>