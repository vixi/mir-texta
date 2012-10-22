<h4>Редактирование главных особенностей услуг</h4>
<div>
    <ul>
        <li><a href="index.php?action=top_features_edit&top_features_block=1">Блок 1</a></li>
        <li><a href="index.php?action=top_features_edit&top_features_block=2">Блок 2</a></li>
    </ul>
</div>
<?php
$admin = new AdminFormation();

if (isset($_GET[top_features_block]) and $_GET[top_features_block] != '') {
   if ($top_features_block = $admin->get_protect($_GET[top_features_block])) {
       if ($top_features_block == '1' or $top_features_block == '2') {
            $top_features_image = $admin->getTopfeaturesImage($top_features_block);
            $top_features_title = $admin->getTopfeaturesTitle($top_features_block);
            $top_features_text  = $admin->getTopfeaturesText($top_features_block);
       } else {
           $die = "<div class='alert alert-error'>Блока номер $top_features_block не существует.</div>";
           echo $die;
       }
   }
echo "<form action='./index.php' method='post' enctype='multipart/form-data'>
        <label for='image'>Выберите новое изображение (.jpeg / .png):</label><input type='file' id='image' name='top_features_image'><br>
        <label for='title'>Title:</label><input id='title' name='top_features_title' type='text' value='$top_features_title'><br>
        <label for='text'>Text:</label><textarea id='text' name='top_features_text' rows='7s' cols='50' style='width:600px;'>$top_features_text</textarea><br>
        <input id='block' name='top_features_block' type='hidden' value='$top_features_block'><br>
        <button type='submit' class='btn btn-primary' name='submit' value='top_features_edit_submit'>Save changes</button>
        <button type='reset' class='btn'>Cancel</button>
      </form>";
}


?>