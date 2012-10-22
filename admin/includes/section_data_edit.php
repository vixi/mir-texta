<h4>Редактирование section-data</h4>
<div>
    <ul>
        <li><a href="index.php?action=section_data_edit&section_data_block=1">Блок 1</a></li>
        <li><a href="index.php?action=section_data_edit&section_data_block=2">Блок 2</a></li>
        <li><a href="index.php?action=section_data_edit&section_data_block=3">Блок 3</a></li>
    </ul>
</div>

<?php
$admin = new AdminFormation();

if (isset($_GET[section_data_block]) and $_GET[section_data_block] != '') {
   if ($section_data_block = $admin->get_protect($_GET[section_data_block])) {
       if ($section_data_block == '1' or $section_data_block == '2' or $section_data_block == '3') {
           $section_data_title = $admin->getThesisTitle($section_data_block);
           $section_data_text = $admin->getThesisText($section_data_block);
       } else {
           $die = "<div class='alert alert-error'>Блока номер $section_data_block не существует.</div>";
           echo $die;
       }
   }
    if (!$die) {
        echo "<form action='./index.php' method='post'>
                <label for='title'>Title:</label><input id='title' name='section_data_title' type='text' value='$section_data_title'><br>
                <label for='text'>Text:</label><textarea id='text' name='section_data_text' rows='7' style='width:400px;'>$section_data_text</textarea><br>
                <input type='hidden' name='section_data_block' value='$section_data_block'>
                <button type='submit' class='btn btn-primary' name='submit' value='section_data_submit'>Save changes</button>
                <button type='reset' class='btn'>Cancel</button>
            </form>";
    }
}
?>
