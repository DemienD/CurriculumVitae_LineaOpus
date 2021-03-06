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
  <div class="col-md-3">
    <div class="jumbotron">
      <h3>Profielinstellingen</h3>
      <br />
      <form id="profilesettings" name="profilesettings" action="profile.php" method="post">
        <label for="public">Openbaar profiel</label>
        <br />
        <input id="public" name="public" type="checkbox" checked data-size="large">
        <input type="submit" name="submit" id="submit" value="Opslaan">
      </form>
    </div>
  </div>
  <div class="col-md-3">
    <?php echo "<script>$( document ).ready(function(){ $('input:checkbox').bootstrapSwitch({state: ".$public."}); });</script>" ?>
    <script>
    $( document ).ready(function(){
      var state = $('input:checkbox').bootstrapSwitch('state');

      $("input:file").change(function (){
        $('form').submit();
      });
    });
    </script>
    <div class="jumbotron">
      <h3>Profielfoto</h3>
      <img class="profileThumb" src="<?php if(isset($profileImage)) { echo 'userImg/'.$profileImage; } else { echo "userImg/default.jpg"; } ?>" alt="" />
      <form id="uploadImg" name="uploadImg" action="profile.php" enctype="multipart/form-data" method="post">
        <label class="btn btn-default btn-file">
          Upload een foto <input id="prfImg" name="prfImg" type="file" style="display: none;">
        </label>
      </form>
      <?php
      if (isset($_FILES["prfImg"])) {
        $img = new Image($_FILES["prfImg"], $_SESSION['id']);
      }
      ?>
    </div>
  </div>
</div>
