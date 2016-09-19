<?php

ini_set('error_reporting', -1);
ini_set('display_errors', 1);
ini_set('html_errors', 1);
ini_set('display_startup_errors', 1);

define('DS',DIRECTORY_SEPARATOR);

define('APP_PATH',__DIR__.DS);
define('CORE', APP_PATH.'core'.DS);
define('CTRL', APP_PATH.'controllers'.DS);
define('MODEL',APP_PATH.'models'.DS);
define('VIEW', APP_PATH.'views'.DS);

require_once CORE.'App.php';
require_once CORE.'DB.php';
require_once CORE.'Controller.php';
require_once MODEL.'Database/Connection.php';
require_once MODEL.'Database/OperationDB.php';


//$add = new Insert();
//$add->add();