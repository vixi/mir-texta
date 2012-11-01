<h4>Редактирование темы</h4>
<?php
$theme_edit_query = "SELECT id,theme,rate FROM themes";
$theme_edit_result = mysql_query($theme_edit_query);
while ($theme_edit_row = mysql_fetch_array($theme_edit_result)) {
    $theme_edit_row[2] = $theme_edit_row[2]*1000;
    $theme_edit_exit[] = "<a href='settings.php?action=theme_edit&theme_id=$theme_edit_row[0]'>$theme_edit_row[1]</a><br>Цена за 1000 символов: $theme_edit_row[2]<br>";
}
foreach ($theme_edit_exit as $k => $v) {
    echo $v;
}

$admin = new AdminFormation();

if (isset($_GET[theme_id]) and $_GET[theme_id] != '') {
   if ($theme_id = $admin->get_protect($_GET[theme_id])) {
//       if ($theme_edit_id == ) {
           $theme_edit_name = $admin->getThemeName($theme_id);
           $theme_edit_rate = $admin->getThemeRate($theme_id);
//      } else {
//          $die = "<div class='alert alert-error'>Новости номер $theme_edit_id не существует.</div>";
//           echo $die;
//      }
        if (!$die) {
            echo "<form action='./settings.php' method='post'>
                    <label for='theme'>Название темы:</label><input id='theme' name='theme' value='$theme_edit_name'><br>
                    <label for='theme'>Цена за 1000 символов:</label><input id='theme' name='rate' value='$theme_edit_rate'><br>
                    <input type='hidden' name='theme_id' value='$theme_id'>
                    <button type='submit' class='btn btn-primary' name='submit' value='theme_edit_submit'>Save changes</button>
                    <button type='reset' class='btn'>Cancel</button>
                </form>";
        }
    }
}
?>