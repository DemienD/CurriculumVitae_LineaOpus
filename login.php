<?php
  include 'inc/package.php';
  include '/inc/classes/user.php';

  define('PAGE_TITLE', 'Sign-in');

  $additionalJS  = ['parallax.min.js'];
  $additionalCSS = ['login'];



    $view = 'views/login.php';

    include $template;
?>
