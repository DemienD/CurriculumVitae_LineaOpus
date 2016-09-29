<div class="row header_section">
  <div id="contImg" class="col-xs-12" data-parallax="scroll">
    <h2>
      <center>
        Profile<br />
        <small>Uw profiel</small>
      </center>
    </h2>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <h3>CV Concept</h2>
      <ul>

      <?php
      $prevKey = '';
      foreach ($arr as $key => $value) {
        $expKey = explode('_', $key);
        if($prevKey === $expKey[0]){
          $prevKey = $expKey[0];
        } else {
          echo "<li class='header'><h3>".$expKey[0]."</h3></li>";
          $prevKey = $expKey[0];
        }
        echo "<li class='title'>".$expKey[1]."</li>";

        if(preg_match('/^a:\d+:{.*?}$/', $value)) {
          $val = unserialize($value);
          foreach ($val as $key => $value) {
            echo "<li class='content'>".$value."</li>";
          }
        } else {
          echo "<li class='content'>".$value ."</li>";
        }
      }
      ?>
    </ul>
  </div>
  <div class="col-md-3">z</div>
  <div class="col-md-3">
    <div class="jumbotron">
      <h3>Profielfoto</h3>
      <img class="profileThumb" src="<?php if(isset($profileImage)) { echo $profileImage; } else { echo "../../userImg/default.jpg"; } ?>" alt="" />
      <input type="file" class="btn btn-primary btn-lg" role="button">Upload image</a>

      <?php
        $img = new Image($_FILES["fileToUpload"]);
      ?>
    </div>
  </div>
</div>
