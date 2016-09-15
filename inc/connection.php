<?php

try {
  $connection = new PDO("mysql:host=localhost;dbname=cvcreate-server", "cvcreate-server", "6WqtJLHm827nB96Z");
} catch (PDOexception $exception) {
    echo "<script>alert('Connection to the database could not be made, please contact an administrator')</script>";
    exit;
}

?>
