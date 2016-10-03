<?php
  include 'inc/package.php';
  include 'inc/connection.php';

  define('PAGE_TITLE', 'Home');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $additionalCSS = ['landing'];

  // get reviews from database
  $getReview = $connection->prepare('SELECT `image`, `name`, `quote` FROM `review`');
  try {
    $getReview->execute();
  } catch(PDOexception $e) {
    echo 'Oops! Something went wrong!';
  }
  // put result reviews in associative array
  $reviewArr = $getReview->fetch(PDO::FETCH_ASSOC);


  $view = 'views/index.php';

  include $template;
?>
