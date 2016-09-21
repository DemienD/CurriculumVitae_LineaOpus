<?php
  class Concept {

    public $userName;
    public $concept;
    public $userId;

    private $salt;
    private $iv;



    function __construct($isNew, $concept, $userName, $uID) {
      if(isset($isNew) && $isNew == true) {
        //New concept
        if(isset($concept) && isset($userName)){
          $this->userName = $userName;
          $this->concept = $concept;
          $this->userId = $uID;

          $this->encrypt();
        }
      } else {
        //Excisting concept
        if($concept == false) {
          $this->userId = $uID;
          $this->userName = $userName;
          $this->decrypt();
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

    private function encrypt() {
      $this->salt = sha1(mt_rand());
      $this->iv = substr(sha1(mt_rand()), 0, 16);

      $serialized = serialize($this->concept);
      $encrypted = openssl_encrypt(
        $serialized, 'aes-256-cbc', "$this->salt:$this->userName", null, $this->iv
      );

      $msg_bundle = "$this->salt:$this->iv:$encrypted";
      $conn = $this->establishConnection();

      $checkUser = $conn->prepare("SELECT `user` FROM `concept` WHERE `user` = :id");
      $checkUser->bindValue(':id', $this->userId, PDO::PARAM_STR);

      try {
        $checkUser->execute();
        $matches = $checkUser->rowcount();
      } catch (PDOException $e) {
        echo "Something went wrong: ".$e."\n";
      }

      if($matches == 1) {
        //Update
        $saveConcept = $conn->prepare("UPDATE `concept` SET `concept` = :concept WHERE `concept`.`id` = :userId");
        $saveConcept->bindValue(':userId', $this->userId, PDO::PARAM_INT);
        $saveConcept->bindValue(':concept', $msg_bundle, PDO::PARAM_STR);
      } else {
        //add
        $saveConcept = $conn->prepare("INSERT INTO `concept` (`user`, `concept`) VALUES (:userId, :concept)");
        $saveConcept->bindValue(':userId', $this->userId, PDO::PARAM_INT);
        $saveConcept->bindValue(':concept', $msg_bundle, PDO::PARAM_STR);
      }

      try{
        $saveConcept->execute();
      } catch (PDOexception $error) {
        echo "Something went wrong: ".$error."\n";
      }

    }

    private function decrypt() {
      $conn = $this->establishConnection();
      $conn2 = $this->establishConnection();
      $getConcept = $conn->prepare("SELECT `concept` FROM `concept` WHERE `user` = :id");
      $getConcept->bindValue(':id', $this->userId, PDO::PARAM_INT);

      $getSalts = $conn2->prepare("SELECT `username` FROM `users` WHERE `user` = :id");
      $getSalts->bindValue(':id', $this->userId, PDO::PARAM_INT);

      try {
        $getConcept->execute();
        $concept = $getConcept->fetch(PDO::FETCH_ASSOC);

        $getSalts->execute();
        $decode = $getSalts->fetch(PDO::FETCH_ASSOC);
      } catch (PDOException $e) {
        echo "Something went wrong: ".$e."\n";
      }
      $userName = $decode['username'];

      $saved_bundle = $concept['concept'];

      // Parse iv and encrypted string segments
      $components = explode( ':', $saved_bundle );;

      $salt          = $components[0];
      $iv            = $components[1];
      $encrypted_msg = $components[2];


      $decrypted_msg = openssl_decrypt(
        "$encrypted_msg", 'aes-256-cbc', "$salt:$userName", null, $iv
      );

      if ( $decrypted_msg === false ) {
        die("Unable to decrypt \n");
      }

      $this->concept = unserialize($decrypted_msg);
    }
  }
?>
