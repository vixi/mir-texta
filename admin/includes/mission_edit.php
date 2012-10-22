<h4>Редактирование миссии</h4>
<?php
$admin = new AdminFormation();

$mission_edit_title = $admin->getMissionTitle();
$mission_edit_text  = $admin->getMissionText();

echo "<form action='./index.php' method='post'>
        <label for='title'>Title:</label><input id='title' name='mission_edit_title' type='text' value='$mission_edit_title'><br>
        <label for='text'>Text:</label><textarea id='text' name='mission_edit_text' rows='7' style='width:400px;'>$mission_edit_text</textarea><br>
        <button type='submit' class='btn btn-primary' name='submit' value='mission_edit_submit'>Save changes</button>
        <button type='reset' class='btn'>Cancel</button>
    </form>";
?>