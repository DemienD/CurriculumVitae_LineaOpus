<div class="row header_section">
  <div id="contImg" class="col-xs-12" data-parallax="scroll">
    <h2>
      <center>
        Sign in<br />
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
      <form action="login.php" method="post" class="loginForm">
        <input type="text" name="email" placeholder="Email" required>
        <br />
        <br />
        <input type="password" name="password" placeholder="Password" required>
        <br />
        <br />
        <input type="submit" value="Sign-in" name="login" id="login">
      </form>
    </div>
  </div>
  <div class="col-md-3">

  </div>
</div>
