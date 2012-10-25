<?php

class pageFormation {

    public function get_protect($value)
    {
        if (get_magic_quotes_gpc()) {
            $value = stripslashes($value);
        }
        if (!is_numeric($value)) {
            //$value = mysql_real_escape_string($value);
            die('Do not even try...');                    //delete?
        }
        return $value;
    }

    public function getTitle($val)
    {
        /*
        $url= parse_url($_SERVER['REQUEST_URI']);
        if (preg_match("/test/i", $url[path])) {echo 'true';};
        */
        $title_query = "SELECT title FROM pages WHERE page='$val'";
        $title_result = mysql_query($title_query);
        $title_row = mysql_fetch_array($title_result);
        $title_exit = $title_row[0];
        return $title_exit;
    }

    public function getDescription($val)
    {
        $description_query = "SELECT description FROM pages WHERE page='$val'";
        $description_result = mysql_query($description_query);
        $description_row = mysql_fetch_array($description_result);
        $description_exit = $description_row[0];
        return $description_exit;
    }

    public function getThesis($var)
    {
        $section_query = "SELECT title,text FROM section_data";
        $section_result = mysql_query($section_query);
        while ($section_row = mysql_fetch_array($section_result)) {
            $section_exit[] = "<h2>".$section_row[0]."</h2>".
                              "<p>".$section_row[1]."</p>";
        }
        return $section_exit[$var];
    }

    public function getArticles()
    {
        $articles_query = "SELECT id,title FROM articles";
        $articles_result = mysql_query($articles_query);
        while ($articles_row = mysql_fetch_array($articles_result)) {
            $articles_exit[] = "<li><a href='index.php?articles_id=$articles_row[0]#$articles_row[0]' class='article_title'>".$articles_row[1]."</a></li>";
        }
        return $articles_exit;
    }

    public function getTopNews()
    {
        $top_news_query = "SELECT title,text,image FROM top_new";
        $top_news_result = mysql_query($top_news_query);
        $top_news_row = mysql_fetch_array($top_news_result);
        $top_news_exit =                          "<h3 class='pad1'>".$top_news_row[0]."</h3>".
                         "<p>".$top_news_row[1]."</p>";
        return $top_news_exit;
    }

    public function getNews()
    {
        $news_query = "SELECT id,image,title,text FROM news ORDER BY id DESC LIMIT 3";
        $news_result = mysql_query($news_query);
        while ($news_row = mysql_fetch_array($news_result)) {
            $news_exit[] = "<div class='news'>".
                                "<div class='extra-wrap'>".
                                    "<a href='index.php?news_id=$news_row[0]#$news_row[0]' class='link'>".$news_row[2]."</a>".
                                    "<p>".$news_row[3]."</p>".
                                "</div>".
                           "</div>";
        }
        return $news_exit;
    }

    public function getFullNews()
    {
        $full_news_query = "SELECT id,title,text,date FROM news ORDER BY date DESC";
        $full_news_result = mysql_query($full_news_query);
        while ($full_news_row = mysql_fetch_array($full_news_result)) {
            $full_news_exit[] = "<div class='single_new' id='$full_news_row[0]'>".
                                "<h4>".$full_news_row[1]."</h4>".
                                "<p class='extra-wrap'>".$full_news_row[2]."</p>".
                                "<p class='extra-wrap'>".$full_news_row[3]."</p>".
                                "</div>";
        }
        return $full_news_exit;
    }

    public function getFullArticless()
    {
        $full_articles_query = "SELECT id,title,text FROM articles";
        $full_articles_result = mysql_query($full_articles_query);
        while ($full_articles_row = mysql_fetch_array($full_articles_result)) {
            $full_articles_exit[] = "<div class='single_article' id='$full_articles_row[0]'>".
                                    "<h4>".$full_articles_row[1]."</h4>".
                                    "".$full_articles_row[2]."".
                                    "<p class='extra-wrap'>".$full_articles_row[3]."</p>".
                                    "</div>";
        }
        return $full_articles_exit;
    }
    //Формирование массива преимуществ
    public function getAdvantages() {
        $advantages_query = "SELECT id,title,text FROM advantages";
        $advantages_result = mysql_query($advantages_query);
        while ($advantages_row = mysql_fetch_array($advantages_result)) {
            $advantages_exit[] = "<div class='wrapper lineBot padtop3'>".
                                    "<div class='dropcap'>".$advantages_row[0]."</div>".
                                    "<div class='extra-wrap'>".
                                        "<h4>".$advantages_row[1]."</h4>".
                                        "<p class='padbot4'>".$advantages_row[2]."</p>".
                                    "</div>".
                                 "</div>";
        }
        return $advantages_exit;
    }

    //Формирование массива с миссией
    public function getMission() {
        $mission_query = "SELECT title,text FROM mission";
        $mission_result = mysql_query($mission_query);
        while ($mission_row = mysql_fetch_array($mission_result)) {
            $mission_exit[] = "<h4>".$mission_row[0]."</h4>".
                              "<p class'padtop2 padbot2'>".$mission_row[1]."</p>";
        }
        return $mission_exit[0];
    }

    //Формирование массива с отзывами
    public function getFeedback() {

        $feedback_query = "SELECT text,author FROM feedback";
        $feedback_result = mysql_query($feedback_query);
        while ($feedback_row = mysql_fetch_array($feedback_result)) {
            $feedback_exit[] = "<div class='quote'>".
                                    "<blockquote>".$feedback_row[0]."</blockquote>".
                                    "<span></span>".
                               "</div>".
                               "<div class='quote-link'>"."<p>".$feedback_row[1]."</p>"."</div>";
        }
        return $feedback_exit;
    }

    //Формирование массива с вопросами-ответами
    public function getFAQ() {
        $faq_query = "SELECT question,answer FROM faq";
        $faq_result = mysql_query($faq_query);
        while ($faq_row = mysql_fetch_array($faq_result)) {
            $faq_exit[] = "<div class='wrapper faq'>".
                          "<div class='text2 fleft'>".$faq_row[0]."</div>".
                          "</div>".

                          "<div class='wrapper faq2'>".
                          "<div class='text2 fleft'>".''."</div>".
                          "<p class='extra-wrap'>".$faq_row[1]."</p>".
                          "</div>";
        }
        return $faq_exit;
    }

    //Формирование массива фишек сервисов
    public function getServicesFeatures($var) {
        $services_features_query = "SELECT title,text FROM services_features";
        $services_features_result = mysql_query($services_features_query);
        while ($services_features_row = mysql_fetch_array($services_features_result)) {
            $services_features_exit[] = "<h2>".$services_features_row[0]."</h2>".
                                        "<p class='padbot text1'>".$services_features_row[1]."</p>";
        }
        return $services_features_exit[$var];
    }

    //Формирование массива главных фишек
    public function getTopFeatures($var) {
        $top_features_query = "SELECT title,text,image FROM top_features";
        $top_features_result = mysql_query($top_features_query);
        while ($top_features_row = mysql_fetch_array($top_features_result)) {
            $top_features_exit[] = "<img src='$top_features_row[2]' class='imgindent img1'>".
                                   "<h3 class='padbot5'>".$top_features_row[0]."</h3>".
                                   "<p class='padbot6'>".$top_features_row[1]."</p>";
        }
        return $top_features_exit[$var];
    }
}
?>