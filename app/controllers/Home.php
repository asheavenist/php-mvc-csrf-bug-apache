<?php
class Home extends Controller {
  public function index() {
    $data['judul'] = 'Home';

    /** CSRF Feature */
    $data['generated-csrf-token'] = bin2hex(random_bytes(32));
    if(!isset($_SESSION['form-token'])) {
      $_SESSION['form-token'] = $data['generated-csrf-token'];
      $_SESSION['form-token-2'] = $data['generated-csrf-token'];
      $data['form-token'] = $data['generated-csrf-token'];
    } else {
      $data['form-token'] = $_SESSION['form-token'];
      unset($_SESSION['form-token']);
    }
    /** END- CSRF Feature */

    /** Debug only */
    echo '<pre>';
    var_dump($data, $_SESSION);
    echo '</pre>';
    /** End- Debug only */

    $this->view('template/header', $data);
    $this->view('home/index', $data);
    $this->view('template/footer');
  }
}
