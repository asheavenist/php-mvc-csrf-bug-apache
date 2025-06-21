<?php
class Home extends Controller {
  public function index() {
    if(!empty($_POST)) {
      if(!Token::validated()) {
        echo json_encode([
          'status' => 'Error',
          'message' => 'CSRF validation failed!',
          'data-session' => $_SESSION['csrf-token'],
          'data-post' => $_POST['form-token']
        ]);

        exit;
      };

      echo json_encode([
        'status' => 'OK',
        'message' => 'CSRF passed!',
        'data-session' => $_SESSION['csrf-token'],
        'data-post' => $_POST['form-token']
      ]);

      exit;
    }

    $token = Token::generate();

    $_SESSION['csrf-token'] = $token;

    $data = [
      'judul' => 'Home',
      'form-token' => $token
    ];

    $this->view('template/header', $data);
    $this->view('home/index', $data);
    $this->view('template/footer');
  }
}
