<div class="row header_section">
  <div id="contImg" class="col-xs-12">
    <h2>
      <center>
        Create CV<br />
        <small>Subtitle</small>
      </center>
    </h2>
  </div>
</div>

<div class="row form-section">
  <div class="col-md-3 hidden-xs hidden-sm">

  </div>
  <div class="col-md-6">
      <?php
      if (isset($formSet) && $formSet == true) {
        echo '<form action="create.php" method="post">'."\n";
        foreach ($form as $formSection) {
          echo "<hr />"."\n";
          echo "<h2>".$formSection[0]."</h2>";
          foreach ($formSection as $name => $value) {
            switch ($value[1]) {
              case 'text':
              echo '<input name="'.$name.'" id="'.$name.'"
              type="'.$value[1].'"
              placeholder="'.$value[0];
              if($value[2]){ echo '" required>'."\n"; } else {
                echo '">'."\n";
              };
              break;
              case 'select':
              echo '<select id="'.$name.'" name="'.$name.'">'."\n";
              echo '<option disabled selected>'.$value[0].'</option>'."\n";
              foreach ($value[3] as $val) {
                echo '<option value="'.$val.'">'.$val.'</option>'."\n";
              }
              echo '</select>';
              break;
              case 'range':
              echo '<label for="'.$name.'">'.$value[0].'</label>';
              echo '<input name="'.$name.'" id="'.$name.'"
              type="'.$value[1].'"
              min="0" max="10"
              placeholder="'.$value[0];
              if($value[2]){ echo '" required>'."\n"; } else {
                echo '">'."\n";
              };
              break;

              default:
              # code...
              break;
            }
          }
        }
        echo '<input type="submit" name="saveCV" id="saveCV" value="CV opslaan">'."\n";
        echo '</form>';
      } else {
        echo '<a href="/"><button class="wideButton">Maak uw CV!</button></a>'."\n";
      }
      ?>
  </div>
  <div class="col-md-3 hidden-xs hidden-sm">

  </div>
</div>
