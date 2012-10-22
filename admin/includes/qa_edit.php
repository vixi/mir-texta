<h4>Редактирование вопроса-ответа</h4>
<?php
$faq_edit_query = "SELECT id,question FROM faq";
$faq_edit_result = mysql_query($faq_edit_query);
while ($faq_edit_row = mysql_fetch_array($faq_edit_result)) {
    $faq_edit_exit[] = "<a href='index.php?action=qa_edit&faq_edit_id=$faq_edit_row[0]'>$faq_edit_row[1]</a><br>";
}
foreach ($faq_edit_exit as $k => $v) {
    echo $v;
}

$admin = new AdminFormation();

if (isset($_GET[faq_edit_id]) and $_GET[faq_edit_id] != '') {
   if ($faq_edit_id = $admin->get_protect($_GET[faq_edit_id])) {
//       if ($faq_edit_id == ) {
           $faq_edit_question = $admin->getFAQQuestion($faq_edit_id);
           $faq_edit_answer = $admin->getFAQAnswer($faq_edit_id);
//      } else {
//          $die = "<div class='alert alert-error'>Новости номер $faq_edit_id не существует.</div>";
//           echo $die;
//      }
        if (!$die) {
            echo "<form action='./index.php' method='post' enctype='multipart/form-data'>
                    <label for='question'>Question:</label><textarea id='question' name='faq_edit_question' rows='7' style='width:400px;'>$faq_edit_question</textarea><br>
                    <label for='answer'>Answer:</label><textarea id='text' name='faq_edit_answer' rows='7' style='width:400px;'>$faq_edit_answer</textarea><br>
                    <input type='hidden' name='faq_edit_id' value='$faq_edit_id'>
                    <button type='submit' class='btn btn-primary' name='submit' value='qa_edit_submit'>Save changes</button>
                    <button type='reset' class='btn'>Cancel</button>
                </form>";
        }
    }
}
?>