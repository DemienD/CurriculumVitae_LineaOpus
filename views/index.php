    <!--                     Intro                     -->
    <div class="intro-section">
      <div class="row">
        <div class="col-lg-4 intro-card">
          <h2>Hoe werkt CVCreate?</h2>
          <p>Volg de stappen en creëer je CV!</p>
          <div id="stepsCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#stepsCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#stepsCarousel" data-slide-to="1"></li>
              <li data-target="#stepsCarousel" data-slide-to="2"></li>
              <li data-target="#stepsCarousel" data-slide-to="3"></li>
              <li data-target="#stepsCarousel" data-slide-to="4"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="images/steps/1.png" alt="Step 1">
                <center class="sliderheight">
                  <h4><span class="badge">1</span> Voer je gegevens in om te beginnen met het maken van jou CV</h4>
                </center>
              </div>
              <div class="item">
                <img src="images/steps/2.png" alt="Step 2">
                <center>
                  <h4><span class="badge">2</span> Kies de elementen en gegevens die jij toe wilt voegen</h4>
                </center>
              </div>
              <div class="item">
                <img src="images/steps/3.png" alt="Step 3">
                <center>
                  <h4><span class="badge">3</span> Kies het design dat<br />bij jou past</h4>
                </center>
              </div>
              <div class="item">
                <img src="images/steps/4.png" alt="Step 4">
                <center>
                  <h4><span class="badge">4</span> Koop uw CV<br />via PayPal</h4>
                </center>
              </div>
              <div class="item">
                <img src="images/steps/5.png" alt="Step 5">
                <center>
                  <h4><span class="badge">5</span> Download en print je CV en start met soliciteren</h4>
                </center>
              </div>
            </div>
          </div>
          <script>
          $(document).ready(function(){

            var height = $('.sliderheight').height();
            $('.carousel-inner .item center').height(height);
          });
          </script>

        </div>
        <div class="col-lg-4 intro-card">
          <h2>Snel aan de slag</h2>
          <p>Vul je gegevens in om snel van start te gaan!</p>
          <form method="post" action="create.php">
            <ul>
              <li><input name="startform-firstname" id="startform-firstname" type="text" placeholder="Voornaam"></li>
              <li><input name="startform-lastname" id="startform-lastname" type="text" placeholder="Achternaam"></li>
              <li><input name="startform-dob" id="startform-dob" type="text" placeholder="Geboortedatum"></li>
              <li><input name="startform-email" id="startform-email" type="text" placeholder="Email"></li>
            </ul>
            <input type="submit" name="submitCV" id="submitCV" value="Maak uw CV">
        </form>
        </div>
        <div class="col-lg-4 intro-card">
          <h2>Een CV, wat nu?</h2>
          <p>Ben jij op zoek naar werk? Wil je ergens solliciteren maar heb je nog geen CV om op te sturen?
          CVCreate helpt je daarbij! Kijk hieronder eens naar onze CV mogelijkheden, lees de Tips &amp; Tricks of bekijk wat vacatures!</p>
          <ul class="intro-steps links">
            <li><a href="#">&gt; Templates</a></li>
            <li><a href="#">&gt; Tips &amp; tricks</a></li>
            <li><a href="#">&gt; Kosten</a></li>
            <li><a href="#">&gt; Vacatures</a></li>
            <li><a href="#">&gt; Voorwaarden</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!--                     Quote                     -->
    <div class="quote-section">
      <p class="quote">
        <em class="quote-l">
          There are no secrets to succes. It is the result
        </em>
        <em class="quote-r">
            of preparation, hard work and learning from failure.
        </em>
      </p>
      <em class="author">C. Powell</em>
    </div>

    <!--                     Templates                     -->
    <div class="row template-section">
      <div class="col-lg-4 templates-support">
        <h2>CV Templates</h2>
        <p>Sed imperdiet lobortis nisl, sed semper dolor lacinia rutrum. Morbi eu magna nulla. Proin dapibus dolor maximus, viverra ipsum sed, porta augue. Nunc a arcu pulvinar, dignissim erat id, efficitur diam.</p>

        <a href="#"><button class="wideButton">Bekijk alle templates</button></a>
      </div>
      <div class="col-lg-7 templates-list">
        <div class="row">
        </div>
      </div>
    </div>
    <div class="row stats-section">
      <div class="stat col-md-4 ">
        <div class="disc"><span class="value">1000</span></div>
        <h4>CV'S <br /> GEMAAKT</h4>
      </div>
      <div class="stat col-md-4 ">
        <div class="disc"><span class="value">200</span></div>
        <h4>BANEN <br /> GEVONDEN</h4>
      </div>
      <div class="stat col-md-4 ">
        <div class="disc"><span class="value">30</span></div>
        <h4>OPEN <br /> VACATURES</h4>
      </div>
    </div>
    <div class="row user-reviews">

      <!-- CAROUSEL OPINIONS -->
      <div class="carousel slide text-center" id="theCarousel" data-ride="carousel">
        <!-- bottom dots --> <!--
        <ol class="carousel-indicators">
          <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#theCarousel" data-slide-to="1"></li>
          <li data-target="#theCarousel" data-slide-to="2"></li>
          <li data-target="#theCarousel" data-slide-to="3"></li>
        </ol>  -->

        <div class="carousel-inner" role="listbox">
        <?php

        /*
        Array
          (
          [0] => Array
          (
              [image] => userImg\image_14754800715b7ac21269925333b37822cb343daa7866de052b.png
              [name] => J. Ribbers
              [quote] => Donec lacinia imperdiet lacus viverra dignissim.
          Sed ac tortor tincidunt orci ullamcorper elementum ut vel sapien.
          )

          [1] => Array
          (
              [image] => userImg\image_1475498502a3ccac314e2d473145c5fb029f335e22259f325e.png
              [name] => H. Example
              [quote] => There are no secrets to succes. It is the result
          of preparation, hard work and learning from failure.
          )

          )
        */

        $activeToggle = true;
        for($i = 0; $i < count($reviewArr); $i += 1) {
          $image = ''; // declare the variabes so that the value will be stored during the foreach loop.
          $name = ''; // declare the variabes so that the value will be stored during the foreach loop.
          $quote = ''; // declare the variabes so that the value will be stored during the foreach loop.
          $active = '';
          foreach($reviewArr[$i] as $key => $value) {
            if($key == 'image'){
              $image = $value;
            } elseif($key == 'name') {
              $name = $value;
            } elseif($key == 'quote'){
              $quote = $value;
            }
            if($activeToggle){
              $active = ' active';
              $activeToggle = false;
            }
          }
          //echo the HTML geniousness Demien GAVE me
          echo '<!-- content voor carousel -->
          <div class="item'.$active.'">
            <div class="profile" style="background: url(\'images/'.$image.'\');background-size: cover;"></div>
            <p class="quote">
              <em class="quote-l">
                '.$quote.'
              </em>
              <em class="author">
                '.$name.'
              </em>
            </p>
          </div>';
        }

        ?>

        <!-- CONTROLS -->
        <a class="left carousel-control" href="#theCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#theCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>




    <!--<div class="item">
      <div class="profile" style="background: url('../../images/headshot2.jpg');background-size: cover;"></div>
      <p class="quote">
        <em class="quote-l">
          Donec lacinia imperdiet lacus viverra dignissim.
        </em>
        <em class="quote-r">
            Sed ac tortor tincidunt orci ullamcorper elementum ut vel sapien.
        </em>
        <em class="author">D. Drost</em>
      </p>
    </div>-->
