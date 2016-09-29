<?php
  class Image {
    public $image;
    public $id;
    public $bericht = false;

    function __construct($imagefile, $id) {
      $this->id = $id;
      $this->removeImage();
      if(isSet($imagefile) && $imagefile["error"] === 0) {
        // alles ging goed
        $name = $imagefile["name"];
        $file = $imagefile["tmp_name"]; // move_uploaded_file
        $size = $imagefile["size"];

        $data = file_get_contents($file); // lees de inhoud van een bestand
        $gd   = @imageCreateFromString($data); // de @ onderdrukt waarschuwingen
        if($gd) {
          // nieuw formaat berekenen!
          $nieuweAfbeelding = $this->scaleImage($gd, 500, 500); // maximaal 500x500 pixels!!
          if($nieuweAfbeelding) {
            imageDestroy($gd); // het origineel sluiten en verder werken met de geschaalde afbeelding
            $gd = $nieuweAfbeelding;
          }

          // nieuwe bestandsnaam bepalen, deze moet uniek zijn.
          $bestand = "image_".time().sha1_file($file).".png";

          // doelmap bepalen
          $doel = realPath("userImg").DIRECTORY_SEPARATOR.$bestand;

          // afbeelding opslaan
          imagePNG($gd, $doel);

          $this->image = $bestand;
          $this->saveToDatabase();
          $error = 0;

          // afbeelding weer sluiten
          imageDestroy($gd);

          // tijdelijke upload verwijderen, die hebben we niet meer nodig.
          unlink($file);
        } else {
          $bericht = "Bestand is niet in een juist format, probeer PNG, JPEG, BMP of GIF.";
        }
      } else {
        $image = "default.jpg";
        $error = 0;
      }
    }

    private function removeImage() {
      $conn = $this->establishConnection();
      $query = $conn->prepare("SELECT `image` FROM `concept` WHERE `concept`.`user` = :id");
      $query->bindValue(':id', $this->id, PDO::PARAM_STR);
      try {
        $query->execute();
        $imagelink = $query->fetch(PDO::FETCH_ASSOC);
      } catch (PDOexception $e) {
      }
      if($imagelink['image'] != '') {
        unlink('userImg/'.$imagelink['image']);
      }
    }

    private function saveToDatabase() {
      $conn = $this->establishConnection();
      $query = $conn->prepare("UPDATE `concept` SET `image` = :path WHERE `concept`.`user` = :id");
      $query->bindValue(':path', $this->image, PDO::PARAM_STR);
      $query->bindValue(':id', $this->id, PDO::PARAM_STR);

      try {
        $query->execute();
      } catch (PDOexception $e) {

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

    public function scaleImage($imageHandle, $maxWidth, $maxHeight) {
        $originalWidth  = $width  = imageSX($imageHandle); // afbeelding breedte
        $originalHeight = $height = imageSY($imageHandle); // afbeelding hoogte

        // Is de afbeelding hoger dan toegestaan?
        if($height > $maxHeight) {
            // Nieuwe breedte berekenen en hoogte is maximum.
            $width  = (($maxHeight / $height) * $width);
            $height = $maxHeight;
        }

        // Is de afbeelding breder dan toegestaan?
        if($width > $maxWidth) {
            // Nieuwe hoogte berekenen en breedte is maximum.
            $height = (($maxWidth / $width) * $height);
            $width  = $maxWidth;
        }

        // Nieuwe afbeelding maken van nieuwe afmetingen
        $image = imageCreateTrueColor($width, $height);
        imageAlphaBlending($image, false);
        imageSaveAlpha($image, true); // transparante kleuren ook opslaan!

        // Afbeelding een nieuwe afmeting geven en tekenen op de nieuwe afbeelding, zodat de oude intact blijft!
        imageCopyResampled($image, $imageHandle, 0, 0, 0, 0, $width, $height, $originalWidth, $originalHeight);

        return $image;
    }
  }
?>
