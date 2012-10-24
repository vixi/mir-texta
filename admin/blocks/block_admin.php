    <div class="span8">
        <?php
        $admin = new AdminFormation();
        switch ($_GET[action]) {
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
        }

        $admin_edit = new AdminEdition($alerts_messages);
        switch ($_POST[submit]) {
        case 'section_data_submit':
        $admin_edit->sectionDataSubmit();
            break;
        case 'top_news_submit':
        $admin_edit->topNewsEdit();
            break;
        case 'news_add_submit':
        $admin_edit->newsAdd();
            break;
        case 'news_del_submit':
        $admin_edit->newsDel();
            break;
        case 'news_edit_submit':
        $admin_edit->newsEdit();
            break;
        case 'articles_edit_submit':
        $admin_edit->articlesEdit();
            break;
        case 'advantages_add_submit':
        $admin_edit->advantagesAdd();
            break;
        case 'advantages_del_submit':
        $admin_edit->advantagesDel();
            break;
        case 'advantages_edit_submit':
        $admin_edit->advantagesEdit();
            break;
        case 'feedback_add_submit':
        $admin_edit->feedbackAdd();
            break;
        case 'feedback_del_submit':
        $admin_edit->feedbackDel();
            break;
        case 'feedback_edit_submit':
        $admin_edit->feedbackEdit();
            break;
        case 'mission_edit_submit':
        $admin_edit->missionEdit();
            break;
        case 'services_features_edit_submit':
        $admin_edit->servicesFeaturesEdit();
            break;
        case 'top_features_edit_submit':
        $admin_edit->topFeaturesEdit();
            break;
        case 'qa_add_submit':
        $admin_edit->qaAdd();
            break;
        case 'qa_del_submit':
        $admin_edit->qaDel();
            break;
        case 'qa_edit_submit':
        $admin_edit->qaEdit();
            break;
        }
        ?>
    </div>
</div>