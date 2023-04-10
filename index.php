<?php
/*require '_init.php';

// اظهار الاخطاء في الصفحة
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $uri = trim($_SERVER['REQUEST_URI'],'/');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('phpBasic','',$uri);
$uri = trim($uri,'/');

Router::make() ->get('','app/Controllers/index.php')
    ->get('','app/Controllers/index.php')
    ->get('about','app/Controllers/about.php')->resolve(Request::uri(),Request::method());*/

require '_init.php';

// اظهار الاخطاء في الصفحة
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// $uri = trim($_SERVER['REQUEST_URI'],'/');
/*$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('phpBasic', '', $uri);
$uri = trim($uri, '/');*/

Router::make()
    ->get('', 'app/Controllers/index.php')
    ->get('about', 'app/Controllers/about.php')
    ->resolve(Request::uri(), Request::method());


// TODO: if the tasks is empty


// TODO: if the tasks is empty
?>
