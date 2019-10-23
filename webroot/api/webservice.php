<?php

ini_set('display_errors', 'off');
set_include_path(get_include_path() . PATH_SEPARATOR .  './app/lib/');

$config = include './app/config.php';

require_once 'webservice-loginfo/dist/index.html';