<h4>Добавление преимущества</h4>
<?php
echo "<form action='./index.php' method='post' enctype='multipart/form-data'>
        <label for='image'>Выберите изображение (.jpeg / .png):</label><input type='file' id='image' name='advantages_add_image'>
        <label for='title'>Title:</label><input id='title' name='advantages_add_title' type='text'>
        <label for='text'>Text:</label><textarea id='text' name='advantages_add_text' rows='7' style='width:400px;'></textarea><br>
        <button type='submit' class='btn btn-primary' name='submit' value='advantages_add_submit'>Save changes</button>
        <button type='reset' class='btn'>Cancel</button>
     </form>";
?>