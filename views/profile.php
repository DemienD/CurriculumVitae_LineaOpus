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
        echo "<ul class='hide'>";
        $content = $concept->concept;
        // echo "<ul class='concept'>";

        $prevHeader = 'none';
        foreach ($content as $key => $value) {
          if($key !== "saveCV") {
            $indexName = explode( '_', $key );
            $header;
            switch ($indexName[0]) {
              case 'personal':
                $header = 'Persoonlijke Info';
                break;
              case 'education':
                $header = 'Opleidingen';
                break;
              case 'work':
                $header = 'Werkervaring';
                break;
              case 'language':
                $header = 'Taalkennis';
                break;
              case 'program':
                $header = 'Softwarekennis';
                break;
              case 'license':
                $header = 'Rijbewijzen';
                break;
              case 'programming':
                $header = 'Programmeertalen';
                break;
              case 'project':
                $header = 'Projecten';
                break;
              default:
                $header = '';
                break;
            }

            if($header !== $prevHeader) {
              echo "</ul>";
              echo "<ul class='concept'>";
              echo "<h4>".$header."</h4>";
              $prevHeader = $header;
            }

            if(is_array($value)) {
              echo "<li class='key'>".$key;
              echo "<ol>";

              foreach ($value as $keyx => $valuex) {
                echo "<li class='val'>" . $valuex . "</li>";
              }
              echo "</ol>";
              echo "</li>";
            } else {
              echo "<li class='key'>".$key . "<li class='val'>" . $value . "</li></li>";
            }
          }
        }

        echo "</ul>";

      }
      ?>
  </div>
  <div class="col-md-3">z</div>
  <div class="col-md-3">z</div>
</div>
