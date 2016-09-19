<?php
  include 'inc/package.php';
  include '/inc/classes/user.php';

  define('PAGE_TITLE', 'Sign-in');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $additionalCSS = ['login'];


  if(isSet($_POST['login'])) {
    $error = '';


    // CODE
    // CODE
    // CODE
    // CODE
    // CODE
    // CODE
  }


    $view = 'views/login.php';

    include $template;
?>
