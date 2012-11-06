<button name="estimate" class="estimate">Оценить</button>
<script language='javascript' type='text/javascript'>
                $('.estimate').click(function() {
                    var text = $('.text').html();
                    $.ajax({
                        type: 'POST',
                        url: './model/proxy.php',
                        dataType: 'json',
                        data: {text: text,
                                key: 'N8bW1QnkuYbe3AT',
                                format: 'json',
                                test: '1',
                                ajax_url: 'http://www.content-watch.ru/public/api/'},
                        success: function(data) {
                            $('.results').html(data.percent);
                        }
                    });
                });
</script>
<div class="results">...Результаты...</div>
<?php
        $admin_edition = new AdminEdition();
        $article_id = $admin_edition->get_protect($_GET[article_id]);
        $read_article_query = "SELECT user_articles.*, themes.theme, types.type FROM user_articles
                               INNER JOIN themes ON user_articles.theme = themes.id
                               INNER JOIN types ON user_articles.type = types.id
                               WHERE user_articles.id='$_GET[article_id]'";
        $read_article_result = mysql_query($read_article_query);
        $read_article_row = mysql_fetch_array($read_article_result);

        echo
        "<form action='users.php' method='post'>
        Тема статьи: <p>".$read_article_row[theme]."</p>
        Тип статьи: <p>".$read_article_row[type]."</p>
        Теги, через запятую: <p>".$read_article_row[tags]."</p>
        Заголовок статьи: <p>".$read_article_row[title]."</p>
        Текст статьи: <p class='text'>".$read_article_row[text]."</p>";

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
<!--<script language='javascript' type='text/javascript'>
                $('.estimate').click(function() {
                    $.ajax({
                        url: 'includes/user_article.php?ajax=get_text',
                        success: function(response) {
                            alert(response);
                            var text = response;
                            $.ajax({
                                type: 'POST',
                                url: './model/proxy.php',
                                dataType: 'json',
                                data: {text: text,
                                       key: 'N8bW1QnkuYbe3AT',
                                       format: 'json',
                                       test: '1',
                                       ajax_url: 'http://www.content-watch.ru/public/api/'},
                                success: function(data) {
                                        $('.results').html(data.percent);
                                }
                            });
                        }
                    });
                });
</script>-->