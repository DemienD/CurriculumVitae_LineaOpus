<?php
  include 'inc/package.php';
  include 'inc/classes/concept.php';

  define('PAGE_TITLE', 'Profiel');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $additionalCSS = ['profile'];


  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    $concept = new Concept(false, false, $_SESSION['username'], $_SESSION['id']);




    $view = 'views/profile.php';
  } else {
    header('Location: login.php');
  }

  include $template;
?>
