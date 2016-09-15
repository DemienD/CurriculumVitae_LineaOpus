<?php
  include 'inc/package.php';

  define('PAGE_TITLE', 'Home');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $additionalCSS = ['landing'];

  $view = 'views/index.php';

  include $template;
?>
