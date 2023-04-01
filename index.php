<?php
session_start();
use \Core\Config;

// define constants
define('PROOT', __DIR__);
define('DS', DIRECTORY_SEPARATOR);
// var_dump(DS);

spl_autoload_register (function($className) {
  $parts = explode('\\', $className);
  $class = end($parts);
  array_pop($parts);
  $path = strtolower(implode(DS, $parts));
  $path = PROOT . DS . $path . DS . $class . '.php';
  if (file_exists($path)) {
    include($path);
  }
  // var_dump($path);
});
$db_name = Config::get('db_name');
var_dump($db_name);

?>