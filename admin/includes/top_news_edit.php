<h4>Редактирование главной новости</h4>
<?php
$admin = new AdminFormation();

$top_news_image = $admin->getTopNewsImage();
$top_news_title = $admin->getTopNewsTitle();
$top_news_text = $admin->getTopNewsText();

echo "<form action='./index.php' method='post' enctype='multipart/form-data'>
        <p>Установленное изображение:</p><img src='../$top_news_image' width='200'>
        <label for='image'>Выберите новое изображение (.jpeg / .png):</label><input type='file' id='image' name='top_news_image'><br>
        <label for='title'>Title:</label><input id='title' name='top_news_title' type='text' value='$top_news_title'><br>
        <label for='text'>Text:</label><textarea id='text' name='top_news_text' rows='7s' cols='50' style='width:600px;'>$top_news_text</textarea><br>
        <button type='submit' class='btn btn-primary' name='submit' value='top_news_submit'>Save changes</button>
        <button type='reset' class='btn'>Cancel</button>
      </form>";
?>