<?php

/////////////////////
// Open Demo Reset //
/////////////////////

define('TIME_INTERVAL', 60*60*24); // seconds
define('DEMO_FOLDER', '../');
define('BACKUP_FOLDER', 'backup/');
define('MYSQL_DUMP', 'stravel_hq_dump.sql');

$ignore_files_n_folders = array('../README.md', '../.git/*');

$db = new mysqli('localhost', 'root', '0okmnjI9@!', 'stravel_hq');