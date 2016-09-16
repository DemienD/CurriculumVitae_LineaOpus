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
              if($value[1] !== 'select') {
                echo '<input name="'.$name.'" id="'.$name.'"
                type="'.$value[1].'"
                placeholder="'.$value[0];
                if($value[2]){ echo '" required>'."\n"; };
              } else {
                echo '<select id="'.$name.'" name="'.$name.'">'."\n";
                  foreach ($value[3] as $val) {
                    echo '<option value="'.$val.'">'.$val.'</option>'."\n";
                  }
                echo '</select>';
              }
            }
          }
        }
      ?>

    </form>
  </div>
</div>
