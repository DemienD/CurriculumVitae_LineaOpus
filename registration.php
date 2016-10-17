<?php
  include 'inc/package.php';
  include '/inc/classes/user.php';

  define('PAGE_TITLE', 'Registration');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $additionalCSS = ['registration'];

  if(isSet($_POST['register'])){

    $error = '';
    $succes = '';
    $areSet = [
      'username'    => false,
      'email'       => false,
      'password'    => false
    ];

    if(isSet($_POST['username'])){
      $areSet['username'] = $_POST['username'];
    } else {
      $error .= 'Gebruikersnaam is een vereist veld. Vul deze a.u.b. in.';
    }

    if(isSet($_POST['email'])){
      if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true){
        $areSet['email'] = $_POST['email'];
      } else {
        $error .= 'Email is ongeldig. Vul a.u.b. een geldig email adres in.';
      }
    } else {
      $error .= 'Email is een vereist veld. Vul deze a.u.b. in.';
    }

    if(strlen($_POST['password']) > 6){
      if(isSet($_POST['password']) && $_POST['passwordConf'] === $_POST['password']){
        $areSet['password'] = $_POST['password'];
      } else {
        $error .= 'Wachtwoorden komen niet overeen.';
      }
    } else {
      $error .= 'Wachtwoord is te kort. Het moet op zijn minst 7 karakters lang zijn.';
    }




    $complete = true;
    foreach($areSet as $key => $value){
      if($value == false){
        $complete = false;
      } else {
        $complete = true;
      }
    }

    if($complete == true){
      $newUser = new User(true, $areSet);
      $succes .= 'Er is een bevestigingsmail naar uw email verzonden.';
    }
  }

    $view = 'views/registration.php';

    include $template;
?>
