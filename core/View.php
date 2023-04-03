<?php
namespace Core;
use Core\Config;

class View {
  private $_siteTitle = '', $_content = [], $_currentContent, $_buffer, $_layout;
  private $_defaultViewPath;
  
  public function __construct($path = '') {     //$path = $viewPath = blog/index. 
    $this->_defaultViewPath = $path;            // thay doi gia tri cua _defautViewPath.
    $this->_siteTitle = Config::get('default_site_title'); //ten cua website (ko can care).
  }
  public function setLayout($layout) {      //$layout = default_layout = default.
    $this->_layout = $layout;               //thay doi gia tri cua _layout
  }

  public function setSiteTitle($title) {
    $this->_siteTitle = $title;
  }

  public function getSiteTitle() {
    return $this->_siteTitle;
  }

  public function render($path = '') {
     if(empty($path)) {
      $path = $this->_defaultViewPath;      //$path = blog/index.
     }

     //lay gia tri cua $layoutPath va $fullPath. it means lay duong dan cua cac file.
     $layoutPath = PROOT . DS . 'app' . DS . 'views' . DS . 'layouts' . DS . $this->_layout . '.php';
     $fullPath = PROOT . DS . 'app' . DS . 'views'. DS . $path . '.php';
     

     //check xem ca hai file co ton tai khong.
     if(!file_exists($fullPath)) {
      throw new \Exception("the view \"{$path}\" doesn't exist");
     }

     if(!file_exists($layoutPath)) {
      throw new \Exception("the layout \"{$this->_layout}\" doesnt exist!");
     }

     include($fullPath);    // show file full path trong duong dan url.
     include($layoutPath);  // show file layout
  }
  public function start($key) {
    if(empty($key)) {
      throw new \Exception("your start requires a valid key");
    }
    $this->_buffer = $key;
    ob_start();
  }

  public function end() {
    if(empty($this->_buffer)) {
      throw new \Exception("you must run the start method first!");
    }
    $this->_content[$this->_buffer] = ob_get_clean();
    $this->_buffer = null;
  }

  public function content($key) {
    if (array_key_exists($key, $this->_content)) {
      echo $this-> _content[$key];
    }else {
      echo '';
    }
  }
}