<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      require_once 'inc/includes.php';

      foreach ($headArr as $head) {
        echo $head;
      }

      foreach ($cssArr as $css) {
        echo '<link rel="stylesheet" href='.$css.'>';
      }

      foreach ($jsArr as $js) {
        echo '<script src='.$js.'></script>';
      }
    ?>
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
        <?php $error; ?>
        <a class="navbar-brand" href="#"><h1><img class='logo' src="../images/Logo-blanc.png" alt=""><?php if (isset(TITLE)) { echo TITLE; } else { $error .= 'Error, TITLE unset /n'; }; ?></h1></a>
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
          <?php
            if($nav) {
              foreach (MAIN_NAVIGATION as $title => $href) {
                echo "<li><a href=".$href.">".$title."</a></li>";
              }
           ; } else {
              $error .= "There was a problem with the navigation.../n";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>

    <!--                     Intro                     -->
    <div class="intro-section">
      <div class="row">
        <div class="col-lg-4 intro-card">
          <h2><?php if (isset(INTRO_HEAD)) { echo INTRO_HEAD; } else { $error .= 'Error, INTRO_HEAD unset /n'; }; ?></h2>
          <p><?php if (isset(INTRO_PARA)) { echo INTRO_PARA; } else { $error .= 'Error, INTRO_PARA unset /n'; }; ?></p>
          <ul>
            <form action="">
              <li><input name="startform-firstname" id="startform-firstname" type="text" placeholder="<?php if (isset(STARTFORM_FIRSTNAME)) { echo STARTFORM_FIRSTNAME; } else { $error .= 'Error, STARTFORM_FIRSTNAME unset /n';}; ?>"></li>
              <li><input name="startform-lastname" id="startform-lastname" type="text" placeholder="<?php if (isset(STARTFORM_LASTNAME)) { echo STARTFORM_LASTNAME; } else { $error .= 'Error, STARTFORM_LASTNAME unset /n';}; ?>"></li>
              <li><input name="startform-dob" id="startform-dob" type="text" placeholder="<?php if (isset(STARTFORM_DOB)) { echo STARTFORM_DOB; } else { $error .= 'Error, STARTFORM_DOB unset /n';}; ?>"></li>
              <li><input name="startform-email" id="startform-email" type="text" placeholder="<?php if (isset(STARTFROM_EMAIL)) { echo STARTFROM_EMAIL; } else { $error .= 'Error, STARTFROM_EMAIL unset /n';}; ?>"></li>
              <li>
                <select name="startform-sector" id="startform-sector" class="form-control">
                  <option selected disabled>Select your option</option>
                  <?php
                    if(isset(SECTORS)) {
                      foreach ($SECTORS as $name => $abbr) {
                        echo '<option value='.$abbr.'>'.$name.'</option>';
                      }
                    } else {
                      $error .= 'AN ERROR OCCURED; unable to print SECTORS';
                    }
                  ?>

                </select>
              </li>
            </ul>
            <input type="submit" value="<?php  if (isset(COLUMN_1_BUTTON)) { echo COLUMN_1_BUTTON; } else { $error .= 'Error, COLUMN_1_BUTTON unset /n';}; ?>">
        </form>
        </div>
        <div class="col-lg-4 intro-card">
          <h2><?php if (isset(INTRO_HEAD_2)) { echo INTRO_HEAD_2; } else { $error .= 'Error, INTRO_HEAD_2 unset /n';}; ?></h2>
          <p><?php if (isset(INTRO_PARA_3)) { echo INTRO_PARA_3; } else { $error .= 'Error, INTRO_PARA_3 unset /n';}; ?></p>
          <ul class="intro-steps">
            <li>
              <h4><?php if (isset(INTRO_STEPS_HEAD_1)) { echo INTRO_STEPS_HEAD_1; } else { $error .= 'Error, INTRO_STEPS_HEAD_1 unset /n';}; ?></h4>
              <p><?php if (isset(INTRO_STEPS_1)) { echo INTRO_STEPS_1; } else { $error .= 'Error, INTRO_STEPS_1 unset /n';}; ?></p>
            </li>
            <li>
              <h4><?php if (isset(INTRO_STEPS_HEAD_2)) { echo INTRO_STEPS_HEAD_2; } else { $error .= 'Error, INTRO_STEPS_HEAD_2 unset /n';}; ?></h4>
              <p><?php if (isset(INTRO_STEPS_2)) { echo INTRO_STEPS_2; } else { $error .= 'Error, INTRO_STEPS_2 unset /n';}; ?></p>
            </li>
            <li>
              <h4><?php if (isset(INTRO_STEPS_HEAD_3)) { echo INTRO_STEPS_HEAD_3; } else { $error .= 'Error, INTRO_STEPS_HEAD_3 unset /n';}; ?></h4>
              <p><?php if (isset(INTRO_STEPS_3)) { echo INTRO_STEPS_3; } else { $error .= 'Error, INTRO_STEPS_3 unset /n';}; ?></p>
            </li>
            <li>
              <h4><?php if (isset(INTRO_STEPS_HEAD_4)) { echo INTRO_STEPS_HEAD_4; } else { $error .= 'Error, INTRO_STEPS_HEAD_4 unset /n';}; ?></h4>
              <p><?php if (isset(INTRO_STEPS_4)) { echo INTRO_STEPS_4; } else { $error .= 'Error, INTRO_STEPS_4 unset /n';}; ?></p>
            </li>
            <li>
              <h4><?php if (isset(INTRO_STEPS_HEAD_5)) { echo INTRO_STEPS_HEAD_5; } else { $error .= 'Error, INTRO_STEPS_HEAD_5 unset /n';}; ?><?php if (isset(INTRO_HEAD_2)) { echo INTRO_HEAD_2; } else { $error .= 'Error, INTRO_HEAD_2 unset /n';}; ?></h4>
              <p><?php if (isset(INTRO_STEPS_5)) { echo INTRO_STEPS_5; } else { $error .= 'Error, INTRO_STEPS_5 unset /n';}; ?></p>
            </li>
          </ul>
          <a href=""><button class="wideButton"><?php if (isset(COLUMN_2_BUTTON)) { echo COLUMN_2_BUTTON; } else { $error .= 'Error, COLUMN_2_BUTTON unset /n';}; ?></button></a>
        </div>
        <div class="col-lg-4 intro-card">
          <h2><?php if (isset(INTRO_HEAD_3)) { echo INTRO_HEAD_3; } else { $error .= 'Error, INTRO_HEAD_3 unset /n';}; ?></h2>
          <p><?php if (isset(INTRO_PARA_3)) { echo INTRO_PARA_3; } else { $error .= 'Error, INTRO_PARA_3 unset /n';}; ?></p>
          <ul class="intro-steps links">
            <?php
              if(INTRO_LINKS) {
                foreach (INTRO_LINKS as $title => $href) {
                  echo "<li><a href=".$href.">".$title."</a></li>";
                }
             ; } else {
                $error .= "There was a problem with the intro links.../n";
              }
            ?>
          </ul>
        </div>
      </div>
    </div>

    <!--                     Quote                     -->
    <div class="quote-section">
      <p class="quote">
        <em class="quote-l">
          <?php if (isset(QUOTE_L)) { echo QUOTE_L; } else { $error .= 'Error, QUOTE_L unset /n';}; ?>
        </em>
        <em class="quote-r">
            <?php if (isset(QOUTE_R)) { echo QOUTE_R; } else { $error .= 'Error, QOUTE_R unset /n';}; ?>
        </em>
      </p>
      <em class="author"><?php if (isset(QOUTE_AUTHOR)) { echo QOUTE_AUTHOR; } else { $error .= 'Error, QOUTE_AUTHOR unset /n';}; ?></em>
    </div>

    <!--                     Templates                     -->
    <div class="row template-section">
      <div class="col-lg-4 templates-support">
        <h2><?php if (isset(TEMPLATES_HEAD)) { echo TEMPLATES_HEAD; } else { $error .= 'Error, TEMPLATES_HEAD unset /n';}; ?></h2>
        <p><?php if (isset(TEMPLATES_PARA)) { echo TEMPLATES_PARA; } else { $error .= 'Error, TEMPLATES_PARA unset /n';}; ?></p>

        <select name="categorie" id="categorie" class="form-control">
          <?php
            if(isset(TEMPLATE_CATAGORIES)) {
              foreach (TEMPLATE_CATAGORIES as $name => $abbr) {
                echo '<option value='.$abbr.'>'.$name.'</option>';
              }
            } else {
              $error .= 'AN ERROR OCCURED; unable to print TEMPLATE_CATAGORIES/n';
            }
          ?>
        </select>
        <a href="#"><button class="wideButton"><?php if (isset(TEMPLATES_BUTTON)) { echo TEMPLATES_BUTTON; } else { $error .= 'Error, TEMPLATES_BUTTON unset /n';}; ?></button></a>
      </div>
      <div class="col-lg-7 templates-list">
        <script type="text/javascript">
        $(document).ready( function() {
          templateScale();
          $(window).resize( function() {
            templateScale()
          })
        })
        </script>
        <div class="row">
          <div id="XTI" class="col-lg-6 template">
            <div>
              <p>Alfredo</p>
              <div id="Test">+</div>
            </div>
          </div>
          <div class="col-lg-6 template">
            <div>
              <p>Alfredo</p>
              <div class="plus">+</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 template">
            <div>
              <p>Alfredo</p>
              <div class="plus">+</div>
            </div>
          </div>
          <div class="col-lg-6 template">
            <div>
              <p>Alfredo</p>
              <div class="plus">+</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row stats-section">
      <div class="stat">
        <div class="col-md-4 disc"><span class="value"></span></div>
        <h4></h4>
      </div>
      <div class="stat">
        <div class="col-md-4 disc"><span class="value"></span></div>
        <h4></h4>
      </div>
      <div class="stat">
        <div class="col-md-4 disc"><span class="value"></span></div>
        <h4></h4>
      </div>
    </div>
    <div class="row user-reviews">
      <!-- <div class="trigger"><</div>
      <div class="trigger">></div> -->
      <div class="profile"></div>
      <p class="quote">
        <em class="quote-l">
          <?php if (isset(FEEDBACK_L)) { echo FEEDBACK_L; } else { $error .= 'Error, FEEDBACK_L unset /n';}; ?>
        </em>
        <em class="quote-r">
            <?php if (isset(FEEDBACK_R)) { echo FEEDBACK_R; } else { $error .= 'Error, FEEDBACK_R unset /n';}; ?>
        </em>
        <em class="author"><?php if (isset(FEEDBACK_AUTHOR)) { echo FEEDBACK_AUTHOR; } else { $error .= 'Error, FEEDBACK_AUTHOR unset /n';}; ?></em>
      </p>
    </div>

    <footer class="row">
      <div class="col-md-3">&copy; Copyright 2016</div>
      <div class="col-md-6 visible-md-6"></div>
      <div class="col-md-3">SOCIAL SOCIAL SOCIAL</div>
    </footer>
  </body>
</html>
