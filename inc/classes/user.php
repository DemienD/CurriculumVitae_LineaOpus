<?php
  /**
   *
   */
  function sendVerification($code, $username, $email) {
    require "PHPMailer/PHPMailerAutoload.php";
    require "/../connection.php";

    $getEmail = $connection->prepare("SELECT * FROM `email` WHERE `id` = :id");
    $getEmail->bindValue(':id', 1, PDO::PARAM_INT);
    try{
      $getEmail->execute();
      $results = $getEmail->fetch(PDO::FETCH_ASSOC);
    } catch (PDOexception $e) {
      $this->message .= 'Error '.$e;
    }
    $password = $results['password'];
    $email_host = $results['email-host'];
    $mask = $results['mask'];

    $mail = new PHPMailer();

    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = $email_host;
    $mail->Password = $password;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";

    $mail->setFrom($mask, 'no-reply');
    $mail->AddAddress($email, $username);

    $mail->Subject  =  'CVCreate | Activate your account.';
    $mail->IsHTML(true);
    $mail->Body    = 'Hi there '.$username.',<br />You are only seconds away from using your new account on <a href="cvcreate.nl">CVCreate</a>.<br /><strong>Activate your account now using </strong><a href="cvcreate.nl/verify.php?code='.$code.'&email='.$email.'">this link</a><br /> Or fill out this code <em>'.$code.'</em> on <a href="cvcreate.nl/verify.php">CVCreate</a>';


    if($mail->Send())
    {
      echo "Message was Successfully Send :)";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }


  class User {
    public $username;
    public $email;
    public $id;
    public $message;

    private $passwordHash;
    private $password;

    function __construct($isNewUser, $properties) {
      if($isNewUser == true && isset($properties)){
        if(
             isset($properties['username'])
          && isset($properties['email'])
          && isset($properties['password'])
        ) {
          $this->username = $properties['username'];
          $this->email    = $properties['email'];
          $this->password = $properties['password'];
          $this->addUser();

        } else {
          $this->message .= "Set values do not meet requested format. Contact a system administrator."."\n";
        }
      } else {
        if(
             isset($properties['email'])
          && isset($properties['password'])
        ) {
          $this->email    = $properties['email'];
          $this->password = $properties['password'];
          $this->loginUser();
        }
      }
    }

    private function establishConnection() {
      try {
        $connection = new PDO("mysql:host=localhost;dbname=cvcreate-server", "cvcreate-server", "6WqtJLHm827nB96Z");
        return $connection;
      } catch (PDOexception $exception) {
          $this->message .= "Connection to the database could not be established.";
          return false;
          exit;
      }
    }

    private function generatePasswordHash() {
      if (CRYPT_BLOWFISH == 1) {
        $date = new DateTime();
        $salt =  $date->getTimestamp();
        $pepper = $this->username;
        $salt2 = explode('.', ($salt * (rand(1, 30) / 10)));
        return crypt($pepper, '$2a$07$'.$salt.$salt2[0].'$');
      }
    }

    public function hash($password) {
      //Filters all special characters into HTML
      $password = htmlentities($password);
      //hashs the password with salt and pepper :D
      $hash = null;
      if(!isSet($this->passwordHash)) {
        $hash = $this->generatePasswordHash();
        $this->passwordHash = $hash;
      } else {
        $hash = $this->passwordHash;
      }
      if($hash != null) {
        $hashed = crypt($password, '$2a$07$'.$hash.'$');
        return $hashed;
      } else {
        return false;
      }
    }

    private function verification() {
      return substr(md5(uniqid(rand(), true)), 8, 8);
    }

    private function addUser() {
      $conn = $this->establishConnection();
      if($conn !== false) {
        $checkUser = $conn->prepare("SELECT `username`, `email` FROM `users` WHERE `username` = :username OR `email` = :email");
        $checkUser->bindValue(':username', $this->username, PDO::PARAM_STR);
        $checkUser->bindValue(':email', $this->email, PDO::PARAM_STR);
        try{
          $checkUser->execute();
          $matches = $checkUser->rowCount();
        } catch (PDOexception $e) {
          $this->message .= 'Error '.$e;
        }
        if($matches !== 0) {
          $this->message .= "This email and/or username already exists."."\n";
        } else {
          $insertUser = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`, `password_hash`, `verified`) VALUES (:username, :email, :password, :passwordHash, :verification)");
          $insertUser->bindValue(':username', $this->username, PDO::PARAM_STR);
          $insertUser->bindValue(':email', $this->email, PDO::PARAM_STR);

          $password = $this->hash($this->password); //hashed password
          $insertUser->bindValue(':password', $password, PDO::PARAM_STR);
          $insertUser->bindValue(':passwordHash', $this->passwordHash, PDO::PARAM_STR);
          $verify = $this->verification();
          $insertUser->bindValue(':verification', $verify, PDO::PARAM_STR);

          try{
            $insertUser->execute();
          } catch (PDOexception $error) {
            $this->message .= "Something went wrong: ".$error."\n";
            exit;
          }
          sendVerification($verify, $this->username, $this->email);
        }
      }
    }

    private function loginUser() {
        $conn = $this->establishConnection();
        if($conn !== false) {
          $getHash = $conn->prepare("SELECT `password_hash` FROM `users` WHERE `email` = :email");
          $getHash->bindValue(':email', $this->email, PDO::PARAM_STR);
          try {
            $getHash->execute();
            $results = $getHash->fetch(PDO::FETCH_ASSOC);
          } catch (PDOexception $e) {
            $this->message .= 'Error '.$e;
          }
          $this->passwordHash = $results['password_hash'];

          if($this->passwordHash !== '') {
            $checkUser = $conn->prepare("SELECT `email`, `password` FROM `users` WHERE `email` = :email AND `password` = :password");
            $checkUser->bindValue(':email', $this->email, PDO::PARAM_STR);

            $password = $this->hash($this->password);
            $checkUser->bindValue(':password', $password, PDO::PARAM_STR);
            try {
              $checkUser->execute();
              $matches = $checkUser->rowCount();
              $results = $checkUser->fetch(PDO::FETCH_ASSOC);
            } catch (PDOexception $e) {
              $this->message .= 'Error '.$e;
            }
            if($matches != 1) {
              $this->message .= 'Invalid password/email';
              header('Location: login.php');

              exit;
            } else {
              $checkLogin = $conn->prepare("SELECT `id`, `username`, `verified` FROM `users` WHERE `email` = :email");
              $checkLogin->bindValue(':email', $this->email, PDO::PARAM_STR);
              try {
                $checkLogin->execute();
                $result = $checkLogin->fetch(PDO::FETCH_ASSOC);
              } catch (PDOexception $e) {
                $this->message .= 'Error '.$e;
              }
              $this->username = $result['username'];
              $_SESSION['loggedIn'] = true;
              $_SESSION['id']       = $result['id'];
              $_SESSION['username'] = $this->username;
              if(!$result['verified']) {
                header('Location: verify.php');
                exit;
              }
            }
          } // hash check
        } // connectioncheck
      } // /function



  }
?>
