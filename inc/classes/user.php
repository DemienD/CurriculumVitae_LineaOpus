<?php
  /**
   *
   */
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
          $insertUser = $conn->prepare("INSERT INTO `users` (`username`, `email`, `password`, `password_hash`) VALUES (:username, :email, :password, :passwordHash)");
          $insertUser->bindValue(':username', $this->username, PDO::PARAM_STR);
          $insertUser->bindValue(':email', $this->email, PDO::PARAM_STR);

          $password = $this->hash($this->password); //hashed password
          $insertUser->bindValue(':password', $password, PDO::PARAM_STR);
          $insertUser->bindValue(':passwordHash', $this->passwordHash, PDO::PARAM_STR);

          try{
            $insertUser->execute();
          } catch (PDOexception $error) {
            $this->message .= "Something went wrong: ".$error."\n";
          }
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

          if($passwordHash !== '') {
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
              $checkLogin = $conn->prepare("SELECT `id`, `username` FROM `users` WHERE `email` = :email");
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
            }
          } // hash check
        } // connectioncheck
      } // /function



  }
  //
  // $properties = ['username' => 'demien', 'email' => 'demien', 'password' => 'demien'];
  // $x = new User(true, $properties);
  // $x->hash('demien');
?>
