<?php
    $admin_edition = new AdminEdition();
    $article_id = $admin_edition->get_protect($_GET[article_id]);
    $read_article_query = "SELECT title,text,theme,type,tags,date,status FROM user_articles WHERE id='$_GET[article_id]'";
    $read_article_result = mysql_query($read_article_query);
    $read_article_row = mysql_fetch_array($read_article_result);
    echo
        "<form action='users.php' method='post'>
            Тема статьи: <p>".$read_article_row[2]."</p>
            Тип статьи: <p>".$read_article_row[3]."</p>
            Теги, через запятую: <p>".$read_article_row[4]."</p>
            Заголовок статьи: <p>".$read_article_row[0]."</p>
            Текст статьи: <p>".$read_article_row[4]."</p>";

    echo
        "Текущий статус: <p>".$admin_edition->getArticleStatusById($article_id)."</p>
        Изменить статус:
        <p>
        <select name='article_status'>";
    $options_result = mysql_query("SELECT id,status FROM status");
    while ($options_row = mysql_fetch_array($options_result)) {
        $options_exit[] = "<option value='$options_row[0]'>$options_row[1]</option>";
    }
    foreach ($options_exit as $options_k => $options_v) {
        echo $options_v;
    }
    echo
    "</select>
    <input type='hidden' name='article_id' value='$_GET[article_id]'>
    </p>
        <button type='submit' name='submit' value='article_response'>Отправить</button>
    </form>";
?>
