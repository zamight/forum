<?php

define("MY_FORUM", true);

require_once('lang/en.php');
require_once('inc/settings.php');
require_once('inc/class_plugin.php');
require_once('inc/functions.php');
require_once('inc/class_mysqli.php');
require_once('inc/class_user.php');
require_once('inc/class_template.php');
require_once('plugintest.php');

$plugin->run_plugins('index_start');


$plugin->run_plugins('index_end');