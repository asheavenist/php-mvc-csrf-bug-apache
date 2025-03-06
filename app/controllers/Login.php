<?php
class Login extends Controller {
  public function index() {
    echo "login/index here!";
  }

  public function ajax() {
    if($_SESSION['form-token-2'] !== $_POST['form-token']) {
      echo json_encode(['message' => 'CSRF Failed.']);
    } else {
      echo json_encode(['message' => 'CSRF Passed.']);
    }
    return;
  }
}
