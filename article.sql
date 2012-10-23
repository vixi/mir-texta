-- phpMyAdmin SQL Dump
-- version 2.11.4-rc1
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Окт 22 2012 г., 10:56
-- Версия сервера: 5.0.45
-- Версия PHP: 5.2.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- База данных: `article`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL auto_increment,
  `user` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `user`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `advantages`
--

CREATE TABLE IF NOT EXISTS `advantages` (
  `id` int(3) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `advantages`
--

INSERT INTO `advantages` (`id`, `title`, `text`) VALUES
(1, 'Без опыта!', 'Для нас Ваш опыт - не имеет значения. Пишите о том, что для Вас интересно и зарабатывайте на этом!'),
(2, 'Оплата', 'Мы оплачиваем Ваши статьи 1 раз в неделю, по пятницам!'),
(3, 'Любые тексты', 'Принимаем к публикации любые уникальные и интересные тексты!');

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `text`) VALUES
(1, 'Цены', '<table>\r\n  <thead>\r\n    <tr>\r\n      <th>Тема статьи</th>\r\n      <th>Обычная статья</th>\r\n      <th>C синонимами</th>\r\n    </tr>\r\n  </thead>\r\n  <tbody>\r\n    <tr>\r\n      <td>\r\n        Бизнес и инвестиции\r\n      </td>\r\n      <td>\r\n        0,2$\r\n      </td>\r\n      <td>\r\n        0,6\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td>\r\n        Что будет в будущем?\r\n      </td>\r\n      <td>\r\n        Tick\r\n      </td>\r\n      <td>\r\n        Crimefighter Sorta\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td>\r\n        Как я работаю?\r\n      </td>\r\n      <td>\r\n        Smurf\r\n      </td>\r\n      <td>\r\n        Giving Exploding Presents\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td>\r\n        Cindy\r\n      </td>\r\n      <td>\r\n        Beyler\r\n      </td>\r\n      <td>\r\n        Sales Representative\r\n      </td>\r\n    </tr>\r\n    <tr>\r\n      <td>\r\n        Captain\r\n      </td>\r\n      <td>\r\n        Cool\r\n      </td>\r\n      <td>\r\n        Tree Crusher\r\n      </td>\r\n    \r\n    </tr>\r\n  </tbody>\r\n</table>'),
(2, 'Aliquam ac', 'Nullam dapibus gravida volutpat. Praesent vitae erat arcu. Etiam lobortis, odio fringilla sagittis laoreet, ipsum lorem cursus tortor, sed adipiscing tellus nisl ac nulla. In eget tincidunt leo. Curabitur euismod porta purus vitae luctus.'),
(3, 'Vivamus posuere', 'Nullam ullamcorper consequat orci, et molestie felis euismod in. Vestibulum in lorem ac orci hendrerit cursus ut quis justo. Aliquam at lacus varius turpis tempus accumsan. Vivamus posuere pellentesque risus a hendrerit. Nulla id nisi lacus, et imperdiet turpis. Nullam eu massa vitae mauris lacinia posuere.'),
(4, ' Aenean sed lorem nulla', 'Nam iaculis, massa quis lacinia sollicitudin, velit risus ultrices lorem, eget vehicula mauris arcu accumsan ligula. Proin et diam purus, in placerat est. Nam et sollicitudin metus. In hac habitasse platea dictumst. Aliquam sem felis, consectetur vel tincidunt non, gravida eu ipsum.'),
(5, 'Vivamus consequat', 'Pellentesque sed sem a enim aliquet commodo. Mauris vel risus dui, eu vehicula eros. Proin in mollis nulla. Nulla vestibulum sollicitudin blandit. Cras suscipit, elit eu sodales aliquam, est erat tristique sapien, vitae dictum urna ipsum sit amet elit.'),
(6, 'Phasellus dapibus', 'Phasellus dapibus aliquet neque in facilisis. Suspendisse quis aliquam augue. Proin quis mauris quis enim iaculis rhoncus. Nulla pellentesque, nisl eu ullamcorper tristique, nulla felis scelerisque turpis, eu porttitor quam lectus sollicitudin mauris. Quisque id nulla augue. Nullam non suscipit augue. Donec vitae lectus eget sem fermentum mattis vel et sem. Mauris orci orci, malesuada sit amet tempor in, mattis nec felis.'),
(7, 'Pellentesque habitant morbi tristique', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur ac tincidunt arcu. Sed laoreet orci ac mauris feugiat in auctor risus porttitor. Donec sit amet dolor libero. Quisque dapibus lectus mauris, sed lobortis lectus. Nam vehicula sodales tristique. Vestibulum massa libero, imperdiet sit amet gravida id, tempus in risus. Etiam quis est vel nisi semper facilisis vel eget tellus. Vestibulum nec libero nec turpis placerat tincidunt. Quisque vitae diam ante. Aliquam at elit eget tortor vehicula iaculis. Phasellus diam erat, pulvinar sit amet sollicitudin non, ornare sit amet enim.'),
(8, 'Quisque egestas eleifend urna', 'Sed nulla justo, commodo ac ultricies in, lobortis id libero. Aenean lectus arcu, tristique vitae commodo et, posuere a ipsum. Nulla eget nisl dui, vitae interdum arcu. Vivamus id velit ipsum. Duis justo erat, sagittis in hendrerit sed, blandit eu sapien. Cras quis justo est. Sed in nibh justo. Integer convallis magna at dui aliquet sodales.');

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(3) NOT NULL auto_increment,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'С помощью каких платежных систем я могу произвести вывод заработанных средств?', 'Мы работаем с Webmoney + Yandex.money. Вам необходимо зарегистрироваться в этих системах и при регистрации указать данные.'),
(3, 'Могу ли я вывести заработанные средства другими способами?', 'Мы готовы расмотреть возможность вывода средств другими системами, при выполнени следующих требований:\r\n<br>1. Сумма вывода минимум 100$\r\n<br>2. Комиссию платежа берете Вы на себя.\r\n<br>3. Не более 1-го раза в месяц.'),
(4, 'Я могу писать очень много статей (больше 100 000 символов в неделю), сможете ли Вы принять такое количество статей?', 'Да, не проблема! Главное, чтобы статьи удовлетворяли нашим правилам (смотрите в разделе "Правила").'),
(5, 'Нашел Ваш сайт в интернете, тема интересная:). Только чем Вы можете гарантировать, что произведете оплату за написанные мной статьи?', 'Да, учитывая количества "кидалова" на просторах интернета, вопрос очень важен. \r\nГарантировать оплату мы можем только на основе своей репутации:\r\n<noindex><br>1. Сайтом управляет <a href="https://www.free-lance.ru/users/yyyurik/" target="_blank">Корхов Юрий</a>  c рейтингом на free-lance.ru +30 (к сожалению free-lance.ru давно перестал функционировать, иначе + было бы больше).</noindex>\r\n<br>2. Если переживаете о том, чтобы Ваша работа не прошла даром - напишите статью в среду, в пятницу получите оплату.'),
(6, 'Возможна ли предоплата за статью?', 'Нет.'),
(7, 'Могу ли я просто изменять первую попавшуюся мне на глаза новость и разместить ее у Вас?', 'Да, конечно можете. Но Вам следует обратить внимание на то, что все статьи проходят предмодерацию и Вам необходимо, чтобы статья удовлетворяла правилам ресурса. Так что касается новостей:\r\n<br>1. Только актуальные (если разместите прошлогоднюю новость - она не пройдет)\r\n<br>2. Ссылка на источник ресурса должна быть.\r\n<br>3. Новость должна быть полностью переписана, чтобы она стала уникальной!');

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL auto_increment,
  `text` text NOT NULL,
  `author` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `text`, `author`) VALUES
(1, 'Aliquam id mi nisl, ac sollicitudin ante. Morbi non arcu risus, sed volutpat sapien. Quisque vel lectus leo, vel accumsan ante. Nulla ut sodales erat. Sed eu eros eu nibh porta rhoncus.', 'Aliquam id mi nisl'),
(2, 'Aliquam id mi nisl, ac sollicitudin ante. Morbi non arcu risus, sed volutpat sapien. Quisque vel lectus leo, vel accumsan ante. Nulla ut sodales erat. Sed eu eros eu nibh porta rhoncus.', 'Aliquam id mi nisl'),
(3, 'Aliquam id mi nisla asdsas asdasdas asd asd asd asdasdasda sda sdasdasdsxc a cy  tyjyujyu', 'Aliquam id mi nisl');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(9) NOT NULL auto_increment,
  `username` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Дамп данных таблицы `messages`
--


-- --------------------------------------------------------

--
-- Структура таблицы `mission`
--

CREATE TABLE IF NOT EXISTS `mission` (
  `id` int(2) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `mission`
--

INSERT INTO `mission` (`id`, `title`, `text`) VALUES
(1, 'Правила', 'Для возможности размещения статьи Вам необходимо соблюдать некоторые правила работы с нашим сервисом:\r\n<br><b>1.</b> Принимаются статьи объемом от 500 до 10 000 символов, без учета пробелов.\r\n<br><b>2.</b> Только уникальные и интересные статьи.\r\n<br><b>3.</b> Без грамотических и пунктационных ошибок.\r\n<br><b>4.</b> Отсутсвие логических ошибок в тексте. Пример:"По расчетам семье принца Уильяма понадобится на свадьбу...", когда свадьба уже состоялась.\r\n<br><b>5.</b> Узкоспециализированные темы - не интересуют! Т.е.  Ваша статья должна быть легка для понимания не специалисту.\r\n<br><b>6.</b> В статье с более чем 5000 символов обязательно должны быть изображения!\r\n<br><b>7.</b> Текст должен быть разделен на абзацы. Нам каша не нужна.=)\r\n<br><br>\r\n\r\n<h3>Оплата за работу</h3>\r\n<b>1.</b> Расчет заработка происходит на основе сложения стоимости статей в отдельности.\r\n<br><b>2.</b> Оплата происходит за каждую одобренную статью (имеет статус "подтверждена").\r\n<br><b>3.</b> Минимальная сумма для вывода: 10$. Меньшую сумму выводим только 1 раз.\r\n<br><b>4.</b> В случае систематического нарушения правил размещения статей - будьте готовы к штрафу(до 20%).\r\n<br><b>5.</b> Оплата производится только на Webmoney <b>или</b> Yandex.money и на усмотрение администрации сайта. 1у.е.=30р. Поэтому в 2х системах у Вас обязательно должны быть счета.\r\n<br><b>6.</b> Стоимость статьи расчитывается по формуле: кол-во символов * тему статьи * вид статьи\r\n<br><b>7.</b> Модерация статьи по времени не может занимать более 48 часов (исключая выходные дни).\r\n<br><b>8.</b> Коэффициент за тему статьи может изменяться. Изменения публикуются на сайте и вступают в силу с субботы. Чтобы Ваша статья оценивалась по коэффициенту на который Вы рассчитываете Вам необходимо публиковать статьи до среды(включительно), чтобы мы успели ее одобрить.\r\n<br><br>\r\n\r\n<h3>Права передачи текстов</h3>\r\n<b>*.</b> Все тексты со всеми правами передаются в полное управление данному сайту. \r\n<br><b>*.</b> Статьи могут редактироваться и изменяться на усмотрение адмнистрации сайта.<br><br>\r\nПо всем вопросам связывайтесь по контактым данным указанными на странице <a href="contacts.php">КОНТАКТЫ</a>');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `date`, `image`) VALUES
(1, '1 ноября', 'Сегодня мы переехали на отдельный сайт и мы готовы развиваться дальше. Добро пожаловать!', '2012-10-03', 'upload/face.png'),
(2, '15 ноября', 'Учитывая огромное количество статей мы увеличиваем время на модерацию статьи до 48 часов. Спасибо за понимание!', '2012-10-02', 'upload/peka.jpeg'),
(3, '20 ноября', 'Сегодня изменились правила работы с сайтом. Читайте подробнее на странице "Правила"', '2012-10-01', 'upload/trollface.png');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(3) NOT NULL auto_increment,
  `page` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `page`, `title`, `description`) VALUES
(1, 'index', 'Главная', 'Это главная страница'),
(2, 'news', 'Новости', 'Это новости'),
(3, 'articles', 'Статьи', 'Это статьи'),
(4, 'faq', 'FAQ', 'Это FAQ'),
(5, 'about', 'О нас', 'Это страница "О нас"'),
(6, 'services', 'Услуги', 'Это услуги');

-- --------------------------------------------------------

--
-- Структура таблицы `section_data`
--

CREATE TABLE IF NOT EXISTS `section_data` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `section_data`
--

INSERT INTO `section_data` (`id`, `title`, `text`) VALUES
(1, 'Дополнительный заработок', 'Если у Вас есть свободное время и Вы хотите получить дополнтильный заработок - этот сайт для Вас. Пишите статьи и зарабатывайте!'),
(2, 'Ваш опыт не имеет значения', 'Умеете грамотно и интересно писать - тогда будьте с нами! Нас интересуют тексты с 90% уникальностью!'),
(3, 'Каждую пятницу - зарплата!', 'Каждую пятницу мы производим с Вами взаиморасчет по написанным и одобренным статьям!');

-- --------------------------------------------------------

--
-- Структура таблицы `services_features`
--

CREATE TABLE IF NOT EXISTS `services_features` (
  `id` int(3) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `services_features`
--

INSERT INTO `services_features` (`id`, `title`, `text`) VALUES
(1, 'Marketing 1', 'Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui'),
(2, 'Analytics', 'Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.'),
(3, 'Management.', 'Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui.');

-- --------------------------------------------------------

--
-- Структура таблицы `top_features`
--

CREATE TABLE IF NOT EXISTS `top_features` (
  `id` int(3) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `top_features`
--

INSERT INTO `top_features` (`id`, `title`, `text`, `image`) VALUES
(1, 'Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque natoque penatibus.', 'Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque natoque penatibus.', 'upload/get_img.jpg'),
(2, 'Take the Best  Corporate Deal!', 'Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi. Cum sociis natoque penatibus. Et magnis dis parturient montes, nascetur ridiculus.', 'upload/get_img.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `top_new`
--

CREATE TABLE IF NOT EXISTS `top_new` (
  `id` int(5) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `top_new`
--

INSERT INTO `top_new` (`id`, `title`, `text`, `image`) VALUES
(1, 'Дополнительный доход с удовольствием!', 'Если Вам нравится писать статьи, не важно на какие темы, но они интересны и их приятно читать то Вы можете на этом зарабатывать! Мы покупаем любые Ваши статьи не обращая внимание на тему. Для нас существует только несколько основных ограничений: <br>1. Текст должен быть уникальным минимум на 90%. <br>2. Текст должен хорошо читаться и быть написан для людей. <br>3. Текст не должен быть где-нибудь размещен. <br>4. Содержать рекламу какой-нибудь услуги или продукта (ссылки и т.п. - запрещены)<br>\r\n...\r\n<br>Более подробно читайте на странице "<a href="about.php">Правила</>".', 'upload/get_img.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `wmz` varchar(50) NOT NULL,
  `wmr` varchar(50) NOT NULL,
  `yandex` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `wmz`, `wmr`, `yandex`) VALUES
(5, 'rty', 'rty', '123', '123', '123'),
(2, 'asd', 'asd', 'dsa', 'asd', 'das'),
(4, 'qwe', 'qwe', '123', '123', '123'),
(6, 'ccc', 'ccc', '78', '768', '768'),
(7, 'dfvd', 'fvdfv', 'd456456', '45645', '645645'),
(8, 'vbnvb', 'nvbnv', '56756', '756756', '56756');
