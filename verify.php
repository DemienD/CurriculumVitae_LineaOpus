<?php
  include 'inc/package.php';

  define('PAGE_TITLE', 'Verify');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
  $additionalCSS = ['login'];


  function verify($code, $email){
    include 'inc/connection.php';
    $verifyUser = $connection->prepare('SELECT id FROM users WHERE verified = :code AND email = :email;');
    $verifyUser->bindValue(':code', $code, PDO::PARAM_STR);
    $verifyUser->bindValue(':email', $email, PDO::PARAM_STR);

    try {
      $verifyUser->execute();
      $count = $verifyUser->rowCount();
      $results = $verifyUser->fetch(PDO::FETCH_ASSOC);
    } catch (PDOexception $e){
      echo 'Something went wrong';
      exit;
    }

    if($count == 1) {
      $setVerified = $connection->prepare('UPDATE `users` SET `verified` = "true" WHERE `users`.`id` = :id;');
      $id = $results['id'];
      $setVerified->bindValue(':id', $id, PDO::PARAM_INT);

      try {
        $setVerified->execute();
      } catch (PDOexception $e){
        $error .= 'Something went wrong'."\n";
      }
    } else {
      $error = 'Fout emailadress of verificatiecode.';
    }
  }

  if(isset($_POST['verify']) && isset($_POST['code']) && isset($_POST['email'])) {
    verify($_POST['code'], $_POST['email']);
  } else if(isset($_GET['code']) && $_GET['email']) {
    verify($_GET['code'], $_GET['email']);
  }

  $view = 'views/verify.php';

  include $template;
?>
