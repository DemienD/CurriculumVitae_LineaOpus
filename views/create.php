<div class="row header_section">
  <div id="contImg" class="col-xs-12">
    <h2>
      <center>
        Create CV<br />
        <small>Subtitle</small>
      </center>
    </h2>
  </div>
  <div class="col-md-6">
    <form action="create.html" method="post">
      <?php
        if (isset($formSet) && $formSet == true) {
          foreach ($form as $formSection) {
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
                    foreach ($value[3] as $val) {
                      echo '<option value="'.$val.'">'.$val.'</option>'."\n";
                    }
                  echo '</select>';
                  break;
                case 'range':
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
        }
      ?>

    </form>
  </div>
</div>
