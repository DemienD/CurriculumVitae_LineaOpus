<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src='parallax.min.js'></script>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'>
    <link rel='stylesheet' href='styles/main.css'>


  </head>
  <body>
    <!--                     Menu                     -->
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapsed-navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><h1><img class='logo' src="../images/Logo-blanc.png" alt="">CVCreate.nl</h1></a>
          <script type="text/javascript">
            function templateScale(){
              var temWidth = $('#XTI').width();
              console.log(temWidth);
              var temHeight = temWidth * 1.4153605015673981191222570532915;

              $('.template').height(temHeight);
              $('#Test, .plus').width($('#Test').height());
            }
            $(document).ready( function() {
             var logoheight = $('.logo').height();
             var navHeight = $('#collapsed-navbar').height();
             var padding = (navHeight - logoheight)/6;
             $('.logo').css('margin-bottom', padding);
            })
          </script>
        </div>
        <div class="collapse navbar-collapse" id="collapsed-navbar">
          <ul class="nav navbar-right">
            <li class="current"><a href="#">Home</a></li>
            <li><a href="#">Templates</a></li>
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Voorwaarden</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Start content -->
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
    </div>
    <div class="row mainContent">
      <div class="col-md-4">
        <h3>Content</h3>
        <p>lipsum</p>
      </div>
      <div class="col-md-4">
        <h3>Content</h3>
        <p>lipsum</p>
      </div>
      <div class="col-md-4">
        <h3>Content</h3>
        <p>lipsum</p>
      </div>
    </div>
    <!-- End content -->
    <footer class="row">
      <div class="col-md-3">&copy; Copyright 2016</div>
      <div class="col-md-6"></div>
      <div class="col-md-3">SOCIAL SOCIAL SOCIAL</div>
    </footer>
  </body>
</html>
