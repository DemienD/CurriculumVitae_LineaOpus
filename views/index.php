    <!--                     Intro                     -->
    <div class="intro-section">
      <div class="row">
        <div class="col-lg-4 intro-card">
          <h2>Hoe werkt CVCreate?</h2>
          <p>Volg de stappen en creëer je CV!</p>
          <ul class="intro-steps">
            <li>
              <h4>Stap 1</h4>
              <p>Vul je gegevens in</p>
            </li>
            <li>
              <h4>Stap 2</h4>
              <p>Kies de elementen voor <em>jouw</em> CV</p>
            </li>
            <li>
              <h4>Stap 3</h4>
              <p>Kies de stijl voor <em>jouw</em> CV</p>
            </li>
            <li>
              <h4>Stap 4</h4>
              <p>Betaal de eenmalige kosten</p>
            </li>
            <li>
              <h4>Stap 5</h4>
              <p>Exporteer je CV en start direct met solliciteren!</p>
            </li>
          </ul>
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
              <li>
                <select required name="startform-sector" id="startform-sector" class="form-control">
                  <option selected disabled>Selecteer uw keuze</option>
                  <option value="1">Agrarisch &amp; Milieu</option>
                  <option value="2">Bouw</option>
                  <option value="3">Dieren &amp; Verzorging</option>
                  <option value="4">Finance</option>
                  <option value="5">Fashion &amp; Styling</option>
                  <option value="6">Gezondheidszorg &amp; Farmacie</option>
                  <option value="7">Handel/Groothandel/Detailhandel</option>
                  <option value="8">Horeca</option>
                  <option value="9">ICT</option>
                  <option value="10">Industrie/Productie</option>
                  <option value="11">Juridisch</option>
                  <option value="12">Kunst, Cultuur &amp; Entertainment</option>
                  <option value="13">Life Sciences</option>
                  <option value="14">Marketing &amp; Communicatie</option>
                  <option value="15">Media &amp; Journalistiek</option>
                  <option value="16">Onderwijs</option>
                  <option value="17">Reizen &amp; Recreatie</option>
                  <option value="18">Techiek</option>
                  <option value="19">Transport &amp; Logistiek</option>
                  <option value="20">Zakelijke dienstverlening</option>
                </select>
              </li>
            </ul>
            <input type="submit" name="submitCV" id="submitCV" value="Maak uw CV">
        </form>
        </div>
        <div class="col-lg-4 intro-card">
          <h2>Een CV, wat nu?</h2>
          <p>Ben jij op zoek naar werk? Wil je ergens solliciteren maar heb je nog geen CV om op te sturen?
          CVCreate helpt je daarbij! Kijk hieronder eens naar onze CV mogelijkheden, lees de Tips &amp; Tricks of bekijk wat vacatures!</p>
          <ul class="intro-steps links">
            <li><a href="#">Templates</a></li>
            <li><a href="#">Tips &amp; tricks</a></li>
            <li><a href="#">Kosten</a></li>
            <li><a href="#">Vacatures</a></li>
            <li><a href="#">Voorwaarden</a></li>
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
        <p>Nulla facilisi. Morbi interdum mauris in viverra gravida. Nunc sit amet viverra enim, ac sodales turpis. Suspendisse sit amet arcu nec enim hendrerit sodales ac sed erat. Sed feugiat erat sit amet bibendum lacinia. Nam mattis interdum magna a viverra.</p>
        <p>Curabitur pretium est tellus, eu mollis felis eleifend ac. Quisque nec massa sed diam luctus condimentum. Praesent mollis neque arcu, ac auctor libero vulputate sed. Vivamus id velit sapien. Aenean sit amet semper sapien, non placerat erat. Quisque pretium, dolor non pulvinar iaculis, augue lectus dictum leo, at cursus nunc ante ac dolor.</p>

        <select name="categorie" id="categorie" class="form-control">
          <option value="">Categorie</option>
          <option value="">Categorie</option>
          <option value="">Categorie</option>
          <option value="">Categorie</option>
          <option value="">Categorie</option>
        </select>
        <a href="#"><button class="wideButton">Bekijk alle templates</button></a>
      </div>
      <div class="col-lg-7 templates-list">
        <div class="row">
          <a href="#">
            <div id="XTI" class="col-lg-6 template">
              <div>
                <p>Alfredo</p>
                <div id="Test">+</div>
                <script type="text/javascript">
                  $(document).ready( function() {
                    templateScale();
                    $(window).resize( function() {
                      templateScale()
                    })
                  })
                </script>
              </div>
            </div>
          </a>
          <a href="#">
            <div class="col-lg-6 template">
              <div>
                <p>Alfredo</p>
                <div class="plus">+</div>
              </div>
            </div>
          </a>
        </div>
        <div class="row">
          <a href="#">
            <div class="col-lg-6 template">
              <div>
                <p>Alfredo</p>
                <div class="plus">+</div>
              </div>
            </div>
          </a>
          <a href="#">
            <div class="col-lg-6 template">
              <div>
                <p>Alfredo</p>
                <div class="plus">+</div>
              </div>
            </div>
          </a>
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

      <!-- CAROUEL OPINIONS -->
      <div class="carousel slide text-center" id="theCarousel" data-ride="carousel">
        <!-- bottom dots --> <!--
        <ol class="carousel-indicators">
          <li data-target="#theCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#theCarousel" data-slide-to="1"></li>
          <li data-target="#theCarousel" data-slide-to="2"></li>
          <li data-target="#theCarousel" data-slide-to="3"></li>
        </ol>  -->

        <!-- content voor carousel -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <div class="profile" style="background: url('../../images/headshot.jpg');background-size: cover;"></div>
            <p class="quote">
              <em class="quote-l">
                Donec lacinia imperdiet lacus viverra dignissim.
              </em>
              <em class="quote-r">
                  Sed ac tortor tincidunt orci ullamcorper elementum ut vel sapien.
              </em>
              <em class="author">L. Ipsum</em>
            </p>
          </div>
          <div class="item">
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
          </div>
          <div class="item">
            <div class="profile" style="background: url('../../images/headshot3.jpg');background-size: cover;"></div>
            <p class="quote">
              <em class="quote-l">
                Donec lacinia imperdiet lacus viverra dignissim.
              </em>
              <em class="quote-r">
                  Sed ac tortor tincidunt orci ullamcorper elementum ut vel sapien.
              </em>
              <em class="author">J. Ribbers</em>
            </p>
          </div>
        </div>

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


<!--
      <div class="profile"></div>
      <p class="quote">
        <em class="quote-l">
          Donec lacinia imperdiet lacus viverra dignissim.
        </em>
        <em class="quote-r">
            Sed ac tortor tincidunt orci ullamcorper elementum ut vel sapien.
        </em>
        <em class="author">L. Ipsum</em>
      </p> -->
    </div>
