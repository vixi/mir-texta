<h4>Редактирование статьи</h4>
<?php
$articles_edit_query = "SELECT id,title FROM articles";
$articles_edit_result = mysql_query($articles_edit_query);
while ($articles_edit_row = mysql_fetch_array($articles_edit_result)) {
    $articles_edit_exit[] = "<a href='index.php?action=articles_edit&articles_edit_id=$articles_edit_row[0]'>$articles_edit_row[1]</a><br>";
}
foreach ($articles_edit_exit as $k => $v) {
    echo $v;
}

$admin = new AdminFormation();

if (isset($_GET[articles_edit_id]) and $_GET[articles_edit_id] != '') {
   if ($articles_edit_id = $admin->get_protect($_GET[articles_edit_id])) {
//       if ($articles_edit_id == ) {
           $articles_edit_title = $admin->getArticlesTitle($articles_edit_id);
           $articles_edit_text  = $admin->getArticlesText($articles_edit_id);
//      } else {
//          $die = "<div class='alert alert-error'>Новости номер $articles_edit_id не существует.</div>";
//           echo $die;
//      }
   }
    if (!$die) {
        echo "<form action='./index.php' method='post'>
                <label for='title'>Title:</label><input id='title' name='articles_edit_title' type='text' value='$articles_edit_title'><br>
                <label for='text'>Text:</label><textarea id='text' name='articles_edit_text' rows='7' style='width:400px;'>$articles_edit_text</textarea><br>
                <input type='hidden' name='articles_edit_id' value='$articles_edit_id'>
                <button type='submit' class='btn btn-primary' name='submit' value='articles_edit_submit'>Save changes</button>
                <button type='reset' class='btn'>Cancel</button>
            </form>";
    }
}
?>