<?php

class AdminFormation {

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

    public function quote_smart($value)
    {
            $value = trim($value);
            $value = stripslashes($value);
            $value = mysql_real_escape_string($value);
            return $value;
    }

    public function getThesisTitle($block)
    {
        $section_query = "SELECT title FROM section_data WHERE id='$block'";
        $section_result = mysql_query($section_query);
        $section_row = mysql_fetch_array($section_result);
        $section_exit = $section_row[0];

        return $section_exit;
    }

    public function getThesisText($block)
    {
        $section_query = "SELECT text FROM section_data WHERE id='$block'";
        $section_result = mysql_query($section_query);
        $section_row = mysql_fetch_array($section_result);
        $section_exit = $section_row[0];

        return $section_exit;
    }

    public function getNewsImage($id)
    {
        $news_image_query = "SELECT image FROM news WHERE id='$id'";
        $news_image_result = mysql_query($news_image_query);
        $news_image_row = mysql_fetch_array($news_image_result);
        $news_image_exit = $news_image_row[0];
        return $news_image_exit;
    }

    public function getNewsTitle($id)
    {
        $news_title_query = "SELECT title FROM news WHERE id='$id'";
        $news_title_result = mysql_query($news_title_query);
        $news_title_row = mysql_fetch_array($news_title_result);
        $news_title_exit = $news_title_row[0];
        return $news_title_exit;
    }

    public function getNewsText($id)
    {
        $news_text_query = "SELECT text FROM news WHERE id='$id'";
        $news_text_result = mysql_query($news_text_query);
        $news_text_row = mysql_fetch_array($news_text_result);
        $news_text_exit = $news_text_row[0];
        return $news_text_exit;
    }

    public function getNewsDate($id)
    {
        $news_date_query = "SELECT date FROM news WHERE id='$id'";
        $news_date_result = mysql_query($news_date_query);
        $news_date_row = mysql_fetch_array($news_date_result);
        $news_date_exit = $news_date_row[0];
        return $news_date_exit;
    }

    public function getAdvantagesImage($id)
    {
        $advantages_image_query = "SELECT image FROM advantages WHERE id='$id'";
        $advantages_image_result = mysql_query($advantages_image_query);
        $advantages_image_row = mysql_fetch_array($advantages_image_result);
        $advantages_image_exit = $advantages_image_row[0];
        return $advantages_image_exit;
    }

    public function getAdvantagesTitle($id)
    {
        $advantages_title_query = "SELECT title FROM advantages WHERE id='$id'";
        $advantages_title_result = mysql_query($advantages_title_query);
        $advantages_title_row = mysql_fetch_array($advantages_title_result);
        $advantages_title_exit = $advantages_title_row[0];
        return $advantages_title_exit;
    }

    public function getAdvantagesText($id)
    {
        $advantages_text_query = "SELECT text FROM advantages WHERE id='$id'";
        $advantages_text_result = mysql_query($advantages_text_query);
        $advantages_text_row = mysql_fetch_array($advantages_text_result);
        $advantages_text_exit = $advantages_text_row[0];
        return $advantages_text_exit;
    }

    public function getTopFeaturesImage($block)
    {
        $top_features_image_query = "SELECT image FROM top_features WHERE id='$block'";
        $top_features_image_result = mysql_query($top_features_image_query);
        $top_features_image_row = mysql_fetch_array($top_features_image_result);
        $top_features_image_exit = $top_features_image_row[0];
        return $top_features_image_exit;
    }

    public function getTopFeaturesTitle($block)
    {
        $top_features_title_query = "SELECT text FROM top_features WHERE id='$block'";
        $top_features_title_result = mysql_query($top_features_title_query);
        $top_features_title_row = mysql_fetch_array($top_features_title_result);
        $top_features_title_exit = $top_features_title_row[0];

        return $top_features_title_exit;
    }

    public function getTopFeaturesText($block)
    {
        $top_features_text_query = "SELECT text FROM top_features WHERE id='$block'";
        $top_features_text_result = mysql_query($top_features_text_query);
        $top_features_text_row = mysql_fetch_array($top_features_text_result);
        $top_features_text_exit = $top_features_text_row[0];

        return $top_features_text_exit;
    }

    public function getArticlesTitle($articles_edit_id)
    {
        $articles_title_query = "SELECT title FROM articles WHERE id='$articles_edit_id'";
        $articles_title_result = mysql_query($articles_title_query);
        $articles_title_row = mysql_fetch_array($articles_title_result);
        $articles_title_exit = $articles_title_row[0];
        return $articles_title_exit;
    }

    public function getArticlesText($articles_edit_id)
    {
        $articles_text_query = "SELECT text FROM articles articles WHERE id='$articles_edit_id'";
        $articles_text_result = mysql_query($articles_text_query);
        $articles_text_row = mysql_fetch_array($articles_text_result);
        $articles_text_exit = $articles_text_row[0];
        return $articles_text_exit;
    }

    public function getServicesFeaturesTitle($var)
    {
        $services_features_title_query = "SELECT title FROM services_features WHERE id='$var'";
        $services_features_title_result = mysql_query($services_features_title_query);
        $services_features_title_row = mysql_fetch_array($services_features_title_result);
        $services_features_title_exit = $services_features_title_row[0];
        return $services_features_title_exit;
    }

    public function getServicesFeaturesText($var)
    {
        $services_features_text_query = "SELECT text FROM services_features WHERE id='$var'";
        $services_features_text_result = mysql_query($services_features_text_query);
        $services_features_text_row = mysql_fetch_array($services_features_text_result);
        $services_features_text_exit = $services_features_text_row[0];
        return $services_features_text_exit;
    }

    public function getFeedbackAuthor($id)
    {
        $feedback_author_query = "SELECT author FROM feedback WHERE id='$id'";
        $feedback_author_result = mysql_query($feedback_author_query);
        $feedback_author_row = mysql_fetch_array($feedback_author_result);
        $feedback_author_exit = $feedback_author_row[0];
        return $feedback_author_exit;
    }

    public function getFeedbackText($id)
    {
        $feedback_text_query = "SELECT author FROM feedback WHERE id='$id'";
        $feedback_text_result = mysql_query($feedback_text_query);
        $feedback_text_row = mysql_fetch_array($feedback_text_result);
        $feedback_text_exit = $feedback_text_row[0];
        return $feedback_text_exit;
    }

    public function getMissionTitle()
    {
        $mission_title_query = "SELECT title FROM mission";
        $mission_title_result = mysql_query($mission_title_query);
        $mission_title_row = mysql_fetch_array($mission_title_result);
        $mission_title_exit[] = $mission_title_row[0];
        return $mission_title_exit[0];
    }

    public function getMissionText()
    {
        $mission_text_query = "SELECT text FROM mission";
        $mission_text_result = mysql_query($mission_text_query);
        $mission_text_row = mysql_fetch_array($mission_text_result);
        $mission_text_exit[] = $mission_text_row[0];
        return $mission_text_exit[0];
    }

    public function getFAQQuestion($faq_edit_id)
    {
        $faq_question_query = "SELECT question FROM faq WHERE id='$faq_edit_id'";
        $faq_question_result = mysql_query($faq_question_query);
        $faq_question_row = mysql_fetch_array($faq_question_result);
        $faq_question_exit = $faq_question_row[0];
        return $faq_question_exit;
    }

    public function getFAQAnswer($faq_edit_id)
    {
        $faq_answer_query = "SELECT answer FROM faq WHERE id='$faq_edit_id'";
        $faq_answer_result = mysql_query($faq_answer_query);
        $faq_answer_row = mysql_fetch_array($faq_answer_result);
        $faq_answer_exit = $faq_answer_row[0];
        return $faq_answer_exit;
    }

    public function getTopNewsImage()
    {
        $top_news_image_query = "SELECT image FROM top_new";
        $top_news_image_result = mysql_query($top_news_image_query);
        $top_news_image_row = mysql_fetch_array($top_news_image_result);
        $top_news_image_exit = $top_news_image_row[0];
        return $top_news_image_exit;
    }

    public function getTopNewsTitle()
    {
        $top_news_title_query = "SELECT title FROM top_new";
        $top_news_title_result = mysql_query($top_news_title_query);
        $top_news_title_row = mysql_fetch_array($top_news_title_result);
        $top_news_title_exit = $top_news_title_row[0];
        return $top_news_title_exit;
    }

    public function getTopNewsText()
    {
        $top_news_text_query = "SELECT text FROM top_new";
        $top_news_text_result = mysql_query($top_news_text_query);
        $top_news_text_row = mysql_fetch_array($top_news_text_result);
        $top_news_text_exit = $top_news_text_row[0];
        return $top_news_text_exit;
    }

    public function getThemeName($theme_id) {
        $theme_name_query = "SELECT theme FROM themes WHERE id='$theme_id'";
        $theme_name_result = mysql_query($theme_name_query);
        $theme_name_row = mysql_fetch_array($theme_name_result);
        $theme_name_exit = $theme_name_row[0];
        return $theme_name_exit;
    }

    public function getUserList() {
        $admin_users_query = "SELECT id,email FROM users";
        $admin_users_result = mysql_query($admin_users_query);
        while ($admin_users_row = mysql_fetch_array($admin_users_result)) {
            $admin_users_exit[] = "<li><a href=./users.php?action=show_user_articles&user_id=$admin_users_row[0]&user_email=$admin_users_row[1]>$admin_users_row[1]</a></li>"; //пока по email, после нормализации сделать по id
        }
        return $admin_users_exit;
    }
}
?>