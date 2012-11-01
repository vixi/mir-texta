<h4>Редактирование преимущества</h4>
<?php
$advantages_edit_query = "SELECT id,title FROM advantages ORDER BY id DESC";
$advantages_edit_result = mysql_query($advantages_edit_query);
while ($advantages_edit_row = mysql_fetch_array($advantages_edit_result)) {
    $advantages_edit_exit[] = "<a href='index.php?action=advantages_edit&advantages_edit_id=$advantages_edit_row[0]'>$advantages_edit_row[1]</a><br>";
}
foreach ($advantages_edit_exit as $k => $v) {
    echo $v;
}

$admin = new AdminFormation();

if (isset($_GET[advantages_edit_id]) and $_GET[advantages_edit_id] != '') {
   if ($advantages_edit_id = $admin->get_protect($_GET[advantages_edit_id])) {
//       if ($advantages_edit_id == ) {
           $advantages_edit_title = $admin->getAdvantagesTitle($advantages_edit_id);
           $advantages_edit_text  = $admin->getAdvantagesText($advantages_edit_id);
//      } else {
//          $die = "<div class='alert alert-error'>Новости номер $advantages_edit_id не существует.</div>";
//           echo $die;
//      }
   }
    if (!$die) {
        echo "<form action='./index.php' method='post' enctype='multipart/form-data'>
                <label for='title'>Title:</label><input id='title' name='advantages_edit_title' type='text' value='$advantages_edit_title'><br>
                <label for='text'>Text:</label><textarea id='text' name='advantages_edit_text' rows='7' style='width:400px;'>$advantages_edit_text</textarea><br>
                <input type='hidden' name='advantages_edit_id' value='$advantages_edit_id'>
                <button type='submit' class='btn btn-primary' name='submit' value='advantages_edit_submit'>Save changes</button>
                <button type='reset' class='btn'>Cancel</button>
            </form>";
    }
}
?>