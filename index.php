<?php
header("Content-Type: text/html");
require_once('config/app.php');
require_once('config/constants.php');
require_once('config/routes.php');
require_once('helpers/helper.php');
try{
	$app = new App($routes);
	$app->load();
}
catch (Exception $e) {
    echo $e->getMessage();
}
?>