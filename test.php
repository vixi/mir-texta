<!DOCTYPE html>
<?php

?>
<html lang="ru" >
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>AJAX</title>
            <script src="js/jquery-1.8.2.min.js" type="text/javascript"></script>
    </head>
    <body>
<div class="examples">
    <button name="sample1" class="sample1">Пример 1 (простой)</button>
    <button name="sample7" class="sample7">Пример 7 (мой json)</button>
    <button name="sample8" class="sample8">Пример 8 (реальный)</button>

    <script language="javascript" type="text/javascript">
    $('.sample1').click( function() {
        $.ajax({
          url: 'admin/includes/get_text.php?action=get_text',
          success: function(data) {
            $('.results').html(data);
          }
        });
    });

    $('.sample7').click(function() {
        $.ajax({
            dataType: 'json',
            url: 'response.php?action=sample7',
            success: function(myjson) {
                $('.results').html('Name = ' + myjson.name + ', Nickname = ' + myjson.nickname);
            }
        });
    });
/*
    $('.sample8').click(function() {
        $.ajax({
            dataType: "jsonp",
          //url: "response.php?action=sample8&key=12345",
            url: "http://www.content-watch.ru/public/api/",
            data: {text:"Свой индивидуальный опыт я считаю достаточно репрезентативным \n\
                        в связи с тем, что являюсь профессиональным пользователем Microsoft Office с 1996 года. \n\
                        Я профессионально как автор, рецензент и редактор с 1996 года ежедневно (может быть, \n\
                        разве что за исключением дня свадьбы) вынужден находиться в Microsoft Office буквально круглосуточно. \n\
                        За день через меня проходят примерно 25-30 файлов Word и 15-20 файлов Powerpoint, \n\
                        содержащих любые возможные функции, т.е. достаточно больших и сложных \n\
                        (Word, как правило, не менее 200 страниц; Powerpoint, как правило, не менее 70 слайдов). \n\
                        За прошедшие 14 лет я попробовал все имевшиеся версии Microsoft Office на всех имевших место версиях Windows. \n\
                        Надеюсь, что обратившие на себя мое внимание особенности будут репрезентативны для более «мягких» сценариев. \n\
                        Хотелось внести некоторую ясность, т.к. с одной стороны сама Microsoft и большинство деловых пользователей \n\
                        в США утверждают о полной совместимости, в то время как в рунете в большинстве случаев можно услышать \n\
                        противоположное.",
                    key: "N8bW1QnkuYbe3AT",
                    format: "json",
                    test: "1"},
            success: function(data) {
                $('.results').html(data.text + '<br>' + data.key + '<br>' + data.error);
            }
        });
    });
*/

    $('.sample8').click(function() {
        $.ajax({
            type: 'POST',
            url: 'proxy.php',
            dataType: 'json',
            data: {text: 'Свой индивидуальный опыт я считаю достаточно репрезентативным \n\
                        в связи с тем, что являюсь профессиональным пользователем Microsoft Office с 1996 года. \n\
                        Я профессионально как автор, рецензент и редактор с 1996 года ежедневно (может быть, \n\
                        разве что за исключением дня свадьбы) вынужден находиться в Microsoft Office буквально круглосуточно. \n\
                        За день через меня проходят примерно 25-30 файлов Word и 15-20 файлов Powerpoint, \n\
                        содержащих любые возможные функции, т.е. достаточно больших и сложных \n\
                        (Word, как правило, не менее 200 страниц; Powerpoint, как правило, не менее 70 слайдов). \n\
                        За прошедшие 14 лет я попробовал все имевшиеся версии Microsoft Office на всех имевших место версиях Windows. \n\
                        Надеюсь, что обратившие на себя мое внимание особенности будут репрезентативны для более «мягких» сценариев. \n\
                        Хотелось внести некоторую ясность, т.к. с одной стороны сама Microsoft и большинство деловых пользователей \n\
                        в США утверждают о полной совместимости, в то время как в рунете в большинстве случаев можно услышать \n\
                        противоположное.',
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

    <div class="results">Ждем ответа</div>
</div>

    </body>
</html>