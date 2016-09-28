<div class="row header_section">
  <div id="contImg" class="col-xs-12" data-parallax="scroll">
    <h2>
      <center>
        Log in<br />
        <small>Sign in om Demiën uw CV te laten maken!</small>
      </center>
    </h2>
  </div>
  <div class="col-md-3"></div>
  <div class="form">
    <div class="col-md-6">
      <h4><?php
        // eventuele (isset)
        if(isSet($error)){
          echo $error;
        }

        if(isSet($succes)){
          echo $succes;
        }

        if(isset($logUser->message)){
          echo $logUser->message;
        }
        ?>
      </h4>
      <ul class="concept">
        <li class='title'>
          Voornaam
        </li>
        <li class='content'>
          <?php echo $firstname; ?>
        </li>
        <li class='title'>
          Titel
        </li>
        <li class='content'>
          <?php echo $gender; ?>
        </li>
        <li class='title'>
          Geboortedatum
        </li>
        <li class='content'>
          <?php echo $age; ?>
        </li>
        <li class='title'>
          Opleidingen
        </li>
        <li class='content'>
          <?php
            foreach ($education as $key => $value) {
              echo $value . ' ';
            }
          ?>
        </li>
        <li class='title'>
          Functies
        </li>
        <li class='content'>
          <?php
            foreach ($function as $key => $value) {
              echo $value . ' ';
            }
          ?>
        </li>
        <li class='title'>
          Talen
        </li>
        <li class='content'>
          <?php
           $counter = 0;
           foreach ($language as $index => $lang) {
             echo $lang . ' ' . $skill[$counter] . "<br />";
             $counter += 1;
           }
           ?>
        </li>

      </ul>
    </div>
  </div>
  <div class="col-md-3">

  </div>
</div>
