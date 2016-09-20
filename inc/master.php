<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
      if(isset($additionalHead)){
        echo $additionalHead;
      }
    ?>

    <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <?php
      if(isset($additionalJS)){
        foreach($additionalJS as $script) {
        echo '<script type="text/javascript" src="inc/scripts/'.$script.'"></script>';
      }
      }
    ?>

    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700'>
    <link rel='stylesheet' href='inc/styles/main.css'>
    <?php
      if(isset($additionalCSS)){
        foreach($additionalCSS as $styleSheet) {
          echo '<link rel="stylesheet" type="text/css" href="inc/styles/'.$styleSheet.'.css" />';
        }
      }
    ?>
    <title><?php
      if(defined('PAGE_TITLE')){
        echo PAGE_TITLE . " | CVCreate";
      } else {
        echo "CVCreate";
      }; ?>
    </title>
  </head>
  <body>
    <?php
      if(isset($_SESSION['loggedIn'])){
        ?>
        <!--                     Menu ingelogd                     -->
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
                <li class="current"><a href="/">Home</a></li>
                <li><a href="#">Templates</a></li>
                <li><a href="#">Over ons</a></li>
                <li><a href="#">Voorwaarden</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="/login.php?logout=1">Uitloggen</a></li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container-fluid" style="min-height: 90vh; padding: 0; margin: 0;">

        <?php
      } else {
    ?>
    <!--                     Menu niet-ingelogd                     -->
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
            <li class="current"><a href="/">Home</a></li>
            <li><a href="#">Templates</a></li>
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Voorwaarden</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="/login.php">Log in</a></li>
            <li><a href="/registration.php">Registreer</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid" style="min-height: 90vh; padding: 0; margin: 0;">
    <!-- Start content -->
    <?php
    }
      if(isset($view)){
        require_once $view;
      } else {
        echo 'No content was found...';
      }
    ?>
    </div>
    <!-- End content -->
    <div class="row footer" id="footer">
      <div class="col-md-3">&copy; Copyright 2016</div>
      <div class="col-md-6"></div>
      <div class="col-md-3">SOCIAL SOCIAL SOCIAL</div>
    </div>
  </body>
</html>
