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
        $select_user_articles_query = "SELECT user_articles.*, themes.theme, types.type, status.status FROM user_articles
                                       INNER JOIN themes ON user_articles.theme = themes.id
                                       INNER JOIN types ON user_articles.type = types.id
                                       INNER JOIN status ON user_articles.status = status.id
                                       WHERE email='$_SESSION[email]'";
        if ($select_user_articles_result = mysql_query($select_user_articles_query)) {
        while ($select_user_articles_row = mysql_fetch_array($select_user_articles_result)) {
            $select_user_articles_exit[] = "<tr>
                                                <td>$select_user_articles_row[title]</td>
                                                <td>$select_user_articles_row[theme]</td>
                                                <td>$select_user_articles_row[type]</td>
                                                <td>$select_user_articles_row[symbols]</td>
                                                <td>$select_user_articles_row[price]</td>
                                                <td>$select_user_articles_row[originality]</td>
                                                <td>$select_user_articles_row[date]</td>
                                                <td>$select_user_articles_row[status]</td>
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
        if (isset($_POST[text])) {$text = $this->quote_smart($_POST[text]); if ($text == '' or strlen($text) < 50) {unset($text);}}
        if (isset($_POST[tags])) {$tags = $this->quote_smart($_POST[tags]); if ($tags == '') {unset($tags);}}
        if (isset($_POST[email])) {$email = $this->quote_smart($_POST[email]); if ($email == '') {unset($email);}}
        if (isset($_POST[date])) {$date = $this->quote_smart($_POST[date]); if ($date == '') {unset($date);}}
        if (isset($_POST[status])) {$status = $this->quote_smart($_POST[status]); if ($status == '') {unset($status);}}
        if (isset($_POST[user_id])) {$user_id = $this->quote_smart($_POST[user_id]); if ($user_id == '') {unset($user_id);}}
        if (isset($theme)&&isset($type)&&isset($title)&&isset($text)&&isset($tags)&&isset($email)&&isset($date)&&isset($status)&&isset($user_id)) {
            $symbols = strip_tags($text);
            $symbols = str_replace(' ', '', $symbols);
            $symbols = mb_strlen($symbols, "UTF-8");

            $originality = '';

            $rate_query = "SELECT rate FROM themes WHERE id='$theme'";
            $rate_result = mysql_query($rate_query);
            $rate_row = mysql_fetch_array($rate_result);

            $type_multiplier_query = "SELECT multiplier FROM types WHERE id='$type'";
            $type_multiplier_result = mysql_query($type_multiplier_query);
            $type_multiplier_row = mysql_fetch_array($type_multiplier_result);

            $rate = $rate_row[0];
            $type_multiplier = $type_multiplier_row[0];

            $price = $symbols * $rate * $type_multiplier;

            /*
            'Количество символов *
            Цена за символ по определенной теме *
            Коэффициент типа
            */

            $query = "INSERT INTO user_articles (  user_id,   theme,   type,   title,   text,   tags,   symbols,   price,   email,   originality,   date,   status)
                                         VALUES ('$user_id','$theme','$type','$title','$text','$tags','$symbols','$price','$email','$originality','$date','$status')";
            if ($result = mysql_query($query)) {
                echo "<div class='alert alert-success'>ok</div>";
            } else {
                echo "<div class='alert alert-error'>ne ok</div>";
            }
        } else {
            echo "<div class='alert alert-error'>Вы не заполнили все поля</div>";
        }
    }
}
?>