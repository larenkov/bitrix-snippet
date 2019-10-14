<?php

/**
 * @var string LANG
 */
define('LANG', '');

/**
 * @var string SITE_ID Идентификатор текущего сайта при использовании в Публичной части, код языка при использовании в административной части.
 */
define('SITE_ID', '');

/**
 * @var string SITE_ID Поле "Папка сайта" в настройках сайта. Как правило используется в случае организации многосайтовости на одном домене.
 */
define('SITE_DIR', '');

/**
 * @var string SITE_SERVER_NAME Поле "URL сервера" в настройках текущего сайта.
 */
define('SITE_SERVER_NAME', '');

/**
 * @var string SITE_CHARSET Поле "Кодировка" в настройках текущего сайта.
 * Примечание: в публичной части понятие языка и сайта отличаются. Поэтому LANG_CHARSET и SITE_CHARSET могут принимать разные значения.
 */
define('SITE_CHARSET', '');

/**
 * @var string FORMAT_DATE Для публичной части, в данной константе хранится формат даты из настроек текущего сайта. Для административной части - формат даты текущего языка.
 */
define('FORMAT_DATE', '');

/**
 * @var string FORMAT_DATETIME Для публичной части, в данной константе хранится формат времени из настроек текущего сайта. Для административной части - формат времени текущего языка.
 */
define('FORMAT_DATETIME', '');

/**
 * @var string LANG_DIR
 */
define('LANG_DIR', '');


/**
 * @var string LANG_CHARSET В данной константе содержится значение кодировки, указанной в секции Параметры формы настроек текущего сайта.
 * Примечание: в публичной части понятие языка и сайта отличаются. Поэтому LANG_CHARSET и SITE_CHARSET могут принимать разные значения.
 */
define('LANG_CHARSET', '');

/**
 * @var string LANG_ADMIN_LID
 */
define('LANG_ADMIN_LID', '');

/**
 * @var string LANGUAGE_ID Если это публичная часть, то в данной константе храниться поле "Язык" из настроек текущего сайта, если административная часть, то в данной константе храниться идентификатор текущего языка.
 */
define('LANGUAGE_ID','');

/**
 * @var integer BX_FILE_PERMISSIONS Unix-права для вновь создаваемых файлов.
 */
define('BX_FILE_PERMISSIONS', 0644);

/**
 * @var integer BX_DIR_PERMISSIONS Unix-права для вновь создаваемых каталогов.
 */
define('BX_DIR_PERMISSIONS', 0755);

/**
 * @var boolean BX_CRONTAB Если данная константа инициализирована значением "true", то функция проверки агентов на запуск будет отбирать только те агенты для которых не критично количество их запусков (т.е. при добавлении этого агента параметр period=N). Как правило данная константа используется для организации запуска агентов на cron'е.
 */
define('BX_CRONTAB', true);

/**
 * @var string SITE_TEMPLATE_ID Идентификатор текущего шаблона сайта.
 */
define('SITE_TEMPLATE_ID', '');

/**
 * @var string SITE_TEMPLATE_PATH URL от корня сайта до папки текущего шаблона.
 */
define('SITE_TEMPLATE_PATH', '');