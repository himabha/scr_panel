<?php
header("Content-Type: text/html");
require_once('config/app.php');
require_once('config/constants.php');
require_once('config/routes.php');
$app = new App($routes);
$app->load();
?>