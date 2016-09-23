<?php
  include 'inc/package.php';
  include 'inc/classes/concept.php';

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
    'work_tasks' => ['Taken', 'textarea', false],
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
  if(isset($_POST['saveCV'])) {
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
      if(isset($_SESSION['username']) && isset($_SESSION['id'])){
        $concept = new Concept(true, $_POST, $_SESSION['username'], $_SESSION['id']);
        header('Location: /profile.php');
      }
    } else {
      echo "You're nog logged in";
    }
  }


  $view = 'views/create.php';

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
