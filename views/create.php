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
      echo "<script> var form_sections = {}; var addButtons = [];</script>";

      if (isset($formSet) && $formSet == true) {
        echo '<form action="create.php" method="post">'."\n";
        $count = 0;
        foreach ($form as $formSection) {
          echo "<hr />"."\n";
          echo "<h2>".$formSection[0][0]."</h2>";
          $count += 1;
          $formSec = '';
          foreach (array_slice($formSection,1) as $name => $value) {
            $formCont = '';
            if($formSection[0][1]){
              $name = $name.'[]';
            }
            switch ($value[1]) {
              case 'text':
              $formCont .= '<input name="'.$name.'" id="'.$name.'"
              type="'.$value[1].'"
              placeholder="'.$value[0];
              if($value[2]){ $formCont .= '" required>'."\n"; } else {
                $formCont .= '">'."\n";
              };
              break;
              case 'select':
              $formCont .= '<select id="'.$name.'" name="'.$name.'">'."\n";
              $formCont .= '<option disabled selected>'.$value[0].'</option>'."\n";
              foreach ($value[3] as $val) {
                $formCont .= '<option value="'.$val.'">'.$val.'</option>'."\n";
              }
              $formCont .= '</select>';
              break;
              case 'range':
              $formCont .= '<label for="'.$name.'">'.$value[0].'</label>';
              $formCont .= '<input name="'.$name.'" id="'.$name.'"
              type="'.$value[1].'"
              min="0" max="10"
              placeholder="'.$value[0];
              if($value[2]){ $formCont .= '" required>'."\n"; } else {
                $formCont .= '">'."\n";
              };
              break;
              default:
              # code...
              break;
            }
            echo $formCont;
            $formSec .= $formCont;
          }

          if($formSection[0][1] == true) {
            echo "<br /><h3 class='addForm' id='".$count."'>+ <small>Extra veld toevoegen</small></h3>";
            echo "<script>addButtons.push(".$count.");</script>";
          }

          $formConv = trim(preg_replace('/\s+/', ' ', $formSec));
          echo "<script>
            form_sections.form".$count." = '".$formConv."';
          </script>";
        }
        echo '<input type="submit" name="saveCV" id="saveCV" value="CV opslaan">'."\n";
        echo '</form>';
      } else {
        echo '<a href="/"><button class="wideButton">Maak uw CV!</button></a>'."\n";
      }

      echo '<script type="text/javascript" src="inc/scripts/create.js"></script>';

      ?>
  </div>
  <div class="col-md-3 hidden-xs hidden-sm">

  </div>
</div>
