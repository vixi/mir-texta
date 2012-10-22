<h4>Редактирование отзыва</h4>
<?php
$feedback_edit_query = "SELECT id,text FROM feedback ORDER BY id DESC";
$feedback_edit_result = mysql_query($feedback_edit_query);
while ($feedback_edit_row = mysql_fetch_array($feedback_edit_result)) {
    $feedback_edit_exit[] = "<a href='index.php?action=feedback_edit&feedback_edit_id=$feedback_edit_row[0]'>$feedback_edit_row[1]</a><br>";
}
foreach ($feedback_edit_exit as $k => $v) {
    echo $v;
}

$admin = new AdminFormation();

if (isset($_GET[feedback_edit_id]) and $_GET[feedback_edit_id] != '') {
   if ($feedback_edit_id = $admin->get_protect($_GET[feedback_edit_id])) {
//       if ($feedback_edit_id == ) {
           $feedback_edit_author  = $admin->getFeedbackAuthor($feedback_edit_id);
           $feedback_edit_text  = $admin->getFeedbackText($feedback_edit_id);
//      } else {
//          $die = "<div class='alert alert-error'>Новости номер $feedback_edit_id не существует.</div>";
//           echo $die;
//      }
   }
    if (!$die) {
        echo "<form action='./index.php' method='post'>
                <label for='title'>Author:</label><input id='title' name='feedback_edit_author' type='text' value='$feedback_edit_author'><br>
                <label for='text'>Text:</label><textarea id='text' name='feedback_edit_text' rows='7' style='width:400px;'>$feedback_edit_text</textarea><br>
                <input type='hidden' name='feedback_edit_id' value='$feedback_edit_id'>
                <button type='submit' class='btn btn-primary' name='submit' value='feedback_edit_submit'>Save changes</button>
                <button type='reset' class='btn'>Cancel</button>
            </form>";
    }
}
?>