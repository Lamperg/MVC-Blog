<?php
//Set constans
define('DS', DIRECTORY_SEPARATOR);
$sitePath=  realpath(dirname(__FILE__).DS).DS;
define('SITE_PATH', $sitePath);

//Connect to DB
define('DB_USER', 'blog');
define('DB_PASS', 'ppNv256maT3YSG9A');
define('DSN', 'mysql:host=localhost;dbname=blog');

