<?php
class AdminController {

    public function postController($post,$theme_id = null) {
        $post_controller = new AdminEdition();
        switch ($post) {
        case 'theme_add_submit':
            $post_controller->themeAdd();
            break;
        case 'theme_edit_submit':
            $post_controller->themeEdit($theme_id);
            break;
        case 'theme_del_submit':
            $post_controller->themeDel($theme_id);
            break;
        //---------------
        case 'section_data_submit':
            $post_controller->sectionDataSubmit();
            break;
        case 'top_news_submit':
            $post_controller->topNewsEdit();
            break;
        case 'news_add_submit':
            $post_controller->newsAdd();
            break;
        case 'news_del_submit':
            $post_controller->newsDel();
            break;
        case 'news_edit_submit':
            $post_controller->newsEdit();
            break;
        case 'articles_edit_submit':
            $post_controller->articlesEdit();
            break;
        case 'advantages_add_submit':
            $post_controller->advantagesAdd();
            break;
        case 'advantages_del_submit':
            $post_controller->advantagesDel();
            break;
        case 'advantages_edit_submit':
            $post_controller->advantagesEdit();
            break;
        case 'feedback_add_submit':
            $post_controller->feedbackAdd();
            break;
        case 'feedback_del_submit':
            $post_controller->feedbackDel();
            break;
        case 'feedback_edit_submit':
            $post_controller->feedbackEdit();
            break;
        case 'mission_edit_submit':
            $post_controller->missionEdit();
            break;
        case 'services_features_edit_submit':
            $post_controller->servicesFeaturesEdit();
            break;
        case 'top_features_edit_submit':
            $post_controller->topFeaturesEdit();
            break;
        case 'qa_add_submit':
            $post_controller->qaAdd();
            break;
        case 'qa_del_submit':
            $post_controller->qaDel();
            break;
        case 'qa_edit_submit':
            $post_controller->qaEdit();
            break;
        case 'article_response':
            $post_controller->articleResponse();
            break;
        //------------
        }
    }

    public function getController($get) {
        $get_controller = new AdminFormation($get);
        switch ($get) {
        case 'theme_add' :
            include 'includes/theme_add.php';
            break;
        case 'theme_edit' :
            include 'includes/theme_edit.php';
            break;
        case 'theme_del' :
            include 'includes/theme_del.php';
            break;
        //--------------
        case 'section_data_edit':
            include 'includes/section_data_edit.php';
            break;
        case 'top_news_edit':
            include 'includes/top_news_edit.php';
            break;
        case 'articles_edit':
            include 'includes/articles_edit.php';
            break;
        case 'news_add':
            include 'includes/news_add.php';
            break;
        case 'news_del':
            include 'includes/news_del.php';
            break;
        case 'news_edit':
            include 'includes/news_edit.php';
            break;
        case 'advantages_add':
            include 'includes/advantages_add.php';
            break;
        case 'advantages_del':
            include 'includes/advantages_del.php';
            break;
        case 'advantages_edit':
            include 'includes/advantages_edit.php';
            break;
        case 'feedback_add':
            include 'includes/feedback_add.php';
            break;
        case 'feedback_del':
            include 'includes/feedback_del.php';
            break;
        case 'feedback_edit':
            include 'includes/feedback_edit.php';
            break;
        case 'mission_edit':
            include 'includes/mission_edit.php';
            break;
        case 'services_features_edit':
            include 'includes/services_features_edit.php';
            break;
        case 'top_features_edit':
            include 'includes/top_features_edit.php';
            break;
        case 'qa_add':
            include 'includes/qa_add.php';
            break;
        case 'qa_del':
            include 'includes/qa_del.php';
            break;
        case 'qa_edit':
            include 'includes/qa_edit.php';
            break;
        case 'theme_add' :
            include 'includes/theme_add.php';
            break;
        //--------------
        case 'show_user_articles' :
            include 'includes/user_articles_list.php';
            break;
        case 'show_article' :
            include 'includes/user_article.php';
            break;
        case 'show_all_articles' :
            include 'includes/show_all_articles.php';
            break;
        }
    }
}
?>