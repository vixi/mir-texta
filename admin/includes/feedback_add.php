<h4>Добавление отзыва</h4>
<form action='./index.php' method='post'>
    <label for='title'>Author:</label><input id='author' name='feedback_add_author' type='text'>
    <label for='text'>Text:</label><textarea id='text' name='feedback_add_text' rows='7' style='width:400px;'></textarea><br>
    <button type='submit' class='btn btn-primary' name='submit' value='feedback_add_submit'>Save changes</button>
    <button type='reset' class='btn'>Cancel</button>
</form>
