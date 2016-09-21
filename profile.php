<?php
  include 'inc/package.php';
  include 'inc/classes/concept.php';

  define('PAGE_TITLE', 'Profiel');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $additionalCSS = ['landing'];


  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    $view = 'views/profile.php';
  } else {
    header('Location: login.php');
  }

  include $template;
?>
