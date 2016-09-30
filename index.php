<?php
  include 'inc/package.php';

  define('PAGE_TITLE', 'Home');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $additionalCSS = ['landing'];

  function establishConnection() {
    try {
      $connection = new PDO("mysql:host=localhost;dbname=cvcreate-server", "cvcreate-server", "6WqtJLHm827nB96Z");
      return $connection;
    } catch (PDOexception $exception) {
        $this->message .= "Connection to the database could not be established.";
        return false;
        exit;
    }
  }

  function addReview() {
    $conn = $this->establishConnection();
    if($conn !== false){

    }
  }








  $view = 'views/index.php';

  include $template;

?>
