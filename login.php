<?php
  include 'inc/package.php';
  include '/inc/classes/user.php';

  define('PAGE_TITLE', 'Sign-in');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $additionalCSS = ['login'];

  if(isset($_GET['logout']) && $_GET['logout'] == 1) {
    $_SESSION['loggedIn'] = false;
    $_SESSION['username'] = '';
    $_SESSION['id']= '';
    $_GET['logout'] = 0;
    session_unset();
    session_destroy();
  }

  if(isSet($_POST['login'])) {
    $error = '';
    $succes = '';
    $areSet = [
        'email'       => false,
        'password'    => false
      ];

    if(isSet($_POST['email'])){
      if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true){
        $areSet['email'] = $_POST['email'];
      } else {
        $error .= 'Email is ongeldig. Vul a.u.b. een geldig email adres in. ';
      }
    } else {
      $error .= 'Email is een vereist veld. Vul deze a.u.b. in. ';
    }
    if(isSet($_POST['password'])){
      $areSet['password'] = $_POST['password'];
    } else {
      $error .= 'Voer een wachtwoord in';
    }



      if(isset($_SESSION['loggedIn'])){
        if($_SESSION['loggedIn']){
          if(isset($_POST['email']) && isset($_POST['password'])){
            $logUser = new User(false, $areSet);
            // header('Location: ./');
          }
        }
      } else {
        if(isset($_POST['email']) && isset($_POST['password'])){
          $logUser = new User(false, $areSet);
          $succes = 'U bent succesvol ingelogd.';

        }
      }

  }

    $view = 'views/login.php';

    include $template;
?>
