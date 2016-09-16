<div class="row header_section">
  <div id="contImg" class="col-xs-12" data-parallax="scroll">
    <script type="text/javascript">
      $('#contImg').parallax({imageSrc: '../images/pageimage.jpg'});
    </script>
    <h2>
      <center>
        Page Title<br />
        <small>Subtitle</small>
      </center>
    </h2>
  </div>
  <div class="col-md-6">
    <form action="registration.php" method="post">
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
      <input type="submit" value="Register" name="register" id="register">
    </form>
  </div>

  <div class="col-md-6">

  </div>
</div>
