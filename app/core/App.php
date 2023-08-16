<?php
class App {
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];
  private $bar;

  public function __construct() {
    // CSRF protection feature
    if(!isset($_SESSION['token'])) {
      $_SESSION['token'] = bin2hex(random_bytes(32));
    } else {
      $_SESSION['bug'] = $_SESSION['token'];
      $this->bar = true;
    }
    // END - CSRF protection feature

    $url = $this->parseURL();

    if(is_null($url)) $url[0] = 'Home';

    // controller
    if(file_exists('../app/controllers/'. $url[0] .'.php')) {
      $this->controller = $url[0];
      unset($url[0]);
    }

    require_once '../app/controllers/'. $this->controller .'.php';
    $this->controller = new $this->controller;

    // method
    if(isset($url[1])) {
      if(method_exists($this->controller, $url[1])) {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // params
    if(!empty($url)) {
      $this->params = array_values($url);
    }

    // jalankan controller & method, serta kirimkan params jika ada
    call_user_func_array([$this->controller, $this->method], $this->params);

    // CSRF protection feature
    if($this->bar) {
      $_SESSION['bug-2'] = $_SESSION['token'];
      unset($_SESSION['token']);
    }
    // END - CSRF protection feature
  }

  public function parseURL() {
    if(isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
