<?php

ini_set('display_errors',0);
ini_set('log_errors',1);
ini_set('error_log',dirname(__FILE__).'/whapi.io.log');
$body = file_get_contents('php://input');
error_log($body);
