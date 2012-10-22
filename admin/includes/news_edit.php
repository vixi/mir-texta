<h4>Редактирование новости</h4>
<?php
$news_edit_query = "SELECT id,title FROM news ORDER BY id DESC";
$news_edit_result = mysql_query($news_edit_query);
while ($news_edit_row = mysql_fetch_array($news_edit_result)) {
    $news_edit_exit[] = "<a href='index.php?action=news_edit&news_edit_id=$news_edit_row[0]'>$news_edit_row[1]</a><br>";
}
foreach ($news_edit_exit as $k => $v) {
    echo $v;
}

$admin = new AdminFormation();

if (isset($_GET[news_edit_id]) and $_GET[news_edit_id] != '') {
   if ($news_edit_id = $admin->get_protect($_GET[news_edit_id])) {
//       if ($news_edit_id == ) {
           $news_edit_image = $admin->getNewsImage($news_edit_id);
           $news_edit_title = $admin->getNewsTitle($news_edit_id);
           $news_edit_text  = $admin->getNewsText($news_edit_id);
           $news_edit_date  = $admin->getNewsDate($news_edit_id);
//      } else {
//          $die = "<div class='alert alert-error'>Новости номер $news_edit_id не существует.</div>";
//           echo $die;
//      }
   }
    if (!$die) {
        echo "<form action='./index.php' method='post' enctype='multipart/form-data'>
                <label for='image'>Image:</label><input id='image' name='news_edit_image' type='file'><br>
                <label for='title'>Title:</label><input id='title' name='news_edit_title' type='text' value='$news_edit_title'><br>
                <label for='text'>Text:</label><textarea id='text' name='news_edit_text' rows='7' style='width:400px;'>$news_edit_text</textarea><br>
                <label for='image'>Date:</label><input id='date' name='news_edit_date' type='date' value='$news_edit_date'><br>
                <input type='hidden' name='news_edit_id' value='$news_edit_id'>
                <button type='submit' class='btn btn-primary' name='submit' value='news_edit_submit'>Save changes</button>
                <button type='reset' class='btn'>Cancel</button>
            </form>";
    }
}
?>