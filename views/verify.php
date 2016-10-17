<div class="row header_section">
  <div id="contImg" class="col-xs-12" data-parallax="scroll">
    <h2>
      <center>
        Verifieer uw account<br />
        <small>Nog geen account? <a href="registration.php">Registreer!</a></small>
      </center>
    </div>
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
        ?>
      </h4>
      <form action="verify.php" method="post" class="loginForm">
        <input type="text" name="code" placeholder="Verificatiecode" required>
        <br />
        <br />
        <input type="text" name="email" placeholder="Email" required>
        <br />
        <br />
        <input type="submit" value="Verifieer" name="verify" id="verify">
      </form>
    </div>
  </div>
  <div class="col-md-3">
  </div>
