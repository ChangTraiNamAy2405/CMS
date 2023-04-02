<?php

namespace Core;
use App\Controllers\BlogController;


class Router {
  public static function route($url) {
    $urlParts = explode('/', $url); // chia ra thanh array. chia nho cac phan cua url.

    //set controller, // phan dang truoc cua url.
    $controller = !empty($urlParts[0]) ? $urlParts[0] : Config::get('default_controller');
    $controllerName = $controller;
    $controller = '\App\Controllers\\' . ucwords($controller) . 'Controller'; 
    //noi controller name voi file controller de lay ra class dinh san.
    // chi co Blog hien tai la controller vi khong con file nao khac.


    // set action. // phan dung sau controllerName.
    array_shift($urlParts); // cat gia tri dau trong array va lay phan dang sau no.
    $action = !empty($urlParts[0]) ? $urlParts[0] : 'index'; // neu khong co mac dinh chay index.
    $actionName = $action;
    $action .= 'Action'; // noi phan cuoi cung voi action.
    array_shift($urlParts); // sau do cat luon phan action do, phan con lai de sau (index/saw/p1/p2)

    if(!class_exists($controller)) {
      throw new \Exception("the controller \"{$controllerName}\" does not exist");
    }
    //save the information, make object name controllerClass.
    $controllerClass = new $controller($controllerName, $actionName);

    // kiem tra xem method action co trong class tren khong
    if(!method_exists($controllerClass, $action)) {
      throw new \Exception("the method \"{$action}\" does not exist on the \"{$controller}\" control");
    }
    call_user_func_array([$controllerClass, $action], $urlParts);
    // call function trong class voi phan con lai la $urlPart (parameters) neu co.

  }
}