<?php
class Home extends Controller {
  public function index() {
    $data['judul'] = 'Home';
    
    if(isset($_POST['submit'])) {
      $data += [
        'token-post-session' => $_SESSION['home-index-token'],
        'token-post-form' => $_POST['form-token']
      ];

      if($_POST['form-token'] === $_SESSION['home-index-token']) {
        echo "CSRF passed!";
      }

      echo '<pre>';
      var_dump($data);
      echo '</pre>';
    }

    $data['form-token'] = bin2hex(random_bytes(32));
    $_SESSION['home-index-token'] = $data['form-token'];

    $this->view('template/header', $data);
    $this->view('home/index', $data);
    $this->view('template/footer');
  }
}
