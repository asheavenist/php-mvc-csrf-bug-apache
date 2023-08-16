<?php
class Home extends Controller {
  public function index() {
    $data['judul'] = 'Home';
    
    if(isset($_POST['submit'])) {
      if($_POST['form-token'] === $_SESSION['bug'] || $_POST['form-token'] === $_SESSION['bug-2']) {
        echo "<br>CSRF passed!<br>";
      }
    }

    $data['form-token'] = $_SESSION['token'];
    
    $this->view('template/header', $data);
    $this->view('home/index', $data);
    $this->view('template/footer');
  }
}
