<?php
session_start();

require_once '../app/base/App.php';
require_once '../app/models/Config.php';

$app = App::getInstance();
$app->autoLoad();
$app->run();	