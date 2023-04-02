<?php
namespace App\Controllers;
use Core\Controller;

class BlogController extends Controller {     // se thuc hien cac lenh de tra ra ket qua.
  public function indexAction($param1, $param2) {
    die("you made it to the index action! {$param1} {$param2}");
  }
  public function fooAction() {
    die('you made a fool action');
  }
  public function watchAction() {
    die('You will be headed to the videos folder!');
  }
}