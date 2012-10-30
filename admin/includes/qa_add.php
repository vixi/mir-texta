<h4>Добавление вопроса-ответа</h4>
<form action='./index.php' method='post'>
    <label for='title'>Question:</label><input id='question' name='qa_add_question' type='text'>
    <label for='text'>Answer:</label><textarea id='answer' name='qa_add_answer' rows='7' style='width:400px;'></textarea><br>
    <button type='submit' class='btn btn-primary' name='submit' value='qa_add_submit'>Save changes</button>
    <button type='reset' class='btn'>Cancel</button>
</form>