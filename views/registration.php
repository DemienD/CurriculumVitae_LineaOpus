<div class="row header_section">
  <div id="contImg" class="col-xs-12" data-parallax="scroll">
    <h2>
      <center>
        Sign-up<br />
        <small>Registreer nu om Demiën uw CV te laten maken!</small>
      </center>
    </h2>
  </div>
  <div class="col-md-3"></div>
  <div class="form">
    <div class="col-md-6">
      <h4><?php
        if(isset($newUser->message)){
          echo $newUser->message;
        }

        if(isset($error)){
          echo $error;
        }
      ?></h4>
      <form action="registration.php" method="post" class="regisForm">
        <input type="text" name="username" placeholder="Username" required>
        <br />
        <br />
        <input type="text" name="email" placeholder="Email" required>
        <br />
        <br />
        <input type="password" name="password" placeholder="Password" required>
        <br />
        <br />
        <input type="password" name="passwordConf" placeholder="Re-enter password" required>
        <br />
        <br />
        <input type="submit" value="Sign-up" name="register" id="register">
      </form>
    </div>
  </div>
  <div class="col-md-3">

  </div>
</div>
