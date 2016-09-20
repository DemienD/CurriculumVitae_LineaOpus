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

      if(isset($_SESSION['loggedIn'])){
        if($_SESSION['loggedIn']){
          if(isset($_POST['email']) && isset($_POST['password'])){
            $logUser = new User(false, $areSet);
            $succes = 'U bent succesvol ingelogd.';
            header('Location: /');
            exit;
          }
        }
      } else {
        if(isset($_POST['email']) && isset($_POST['password'])){
          $logUser = new User(false, $areSet);
          $succes = 'U bent succesvol ingelogd.';
          header('Location: /');
          exit;
        }
      }
  }

    $view = 'views/login.php';

    include $template;
?>
