<?php
error_reporting(0);
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])
	|| $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest'
	|| !count($_POST) || !isset($_POST['ajax_url']))
		die("0|Неверный запрос");
$url_info = parse_url($_POST['ajax_url']);
unset($_POST['ajax_url']);

$data = array();
foreach ($_POST as $k => $v) $data[] = $k.'='.$v;
$data = implode('&', $data);

$fp = fsockopen(@$url_info['host'], 80, $errno, $errstr, 6);
if (!$fp) die("0|Не могу соединиться с ".@$url_info['host']);
$out  = "POST ".@$url_info['path']." HTTP/1.1\r\n";
$out .= "Host: ".@$url_info['host']."\r\n";
$out .= "Content-Type: application/x-www-form-urlencoded\r\n";
$out .= "Content-Length: ".strlen($data)."\r\n";
$out .= "Connection: close\r\n\r\n";
$out .= $data;
fputs($fp, $out);

$in = '';
while (($line = fgets($fp, 8192))!==false) $in .= $line;
fclose($fp);
header("Content-type: text/plain; charset=windows-1251");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
print substr($in, strpos($in, "\r\n\r\n") + 4);
?>