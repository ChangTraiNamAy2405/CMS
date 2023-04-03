<?php

namespace Core;
use Core\{View, Config};

class Controller {
  private $_controllerName, $_actionName;
  public $view, $request;

  public function __construct($controller, $action) 
  //khi nay controller va action la 2 phan dau trong trinh duyet.
  {
    $this-> _controllerName = $controller;
    $this-> _actionName = $action;
    $viewPath = strtolower($controller) . '/' . $action;   //viewPath = blog/index.
    $this->view = new View($viewPath); // moi lan controller duoc goi ham view se thuc hien.
    $this->view->setLayout(Config::get('default_layout')); //moi lan controller goi thi ham setlayout thuc hien.
  }
}
// tat ca cac method trong nay se duoc thuc hien truoc.