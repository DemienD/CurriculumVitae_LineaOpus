<div class="row header_section">
  <div id="contImg" class="col-xs-12" data-parallax="scroll">
    <h2>
      <center>
        Profile<br />
        <small><?php echo $user['firstName']; ?> 's profile</small>
      </center>
    </h2>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <h3>About <?php //echo $user['firstName']; ?></h2>
      <?php
        // echo '<p>Naam: </p>' . $user['firstName'];
        // echo '<p>Geslacht: </p>' . $user['gender'];
        echo '<h4>Opleidingen</h4><ul>';
        // foreach ($education as $school) {
          // echo '<li>'.$school.'</li>';
        // }
        echo '</ul><h4>Gewerkt als</h4><ul>';
        // foreach ($work as $job) {
          // echo '<li>'.$job.'</li>';
        // }
        echo '</ul><h4>Talen</h4><ul>';
        // foreach ($languages as $lang) {
          // echo '<li>'.$lang.'</li>';
        // }
        echo '</ul>';

      ?>
  </div>
  <div class="col-md-3">z</div>
  <div class="col-md-3">z</div>
</div>
