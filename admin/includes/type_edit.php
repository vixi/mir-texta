<h4>Редактирование типа</h4>
<?php
$type_edit_query = "SELECT id,type,multiplier FROM types";
$type_edit_result = mysql_query($type_edit_query);
while ($type_edit_row = mysql_fetch_array($type_edit_result)) {
    $type_edit_exit[] = "<a href='settings.php?action=type_edit&type_id=$type_edit_row[0]'>$type_edit_row[1]</a><br>Коэффициент: $type_edit_row[2]<br>";
}
foreach ($type_edit_exit as $k => $v) {
    echo $v;
}

$admin = new AdminFormation();

if (isset($_GET[type_id]) and $_GET[type_id] != '') {
   if ($type_id = $admin->get_protect($_GET[type_id])) {
//       if ($type_edit_id == ) {
           $type_edit_name = $admin->getTypeName($type_id);
           $type_edit_multiplier = $admin->getTypeMultiplier($type_id);
//      } else {
//          $die = "<div class='alert alert-error'>Новости номер $type_edit_id не существует.</div>";
//           echo $die;
//      }
        if (!$die) {
            echo "<form action='./settings.php' method='post'>
                    <label for='type'>Название типа:</label><input id='type' name='type' value='$type_edit_name'><br>
                    <label for='multiplier'>Коэффициент:</label><input id='multiplier' name='multiplier' value='$type_edit_multiplier'><br>
                    <input type='hidden' name='type_id' value='$type_id'>
                    <button type='submit' class='btn btn-primary' name='submit' value='type_edit_submit'>Save changes</button>
                    <button type='reset' class='btn'>Cancel</button>
                </form>";
        }
    }
}
?>