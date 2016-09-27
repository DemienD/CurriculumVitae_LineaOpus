<?php
  include 'inc/package.php';

  define('PAGE_TITLE', 'Create');
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $additionalCSS = ['create'];
  // $additionalJS = ['create.js'];

  // General Data

  $personalData = array(
    ['Persoonlijke informatie', false],
    'personal_firstName'    => ['Voornaam', 'text', true],
    'personal_lastName'     => ['Achternaam', 'text', true],
    'personal_completeName' => ['Naam, volledig', 'text', true],
    'personal_maritalStatus' => ['Burgerlijke staat', 'select', true, ['Ongehuwd', 'Gehuwd']],
    'personal_gender' => ['Geslacht', 'select', true, ['Man', 'Vrouw']],
    'personal_address_street' => ['Straat, huisnummer', 'text', false],
    'personal_address_zip' => ['Postcode, stad', 'text', false],
    'personal_telphone_land' => ['Vaste telefoon', 'text', false],
    'personal_telphone_mob' => ['Mobiel', 'text', false],
    'personal_dob' => ['Geboortedatum', 'text', true],
    'personal_cityob' => ['Geboorteplaats', 'text', true],
    'personal_email' => ['Email', 'text', true]
  );

  $educationData = array(
    ['Opleidingen', true],
    'education_school' => ['School', 'text', false],
    'education_education' => ['Opleiding', 'text', false],
    'education_from' => ['Van', 'text', false],
    'education_to' => ['Tot', 'text', false]
  );

  $workExperienceData = array(
    ['Werkervaring', true],
    'work_company' => ['Bedrijf', 'text', false],
    'work_function' => ['Functie', 'text', false],
    'work_from' => ['Van', 'text', false],
    'work_to' => ['Tot', 'text', false]
  );

  $linguarData = array(
    ['Taalkennis', true],
    'language_lang' => ['Taal', 'text', false],
    'language_skill' => ['Behendigheid', 'range', false]
  );

  $computerData = array(
    ['Programmas', true],
    'program_progr' => ['Programma', 'text', false],
    'program_skill' => ['Behendigheid', 'range', false]
  );

  $drivingData = array(
    ['Rijbewijs', true],
    'license' => ['Rijbewijs', 'select', false,['A', 'A1', 'A2', 'AM', 'B', 'BE', 'C', 'CE', 'C1', 'C1E', 'D', 'DE', 'D1', 'D1E', 'T']]
  );

  // Sector specific
  $sectorProgramming = array(
    ['Programmeertalen', true],
    'programming_lang' => ['Programmeertaal', 'text', false],
    'programming_skill' => ['Behendigheid', 'range', false]
  );

  $sectorProjects = array(
    ['Projecten', true],
    'project_name' => ['Projectnaam', 'text', false],
    'project_description' => ['Omschrijving', 'textarea', false],
    'project_link' => ['Link', 'text', false]
  );

  //Default form elements
  $form = [$personalData, $educationData, $workExperienceData, $linguarData, $computerData, $drivingData];
  if(isset($_POST['startform-sector'])) {
    switch ($_POST['startform-sector']) {
      case '9':
      array_push($form, $sectorProgramming, $sectorProjects);
      break;

      default:
      # code...
      break;
    }
    $formSet = true;
  }


  //Handling the form on index.php


  //Save CV input
  if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    if(isset($_POST['saveCV'])) {
      if(isset($_SESSION['username']) && isset($_SESSION['id'])){
        include 'inc/connection.php';
        $start = $connection->prepare("INSERT INTO `concept` (`id`, `user`, `personal_firstName`, `personal_lastName`, `personal_maritalStatus`, `personal_gender`, `personal_address`, `personal_city`, `personal_telephoneLand`, `personal_telephoneMobile`, `personal_birthday`, `personal_birthCity`, `personal_email`, `education_school`, `education_education`, `education_from`, `education_to`, `work_company`, `work_function`, `work_from`, `work_to`, `language_language`, `language_skill`, `program_program`, `program_skill`, `license_type`) VALUES (NULL, '1', :personal_firstName, :personal_lastName, :personal_maritalStatus, :personal_gender, :personal_address, :personal_city, :personal_telephoneLand, :personal_telephoneMobile, :personal_birthday, :personal_birthCity, :personal_email, :education_school, :education_education, :education_from, :education_to, :work_company, :work_function, :work_from, :work_to, :language_language, :language_skill, :program_program, :program_skill, :license_type)");

        $start->bindValue(':personal_firstName', $_POST['personal_firstName'], PDO::PARAM_STR);
        $start->bindValue(':personal_lastName', $_POST['personal_lastName'], PDO::PARAM_STR);
        $start->bindValue(':personal_maritalStatus', $_POST['personal_maritalStatus'], PDO::PARAM_STR);
        $start->bindValue(':personal_gender', $_POST['personal_gender'], PDO::PARAM_STR);
        $start->bindValue(':personal_address', $_POST['personal_address_street'], PDO::PARAM_STR);
        $start->bindValue(':personal_city', $_POST['personal_address_zip'], PDO::PARAM_STR);
        $start->bindValue(':personal_telephoneLand', $_POST['personal_telphone_land'], PDO::PARAM_STR);
        $start->bindValue(':personal_telephoneMobile', $_POST['personal_telphone_mob'], PDO::PARAM_STR);
        $start->bindValue(':personal_birthday', $_POST['personal_dob'], PDO::PARAM_STR);
        $start->bindValue(':personal_birthCity', $_POST['personal_cityob'], PDO::PARAM_STR);
        $start->bindValue(':personal_email', $_POST['personal_email'], PDO::PARAM_STR);
        $start->bindValue(':education_school', serialize($_POST['education_school']), PDO::PARAM_STR);
        $start->bindValue(':education_education', serialize($_POST['education_education']), PDO::PARAM_STR);
        $start->bindValue(':education_from', serialize($_POST['education_from']), PDO::PARAM_STR);
        $start->bindValue(':education_to', serialize($_POST['education_to']), PDO::PARAM_STR);
        $start->bindValue(':work_company', serialize($_POST['work_company']), PDO::PARAM_STR);
        $start->bindValue(':work_function', serialize($_POST['work_function']), PDO::PARAM_STR);
        $start->bindValue(':work_from', serialize($_POST['work_from']), PDO::PARAM_STR);
        $start->bindValue(':work_to', serialize($_POST['work_to']), PDO::PARAM_STR);
        $start->bindValue(':language_language', serialize($_POST['language_lang']), PDO::PARAM_STR);
        $start->bindValue(':language_skill', serialize($_POST['language_skill']), PDO::PARAM_STR);
        $start->bindValue(':program_program', serialize($_POST['program_progr']), PDO::PARAM_STR);
        $start->bindValue(':program_skill', serialize($_POST['program_skill']), PDO::PARAM_STR);
        $start->bindValue(':license_type', serialize($_POST['license']), PDO::PARAM_STR);
        $start->execute();
        // header('Location: /profile.php');
      }
    }
    $view = 'views/create.php';
  } else {
    $view = '<p>You should <a href="login.php">login here,</a>prior to filling out this form.</p><p>Don\'t have an account yet? <a href="register.php">regsiter here!</a></p>';
  }



  include $template;

  if (isset($_POST['submitCV'])) {
    if (isset($_POST['startform-firstname'])) {
      echo "<script>$('#personal_firstName').val('".$_POST['startform-firstname']."')</script>";
    }
    if (isset($_POST['startform-lastname'])) {
      echo "<script>$('#personal_lastName').val('".$_POST['startform-lastname']."')</script>";
    }
    if (isset($_POST['startform-dob'])) {
      echo "<script>$('#personal_dob').val('".$_POST['startform-dob']."')</script>";
    }
    if (isset($_POST['startform-email'])) {
      echo "<script>$('#personal_email').val('".$_POST['startform-email']."')</script>";
    }
  }
?>
