<?php
  include 'inc/package.php';
  include 'inc/connection.php';
  define('PAGE_TITLE', 'Profiel');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $additionalCSS = ['profile'];


  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    if(isset($_GET['user'])){
      $getItems = $connection->prepare('SELECT * FROM `concept` WHERE `user` = :user');
      $getItems->bindValue(':user', $_GET['user'], PDO::PARAM_STR);
      $getItems->execute();
      $arr = $getItems->fetch(PDO::FETCH_ASSOC);
      foreach ($arr as $key => $value) {
        if(preg_match('/^a:\d+:{.*?}$/', $value)) {
          if(is_array(unserialize($value))) {
            echo '<p><small>'.$key.'</small></p>';
            foreach(unserialize($value) as $vals) {
              echo '<p>'.$vals.'</p>';
            }
          }
        } else {
          echo '<p><small>'.$key.'</small> : '.$value.'</p>';

        }
      }
    }


    $view = 'views/profile.php';
  } else {
    header('Location: login.php');
  }

  include $template;
?>
