<?php
if (isset($_POST[submit])) {
    if (isset($_POST[username])) {$username = $_POST[username];};
    if (isset($_POST[text])) {$text = $_POST[text];};
    if (isset($_POST[subject])) {$subject = $_POST[subject];};
};

mail('sushkevichpavel@gmail.com', $subject, $text);

function post_processing($var)
{
    $var = trim($var);
    $var = htmlentities(strip_tags($var));
    $var = mysql_real_escape_string($var);
}
?>