<?php
require __DIR__ . DIRECTORY_SEPARATOR .".." . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use \Fux\Main;

$app = new Main;

$app->run();