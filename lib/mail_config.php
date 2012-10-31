<?php
// Настройки для MY site

// Настройки Email
$site['from_name'] = 'VIXI'; // from (от) имя
$site['from_email'] = 'email@mywebsite.com'; // from (от) email адрес
// На всякий случай указываем настройки
// для дополнительного (внешнего) SMTP сервера.
<<<<<<< HEAD:lib/config.php
$site['smtp_mode'] = 'enable'; // enabled or disabled (включен или выключен)
$site['smtp_host'] = null;
$site['smtp_port'] = 3306;
=======
$site['smtp_mode'] = 'ensabled'; // enabled or disabled (включен или выключен)
$site['smtp_host'] = 'smtp.mail.ru';
$site['smtp_port'] = null;
>>>>>>> origin/development:lib/mail_config.php
$site['smtp_username'] = null;
?>
