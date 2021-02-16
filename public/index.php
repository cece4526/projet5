<?php

require '../config/Dev.php';
require '../vendor/autoload.php';
session_start();
var_dump('oui');
die;
$router = new \App\config\Router();
$router->run();