<?php

error_reporting(0);

require_once('../vendor/autoload.php');
use App\App;

try {
    $app = new App();
    $app->run($_SERVER['argv'][1],$_SERVER['argv'][2]);
}
catch(Exception $e){
    echo $e->getMessage();
}
