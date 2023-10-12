<?php

if (!defined('APP_NAME'))
    define('APP_NAME', 'VTUBERS');
if (!defined('APP_ORGANIZATION'))
    define('APP_ORGANIZATION', 'Mtrx');
if (!defined('APP_OWNER'))
    define('APP_OWNER', 'Calamytryx');
if (!defined('APP_DESCRIPTION'))
    define('APP_DESCRIPTION', 'vtuber social network');

if (!defined('ALLOWED_INACTIVITY_TIME'))
    define('ALLOWED_INACTIVITY_TIME', time() + 1 * 60);

if (!defined('DB_DATABASE'))
    define('DB_DATABASE', 'database_mtrx');
if (!defined('DB_HOST'))
    define('DB_HOST', 'localhost');
if (!defined('DB_USERNAME'))
    define('DB_USERNAME', 'Calamyty');
if (!defined('DB_PASSWORD'))
    define('DB_PASSWORD', 'Mytryx');
if (!defined('DB_PORT'))
    define('DB_PORT', '3006');

if (!defined('MAIL_HOST'))
    define('MAIL_HOST', 'smtp.gmail.com');
if (!defined('MAIL_USERNAME'))
    define('MAIL_USERNAME', 'example@gmail.com');
if (!defined('MAIL_PASSWORD'))
    define('MAIL_PASSWORD', 'password');
if (!defined('MAIL_ENCRYPTION'))
    define('MAIL_ENCRYPTION', 'ssl');
if (!defined('MAIL_PORT'))
    define('MAIL_PORT', 465);