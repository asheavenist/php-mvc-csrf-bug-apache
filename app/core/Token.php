<?php
class Token {
  private string $token;

  public function __construct() {
    $this->token = bin2hex(random_bytes(32));
  }

  public static function generate(): string {
    $active = new static;
    return $active->token;
  }

  public static function validated(): bool {
    if($_POST['form-token'] === $_SESSION['csrf-token']) return true;
    
    return false;
  }
}
