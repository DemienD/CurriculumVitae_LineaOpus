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
      <?php
      if($concept->concept == false) {
        echo '<p>U heeft nog geen concept. U hebt een concept nodig om een CV te maken.</p>'."\n";
        echo '<a href="/"><button type="button" class="wideButton">Maak er nu een!</button></a>';
      } else {
        $content = $concept->concept;
        print_r($content);
        echo "<br /><br /><br /><br /><br /><br /><br /><br />";
        foreach ($content as $key => $value) {
          if(is_array($value)) {
            echo $key . "<br />";
            foreach ($value as $keyx => $valuex) {
              echo $keyx . " | " . $valuex . "<br />";
            }
          } else {
            echo $key . " | " . $value . "<br />";
          }
        }
        echo "<br />";
      }
      ?>
  </div>
  <div class="col-md-3">z</div>
  <div class="col-md-3">z</div>
</div>
