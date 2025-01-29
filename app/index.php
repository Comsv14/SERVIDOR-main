<?php
require 'vendor/autoload.php';
require 'routes/auth.php';
require 'routes/insulin.php';
require 'routes/stats.php';

$router = new Router();
$router->run();
