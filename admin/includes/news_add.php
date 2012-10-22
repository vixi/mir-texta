<h4>Добавление новости</h4>
<?php
$date = date("Y-m-d");
echo "<form action='./index.php' method='post' enctype='multipart/form-data'>
        <label for='image'>Выберите изображение (.jpeg / .png):</label><input type='file' id='image' name='news_add_image'>
        <label for='title'>Title:</label><input id='title' name='news_add_title' type='text'>
        <label for='text'>Text:</label><textarea id='text' name='news_add_text' rows='7' style='width:400px;'></textarea><br>
        <input id='date' name='news_add_date' type='hidden' value='$date'>
        <button type='submit' class='btn btn-primary' name='submit' value='news_add_submit'>Save changes</button>
        <button type='reset' class='btn'>Cancel</button>
     </form>";
?>