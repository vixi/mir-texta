<h4>Редактирование особенностей услуг</h4>
<div>
    <ul>
        <li><a href="index.php?action=services_features_edit&services_features_block=1">Особенность 1</a></li>
        <li><a href="index.php?action=services_features_edit&services_features_block=2">Особенность 2</a></li>
        <li><a href="index.php?action=services_features_edit&services_features_block=3">Особенность 3</a></li>
    </ul>
</div>

<?php
$admin = new AdminFormation();

if (isset($_GET[services_features_block]) and $_GET[services_features_block] != '') {
   if ($services_features_block = $admin->get_protect($_GET[services_features_block])) {
       if ($services_features_block == '1' or $services_features_block == '2' or $services_features_block == '3') {
           $services_features_title = $admin->getServicesFeaturesTitle($services_features_block);
           $services_features_text  = $admin->getServicesFeaturesText($services_features_block);
       } else {
           $die = "<div class='alert alert-error'>Блока номер $services_features_block не существует.</div>";
           echo $die;
       }
   }
    if (!$die) {
        echo "<form action='./index.php' method='post'>
                <label for='title'>Title:</label><input id='title' name='services_features_title' type='text' value='$services_features_title'><br>
                <label for='text'>Text:</label><textarea id='text' name='services_features_text' rows='7' style='width:400px;'>$services_features_text</textarea><br>
                <input type='hidden' name='services_features_block' value='$services_features_block'>
                <button type='submit' class='btn btn-primary' name='submit' value='services_features_edit_submit'>Save changes</button>
                <button type='reset' class='btn'>Cancel</button>
             </form>";
    }
}
?>