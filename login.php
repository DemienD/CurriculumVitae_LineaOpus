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
    $succes = '';
    $areSet = [
        'email'       => false,
        'password'    => false
      ];

    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true){
      if(isset($_POST['email']) && isset($_POST['password'])){
        $logUser = new User(false, $areSet);
        $succes = 'U heeft ingelogd.';
      }
    } else {
      $error = 'Oops, something went wrong!';
    }


  }

    $view = 'views/login.php';

    include $template;
?>
