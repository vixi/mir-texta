<h4>Удаление отзыва</h4>
<?php
$feedback_del_query = "SELECT id,text FROM feedback";
$feedback_del_result = mysql_query($feedback_del_query);
while ($feedback_del_row = mysql_fetch_array($feedback_del_result)) {
    $feedback_del_exit[] = "<label class='radio'><input type='radio' name='feedback_del_id' value='$feedback_del_row[0]'>$feedback_del_row[1]</label>";
}
echo "<form action='./index.php' method='post'>";
    foreach ($feedback_del_exit as $k => $v) {
        echo $v;
    }
echo "<button type='submit' class='btn btn-primary' name='submit' value='feedback_del_submit'>Delete feedback</button>";
echo "</form>";
?>