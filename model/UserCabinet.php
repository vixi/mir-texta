<?php
class UserCabinet {

    public function quote_smart($value)
    {
        $value = trim($value);
        $value = stripslashes($value);
        $value = mysql_real_escape_string($value);
        return $value;
    }

    public function selectUserArticles()
    {
        $select_user_articles_query = "SELECT *  FROM user_articles WHERE email='$_SESSION[email]'";
        if ($select_user_articles_result = mysql_query($select_user_articles_query)) {
        while ($select_user_articles_row = mysql_fetch_array($select_user_articles_result)) {
            $select_user_articles_exit[] = "<tr>
                                                <td>$select_user_articles_row[3]</td>
                                                <td>$select_user_articles_row[5]</td>
                                                <td>$select_user_articles_row[6]</td>
                                                <td>$select_user_articles_row[8]</td>
                                                <td>$select_user_articles_row[9]</td>
                                                <td>$select_user_articles_row[10]</td>
                                                <td>$select_user_articles_row[11]</td>
                                                <td>$select_user_articles_row[12]</td>
                                            </tr>";
            }
            return $select_user_articles_exit;
        }
    }

    public function selectThemes()
    {
        $select_themes_query = "SELECT id,theme FROM themes";
        $select_themes_result = mysql_query($select_themes_query);
        while ($select_themes_row = mysql_fetch_array($select_themes_result)) {
            $select_themes_exit[] = "<option value='$select_themes_row[0]'>$select_themes_row[1]</option>";
        };
        return $select_themes_exit;
    }

    public function selectTypes()
    {
        $select_types_query = "SELECT id,type FROM types";
        $select_types_result = mysql_query($select_types_query);
        while ($select_types_row = mysql_fetch_array($select_types_result)) {
            $select_types_exit[] = "<option value='$select_types_row[0]'>$select_types_row[1]</option>";
        };
        return $select_types_exit;
    }

    public function selectStatus($id)
    {
        $select_status_query = "SELECT id,status FROM status WHERE id='$id'";
        $select_status_result = mysql_query($select_status_query);
        $select_status_row = mysql_fetch_array($select_status_result);
        $select_status_exit = "<input type='hidden' name='status' value='$select_status_row[0]'>";
        return $select_status_exit;
    }

    public function articleAdd()
    {
        if (isset($_POST[theme])) {$theme = $this->quote_smart($_POST[theme]); if ($theme == '') {unset($theme);}}
        if (isset($_POST[type])) {$type = $this->quote_smart($_POST[type]); if ($type == '') {unset($type);}}
        if (isset($_POST[title])) {$title = $this->quote_smart($_POST[title]); if ($title == '') {unset($title);}}
        if (isset($_POST[text])) {$text = $this->quote_smart($_POST[text]); if ($text == '') {unset($text);}}
        if (isset($_POST[tags])) {$tags = $this->quote_smart($_POST[tags]); if ($tags == '') {unset($tags);}}
        if (isset($_POST[email])) {$email = $this->quote_smart($_POST[email]); if ($email == '') {unset($email);}}
        if (isset($_POST[date])) {$date = $this->quote_smart($_POST[date]); if ($date == '') {unset($date);}}
        if (isset($_POST[status])) {$status = $this->quote_smart($_POST[status]); if ($status == '') {unset($status);}}
        if (isset($_POST[user_id])) {$user_id = $this->quote_smart($_POST[user_id]); if ($user_id == '') {unset($user_id);}}
        if (isset($theme)&&isset($type)&&isset($title)&&isset($text)&&isset($tags)&&isset($email)&&isset($date)&&isset($status)&&isset($user_id)) {

            $symbols = strlen($text)/2;
            $price = '?';
            $originality = '';

            $query = "INSERT INTO user_articles ( user_id,   theme,   type,   title,   text,   tags,   symbols,   price,   email,   originality    date,  status)
                                         VALUES ($user_id, '$theme','$type','$title','$text','$tags','$symbols','$price','$email','$originality','$date','$status',)";

            if ($result = mysql_query($query)) {
                echo "<div class='alert alert-success'>ok</div>";
            } else {
                echo "<div class='alert alert-error'>neok</div>";
            }
        }
    }
}
?>