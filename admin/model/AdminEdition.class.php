<?php
class AdminEdition {

    private $alert_success_add     = 'Добавление завершено.';
    private $alert_success_delete  = 'Удаление завершено.';
    private $alert_success_changes = 'Изменение завершено.';
    private $alert_error_field     = 'Вы не заполнили одно из полей.';
    private $alert_error_image     = 'Неверное расширение изображения.';

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
/*
    public function postArrayProtection()
    {
        foreach ($_POST as $key => $value) {
            if (isset($_POST[$key])) {
                $$key = $this->quote_smart($_POST[$key]);
                if ($$key == '')
                    {unset($$key);
                }
            }
        }
    }
*/
    public function sectionDataSubmit()
    {
        if (isset($_POST[section_data_title])) {$section_data_title = $this->quote_smart($_POST[section_data_title]); if ($section_data_title == '') {unset($section_data_title);}}
        if (isset($_POST[section_data_text])) {$section_data_text = $this->quote_smart($_POST[section_data_text]); if ($section_data_text == '') {unset($section_data_text);}}
        if (isset($_POST[section_data_block])) {$section_data_block = $this->quote_smart($_POST[section_data_block]); if ($section_data_block == '') {unset($section_data_block);}}
        if (isset($section_data_title)&&isset($section_data_text)&&isset($section_data_block)) {
            $section_data_edit_query = "UPDATE section_data SET title='$section_data_title',text='$section_data_text' WHERE id='$section_data_block'";
            if ($section_data_edit_result = mysql_query($section_data_edit_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function topNewsEdit()
    {
        if (isset($_FILES[top_news_image][name])) {$top_news_image = $_FILES[top_news_image][name]; if ($top_news_image == '') {unset($top_news_image);} else {$top_news_image = 'upload/'.$top_news_image;}}
        if (isset($_POST[top_news_title])) {$top_news_title = $this->quote_smart($_POST[top_news_title]); if ($top_news_title == '') {unset($top_news_title);}}
        if (isset($_POST[top_news_text])) {$top_news_text = $this->quote_smart($_POST[top_news_text]); if ($top_news_text == '') {unset($top_news_text);}}
        if (isset($top_news_title)&&isset($top_news_text)) {
            if (isset($top_news_image)) {
                $top_news_edit_query = "UPDATE top_new SET image='$top_news_image',
                                                           title='$top_news_title',
                                                           text='$top_news_text' WHERE id='1'";
                if ($_FILES['top_news_image']['type']=='image/jpeg' or $_FILES['top_news_image']['type']=='image/png') {
                    $uploads_dir = '../upload/';
                    $tmp_name = $_FILES[top_news_image][tmp_name];
                    $name = $_FILES[top_news_image][name];
                    if (move_uploaded_file($tmp_name, $uploads_dir.$name) and mysql_query($top_news_edit_query)) {
                        echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
                    }
                } else {
                    echo "<div class='alert alert-error'>".$this->alert_error_image."</div>";
                }
            } else {
                $top_news_edit_query = "UPDATE top_new SET title='$top_news_title',
                                                           text='$top_news_text' WHERE id='1'";
                if ($top_news_edit_result = mysql_query($top_news_edit_query)) {
                    echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
                }
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function newsAdd()
    {
        if (isset($_FILES[news_add_image][name])) {$news_add_image = $_FILES[news_add_image][name]; if ($news_add_image == '') {unset($news_add_image);}}
        if (isset($_POST[news_add_title])) {$news_add_title = $this->quote_smart($_POST[news_add_title]); if ($news_add_title == '') {unset($news_add_title);}}
        if (isset($_POST[news_add_text])) {$news_add_text = $this->quote_smart($_POST[news_add_text]); if ($news_add_text == '') {unset($news_add_text);}}
        if (isset($_POST[news_add_date])) {$news_add_date = $this->quote_smart($_POST[news_add_date]); if ($news_add_date == '') {unset($news_add_date);}}
        if (isset($news_add_image)&&isset($news_add_title)&&isset($news_add_text)&&isset($news_add_date)) {
                $news_add_query = "INSERT INTO news (image,title,text,date) VALUES ('upload/$news_add_image','$news_add_title','$news_add_text','$news_add_date')";
            //perhaps there is bug with image type
            if ($_FILES['news_add_image']['type']=='image/jpeg' or $_FILES['news_add_image']['type']=='image/png') {
                $uploads_dir = '../upload/';
                $tmp_name    = $_FILES[news_add_image][tmp_name];
                $name        = $_FILES[news_add_image][name];
            } else {
                echo "<div class='alert alert-error'>".$this->alert_error_image."</div>";
            }
            if ($news_add_result = mysql_query($news_add_query) and move_uploaded_file($tmp_name, $uploads_dir.$name)) {
                echo "<div class='alert alert-success'>".$this->alert_success_add."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function newsDel()
    {
        if (isset($_POST[news_del_id])) {
            $news_del_query = "DELETE FROM news WHERE id='$_POST[news_del_id]'";
        }
        if ($news_del_result = mysql_query($news_del_query)) {
            echo "<div class='alert alert-success'>".$this->alert_success_delete."</div>";
        }
    }

    public function newsEdit()
    {
        if (isset($_FILES[news_edit_image][name])) {$news_edit_image = $_FILES[news_edit_image][name];if ($news_edit_image == ''){unset($news_edit_image);} else {$news_edit_image = 'upload/'.$news_edit_image;}}
        if (isset($_POST[news_edit_title])) {$news_edit_title = $this->quote_smart($_POST[news_edit_title]); if ($news_edit_title == '') {unset($news_edit_title);}}
        if (isset($_POST[news_edit_text])) {$news_edit_text = $this->quote_smart($_POST[news_edit_text]); if ($news_edit_text == '') {unset($news_edit_text);}}
        if (isset($_POST[news_edit_date])) {$news_edit_date = $this->quote_smart($_POST[news_edit_date]); if ($news_edit_date == '') {unset($news_edit_date);}}
        if (isset($_POST[news_edit_id])) {$news_edit_id = $this->quote_smart($_POST[news_edit_id]); if ($news_edit_id == '') {unset($news_edit_id);}}
        if (isset($news_edit_title)&&isset($news_edit_text)&&isset($news_edit_date)) {
            if (isset($news_edit_image)) {
            $news_edit_query = "UPDATE news SET image='$news_edit_image',
                                                title='$news_edit_title',
                                                text='$news_edit_text',
                                                date='$news_edit_date' WHERE id='$news_edit_id'";
                if ($_FILES['news_edit_image']['type']=='image/jpeg' or $_FILES['news_edit_image']['type']=='image/png') {
                    $uploads_dir = '../upload/';
                    $tmp_name    = $_FILES[news_edit_image][tmp_name];
                    $name        = $_FILES[news_edit_image][name];
                    if (move_uploaded_file($tmp_name, $uploads_dir.$name) and mysql_query($news_edit_query)) {
                        echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
                    }
                } else {
                    echo "<div class='alert alert-error'>".$this->alert_error_image."</div>";
                }
            } else {
                $news_edit_query = "UPDATE news SET title='$news_edit_title',
                                                    text='$news_edit_text',
                                                    date='$news_edit_date' WHERE id='$news_edit_id'";
                if (mysql_query($news_edit_query)) {
                    echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
                }
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function articlesEdit()
    {
        if (isset($_POST[articles_edit_title])) {$articles_edit_title = $this->quote_smart($_POST[articles_edit_title]); if ($articles_edit_title == '') {unset($articles_edit_title);}}
        if (isset($_POST[articles_edit_text])) {$articles_edit_text = $this->quote_smart($_POST[articles_edit_text]); if ($articles_edit_text == '') {unset($articles_edit_text);}}
        if (isset($_POST[articles_edit_id])) {$articles_edit_id = $this->quote_smart($_POST[articles_edit_id]); if ($articles_edit_id == '') {unset($articles_edit_id);}}
        if (isset($articles_edit_title)&&isset($articles_edit_text)&&isset($articles_edit_id)) {
            $articles_edit_query = "UPDATE articles SET title='$articles_edit_title',
                                                        text='$articles_edit_text' WHERE id='$articles_edit_id'";
            if (mysql_query($articles_edit_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function advantagesAdd()
    {
        if (isset($_FILES[advantages_add_image][name])) {$advantages_add_image = $_FILES[advantages_add_image][name]; if ($advantages_add_image == '') {unset($advantages_add_image);}}
        if (isset($_POST[advantages_add_title])) {$advantages_add_title = $this->quote_smart($_POST[advantages_add_title]); if ($advantages_add_title == '') {unset($advantages_add_title);}}
        if (isset($_POST[advantages_add_text])) {$advantages_add_text = $this->quote_smart($_POST[advantages_add_text]); if ($advantages_add_text == '') {unset($advantages_add_text);}}
        if (isset($advantages_add_image)&&isset($advantages_add_title)&&isset($advantages_add_text)) {
                $advantages_add_query = "INSERT INTO advantages (image,title,text) VALUES ('upload/$advantages_add_image','$advantages_add_title','$advantages_add_text')";
            //perhaps there is bug with image type
            if ($_FILES['advantages_add_image']['type']=='image/jpeg' or $_FILES['advantages_add_image']['type']=='image/png') {
                $uploads_dir = '../upload/';
                $tmp_name    = $_FILES[advantages_add_image][tmp_name];
                $name        = $_FILES[advantages_add_image][name];
            } else {
                echo "<div class='alert alert-error'>".$this->alert_error_image."</div>";
            }
            if ($advantages_add_result = mysql_query($advantages_add_query) and move_uploaded_file($tmp_name, $uploads_dir.$name)) {
                echo "<div class='alert alert-success'>".$this->alert_success_add."</div>";
            } else {
                echo "<div class='alert alert-error'>error</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function advantagesDel()
    {
        if (isset($_POST[advantages_del_id])) {
            $advantages_del_query = "DELETE FROM advantages WHERE id='$_POST[advantages_del_id]'";
            }
        if ($advantages_del_result = mysql_query($advantages_del_query)) {
            echo "<div class='alert alert-success'>".$this->alert_success_delete."</div>";
        }
    }

    public function advantagesEdit()
    {
        if (isset($_FILES[advantages_edit_image][name])) {$advantages_edit_image = $_FILES[advantages_edit_image][name];if ($advantages_edit_image == ''){unset($advantages_edit_image);} else {$advantages_edit_image = 'upload/'.$advantages_edit_image;}}
        if (isset($_POST[advantages_edit_title])) {$advantages_edit_title = $this->quote_smart($_POST[advantages_edit_title]); if ($advantages_edit_title == '') {unset($advantages_edit_title);}}
        if (isset($_POST[advantages_edit_text])) {$advantages_edit_text = $this->quote_smart($_POST[advantages_edit_text]); if ($advantages_edit_text == '') {unset($advantages_edit_text);}}
        if (isset($_POST[advantages_edit_id])) {$advantages_edit_id = $this->quote_smart($_POST[advantages_edit_id]); if ($advantages_edit_id == '') {unset($advantages_edit_id);}}
        if (isset($advantages_edit_title)&&isset($advantages_edit_text)&&isset($advantages_edit_id)) {
            if (isset($advantages_edit_image)) {
            $advantages_edit_query = "UPDATE advantages SET image='$advantages_edit_image',
                                                            title='$advantages_edit_title',
                                                            text='$advantages_edit_text' WHERE id='$advantages_edit_id'";
                if ($_FILES['advantages_edit_image']['type']=='image/jpeg' or $_FILES['advantages_edit_image']['type']=='image/png') {
                    $uploads_dir = '../upload/';
                    $tmp_name    = $_FILES[advantages_edit_image][tmp_name];
                    $name        = $_FILES[advantages_edit_image][name];
                    if (move_uploaded_file($tmp_name, $uploads_dir.$name) and mysql_query($advantages_edit_query)) {
                        echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
                    }
                } else {
                    echo "<div class='alert alert-error'>".$this->alert_error_image."</div>";
                }
            } else {
                $advantages_edit_query = "UPDATE advantages SET title='$advantages_edit_title',
                                                                text='$advantages_edit_text' WHERE id='$advantages_edit_id'";
                if (mysql_query($advantages_edit_query)) {
                    echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
                }
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function feedbackAdd()
    {
        if (isset($_POST[feedback_add_author])) {$feedback_add_author = $this->quote_smart($_POST[feedback_add_author]); if ($feedback_add_author == '') {unset($feedback_add_author);}}
        if (isset($_POST[feedback_add_text])) {$feedback_add_text = $this->quote_smart($_POST[feedback_add_text]); if ($feedback_add_text == '') {unset($feedback_add_text);}}
        if (isset($feedback_add_author)&&isset($feedback_add_text)) {
            $feedback_add_query = "INSERT INTO feedback (author,text) VALUES ('$feedback_add_author','$feedback_add_text')";
            if ($feedback_add_result = mysql_query($feedback_add_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_add."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function feedbackDel()
    {
        if (isset($_POST[feedback_del_id])) {
            $feedback_del_query = "DELETE FROM feedback WHERE id='$_POST[feedback_del_id]'";
        }
        if ($feedback_del_result = mysql_query($feedback_del_query)) {
            echo "<div class='alert alert-success'>".$this->alert_success_delete."</div>";
        }
    }

    public function feedbackEdit()
    {
        if (isset($_POST[feedback_edit_author])) {$feedback_edit_author = $this->quote_smart($_POST[feedback_edit_author]); if ($feedback_edit_author == '') {unset($feedback_edit_author);}}
        if (isset($_POST[feedback_edit_text])) {$feedback_edit_text = $this->quote_smart($_POST[feedback_edit_text]); if ($feedback_edit_text == '') {unset($feedback_edit_text);}}
        if (isset($_POST[feedback_edit_id])) {$feedback_edit_id = $this->quote_smart($_POST[feedback_edit_id]); if ($feedback_edit_id == '') {unset($feedback_edit_id);}}
        if (isset($feedback_edit_author)&&isset($feedback_edit_text)&&isset($feedback_edit_id)) {
            $feedback_edit_query = "UPDATE feedback SET author='$feedback_edit_author',
                                                        text='$feedback_edit_text' WHERE id='$feedback_edit_id'";
            if (mysql_query($feedback_edit_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function missionEdit()
    {
        if (isset($_POST[mission_edit_title])) {$mission_edit_title = $this->quote_smart($_POST[mission_edit_title]); if ($mission_edit_title == '') {unset($mission_edit_title);}}
        if (isset($_POST[mission_edit_text])) {$mission_edit_text = $this->quote_smart($_POST[mission_edit_text]); if ($mission_edit_text == '') {unset($mission_edit_text);}}
        if (isset($mission_edit_title)&&isset($mission_edit_text)) {
            $mission_edit_query = "UPDATE mission SET title='$mission_edit_title',
                                                        text='$mission_edit_text' WHERE id='1'";
            if (mysql_query($mission_edit_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function servicesFeaturesEdit()
    {
        if (isset($_POST[services_features_block])) {$services_features_block = $this->quote_smart($_POST[services_features_block]); if ($services_features_block == '') {unset($services_features_block);}}
        if (isset($_POST[services_features_title])) {$services_features_title = $this->quote_smart($_POST[services_features_title]); if ($services_features_title == '') {unset($services_features_title);}}
        if (isset($_POST[services_features_text])) {$services_features_text = $this->quote_smart($_POST[services_features_text]); if ($services_features_text == '') {unset($services_features_text);}}
        if (isset($services_features_title)&&isset($services_features_text)&&isset($services_features_block)) {
            $services_features_query = "UPDATE services_features SET title='$services_features_title',
                                                                     text='$services_features_text' WHERE id='$services_features_block'";
            if (mysql_query($services_features_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function topFeaturesEdit()
    {
        if (isset($_FILES[top_features_image][name])) {$top_features_image = $_FILES[top_features_image][name];if ($top_features_image == ''){unset($top_features_image);} else {$top_features_image = 'upload/'.$top_features_image;}}
        if (isset($_POST[top_features_title])) {$top_features_title = $this->quote_smart($_POST[top_features_title]); if ($top_features_title == '') {unset($top_features_title);}}
        if (isset($_POST[top_features_text])) {$top_features_text = $this->quote_smart($_POST[top_features_text]); if ($top_features_text == '') {unset($top_features_text);}}
        if (isset($_POST[top_features_block])) {$top_features_block = $this->quote_smart($_POST[top_features_block]); if ($top_features_block == '') {unset($top_features_block);}}
        if (isset($top_features_title)&&isset($top_features_text)&&isset($top_features_block)) {
            if (isset($top_features_image)) {
            $top_features_query = "UPDATE top_features SET image='$top_features_image',
                                                            title='$top_features_title',
                                                            text='$top_features_text' WHERE id='$top_features_block'";
                if ($_FILES['top_features_image']['type']=='image/jpeg' or $_FILES['top_features_image']['type']=='image/png') {
                    $uploads_dir = '../upload/';
                    $tmp_name    = $_FILES[top_features_image][tmp_name];
                    $name        = $_FILES[top_features_image][name];
                    if (move_uploaded_file($tmp_name, $uploads_dir.$name) and mysql_query($top_features_query)) {
                        echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
                    }
                } else {
                    echo "<div class='alert alert-error'>".$this->alert_error_image."</div>";
                }
            } else {
                $top_features_query = "UPDATE top_features SET title='$top_features_title',
                                                                text='$top_features_text' WHERE id='$top_features_block'";
                if (mysql_query($top_features_query)) {
                    echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
                }
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function qaAdd()
    {
        if (isset($_POST[qa_add_question])) {$qa_add_question = $this->quote_smart($_POST[qa_add_question]); if ($qa_add_question == '') {unset($qa_add_question);}}
        if (isset($_POST[qa_add_answer])) {$qa_add_answer = $this->quote_smart($_POST[qa_add_answer]); if ($qa_add_answer == '') {unset($qa_add_answer);}}
        if (isset($qa_add_question)&&isset($qa_add_answer)) {
            $qa_add_query = "INSERT INTO faq (question,answer) VALUES ('$qa_add_question','$qa_add_answer')";
            if ($qa_add_result = mysql_query($qa_add_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_add."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function qaDel()
    {
        if (isset($_POST[qa_del_id])) {
            $qa_del_query = "DELETE FROM faq WHERE id='$_POST[qa_del_id]'";
        }
        if (mysql_query($qa_del_query)) {
            echo "<div class='alert alert-success'>".$this->alert_success_delete."</div>";
        }
    }

    public function qaEdit()
    {
        if (isset($_POST[faq_edit_question])) {$faq_edit_question = $this->quote_smart($_POST[faq_edit_question]); if ($faq_edit_question == '') {unset($faq_edit_question);}}
        if (isset($_POST[faq_edit_answer])) {$faq_edit_answer = $this->quote_smart($_POST[faq_edit_answer]); if ($faq_edit_answer == '') {unset($faq_edit_answer);}}
        if (isset($_POST[faq_edit_id])) {$faq_edit_id = $this->quote_smart($_POST[faq_edit_id]); if ($faq_edit_id == '') {unset($faq_edit_id);}}
        if (isset($faq_edit_question)&&isset($faq_edit_answer)&&isset($faq_edit_id)) {
            $faq_edit_query = "UPDATE faq SET question='$faq_edit_question',
                                                        answer='$faq_edit_answer' WHERE id='$faq_edit_id'";
            if (mysql_query($faq_edit_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function themeAdd() {
        if (isset($_POST[theme])) {$theme = $this->quote_smart($_POST[theme]); if ($theme == '') {unset($theme);}}
        $theme_add_query = "INSERT INTO themes (theme) VALUES ('$theme')";
        if ($theme_add_result = mysql_query($theme_add_query)) {
            echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function themeEdit($theme_id)
    {
        if (isset($_POST[theme])) {$theme = $this->quote_smart($_POST[theme]); if ($theme == '') {unset($theme);}}
        if (isset($_POST[theme_id])) {$theme_id = $this->quote_smart($_POST[theme_id]); if ($theme_id == '') {unset($theme_id);}}
        if (isset($theme)&&isset($theme_id)) {
            $theme_edit_query = "UPDATE themes SET theme='$theme' WHERE id='$theme_id'";
            if (mysql_query($theme_edit_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
            }
        } else {
            echo "<div class='alert alert-error'>".$this->alert_error_field."</div>";
        }
    }

    public function themeDel($theme_id) {
        if (isset($_POST[theme_id])) {
            $theme_del_query = "DELETE FROM themes WHERE id='$theme_id'";
        }
        if (mysql_query($theme_del_query)) {
            echo "<div class='alert alert-success'>".$this->alert_success_delete."</div>";
        }
    }

    public function articleResponse() {
        if (isset($_POST[article_status])&&isset($_POST[article_id])) {
            $article_id = $this->get_protect($_POST[article_id]);
            $article_status = $this->get_protect($_POST[article_status]);
            $article_status_update_query = "UPDATE user_articles SET status='$article_status' WHERE id='$article_id'";
            if ($article_status_update_result = mysql_query($article_status_update_query)) {
                echo "<div class='alert alert-success'>".$this->alert_success_changes."</div>";
            }
        }
    }

    public function getArticleStatusById($article_id) {
        $status_query = "SELECT user_articles.status, status.status FROM user_articles
                         INNER JOIN status ON user_articles.status = status.id
                         WHERE user_articles.id='$article_id'";
        $status_result = mysql_query($status_query);
        $status_row = mysql_fetch_array($status_result);
        $status = $status_row[status];
        return $status;
    }
}
?>