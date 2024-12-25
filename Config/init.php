<?php

define("ROOT", dirname(__DIR__));
define("DEBUG", 1);

define("APP", "/App/Controllers");
define("MODEL", "/App/Model");
define("CONFIG", ROOT . "/Config");

define("VIEW", ROOT . "/App/View");
define("LAYOUT", VIEW . "/layouts");

define("WWW", ROOT . "/Public");
define("TMP", ROOT . "/Tmp");
define("LOGS", TMP . "/Logs");

define("CORE", ROOT . "/vendor/Core");
define("VENDOR", ROOT . "/vendor");

require_once ROOT . "/vendor/autoload.php";
require_once CORE . "/Helpers/helper.php";