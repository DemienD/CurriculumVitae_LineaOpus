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
      $error .= 'Username is a required field, please fill it out.';
    }

    if(isSet($_POST['email'])){
      if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == true){
        $areSet['email'] = $_POST['email'];
      } else {
        $error .= 'Email is invalid. Please enter a valid e-mail address.';
      }
    } else {
      $error .= 'Email is a required field, please fill it out.';
    }

    if(strlen($_POST['password']) > 6){
      if(isSet($_POST['password']) && $_POST['passwordConf'] === $_POST['password']){
        $areSet['password'] = $_POST['password'];
      } else {
        $error .= 'Passwords do not match.';
      }
    } else {
      $error .= 'Password is too short. It needs to be at least 6 characters long.';
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
      $succes .= 'You have succesfully registered!';
    }
  }

    $view = 'views/registration.php';

    include $template;
?>
