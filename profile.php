<?php
  include 'inc/package.php';
  include 'inc/connection.php';
  define('PAGE_TITLE', 'Profiel');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $additionalCSS = ['profile'];
  $content = '';

  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    if(isset($_GET['user'])){
      $getItems = $connection->prepare('SELECT `personal_firstName`, `personal_gender`, `personal_birthDay`, `education_education`, `work_function`, `language_language`, `language_skill` FROM `concept` WHERE `user` = :user');
      $getItems->bindValue(':user', $_GET['user'], PDO::PARAM_STR);
      $getItems->execute();
      $arr = $getItems->fetch(PDO::FETCH_ASSOC);

      $firstname = $arr['personal_firstName'];

      $gender = $arr['personal_gender'];

      $age = $arr['personal_birthDay'];
      if(preg_match('/^a:\d+:{.*?}$/', $arr['education_education'])) {
        $education = unserialize($arr['education_education']);
      } else {
        $education = $arr['education_education'];
      }

      if(preg_match('/^a:\d+:{.*?}$/', $arr['work_function'])) {
        $function = unserialize($arr['work_function']);
      } else {
        $work = $arr['work_function'];
      }

      if(preg_match('/^a:\d+:{.*?}$/', $arr['language_language'])) {
        $language = unserialize($arr['language_language']);
      } else {
        $language = $arr['language_language'];
      }

      if(preg_match('/^a:\d+:{.*?}$/', $arr['language_skill'])) {
        $skill = unserialize($arr['language_skill']);
      } else {
        $skill = $arr['language_skill'];
      }


      $view = 'views/profile.php';
    } else {
      $getItems = $connection->prepare('SELECT * FROM `concept` WHERE `user` = :user');
      $getItems->bindValue(':user', $_SESSION['id'], PDO::PARAM_STR);

      $getItems->execute();

      $arr = $getItems->fetch(PDO::FETCH_ASSOC);
      $arr = array_slice($arr, 2);
      $view = 'views/profileSelf.php';
    }


  } else {
    header('Location: login.php');
  }

  include $template;
?>
