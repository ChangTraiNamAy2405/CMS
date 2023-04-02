<?php
session_start();
use \Core\{Config, Router};   // su dung file namespace la Core va dung ham Config tranh trung ten voi cac ham khac
// define constants
define('PROOT', __DIR__);   //__dir__ show duong dan cua file.
define('DS', DIRECTORY_SEPARATOR);  // show dau gach cheo "\"
// var_dump(DS);

// auto loaded classes (khong can phai include or require moi lan dung den)
spl_autoload_register(function($className) {
  $parts = explode('\\', $className);      //explode bien string thanh day ngan cach nhau bang ki tu trong string.
  $class = end($parts); // lay ten class bang gia tri cuoi cung cua $parts
  array_pop($parts); // sau khi lay duoc ten class se remove chinh class trong day $parts;
  $path = strtolower(implode(DS, $parts));
  $path = PROOT . DS . $path. DS . $class . '.php';
  if(file_exists($path)) {
    include($path);
  }
});

$rootDir = Config::get('root_dir');
define('ROOT', $rootDir);

$url = $_SERVER['REQUEST_URI'];
$url = str_replace(ROOT, '', $url);
$url = preg_replace('/(\?.+)/', '', $url);
Router::route($url);

?>