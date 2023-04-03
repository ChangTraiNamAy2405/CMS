<?php
namespace App\Controllers;
use Core\Controller;

class BlogController extends Controller {     // se thuc hien cac lenh de tra ra ket qua.
  public function indexAction() {
    $this->view->setSiteTitle('Newest Articles'); //we can set the site title before rendering it.
    $this->view->render();    //goi den ham render trong object view.
  }
}