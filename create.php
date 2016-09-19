<?php
  include 'inc/package.php';

  define('PAGE_TITLE', 'Create');

  $additionalJS = ['parallax.min.js'];

  //Handling the form on index.php

  if (isset($_POST['submitCV'])) {
    if (isset($_POST['startform-firstname'])) {
      $firstName = $_POST['startform-firstname'];
    }
    if (isset($_POST['startform-lastname'])) {
      $lastName = $_POST['startform-lastname'];
    }
    $completeName = $firstName . ' ' . $lastName;
    if (isset($_POST['startform-dob'])) {
      $dateOfBirth = $_POST['startform-dob'];
    }
    if (isset($_POST['startform-email'])) {
      $email = $_POST['startform-email'];
    }
    if (isset($_POST['startform-sector'])) {
      $sector = $_POST['startform-sector'];
    }
  }




  // General Data

  $personalData = array(
    'firstName'    => ['Voornaam', 'text', true],
    'lastName'     => ['Achternaam', 'text', true],
    'completeName' => ['Naam, volledig', 'text', true],
    'maritalStatus' => ['Burgerlijke staat', 'select', true, ['ongehuwd', 'getrouwd']],
    'gender' => ['Geslacht', 'select', true, ['Man', 'Vrouw']],
    'address_street' => ['Straat, huisnummer', 'text', false],
    'address_zip' => ['Postcode, stad', 'text', false],
    'telphone_land' => ['Vaste telefoon', 'text', false],
    'telphone_mob' => ['Mobiel', 'text', false],
    'dob' => ['Geboortedatum', 'text', true],
    'cityob' => ['Geboorteplaats', 'text', true],
    'email' => ['Email', 'text', true]
  );

  $educationData = array(
    'school' => ['School', 'text', false],
    'education' => ['Opleiding', 'text', false],
    'from' => ['Van', 'text', false],
    'to' => ['Tot', 'text', false],
  );

  $workExperienceData = array(
    'company' => ['Bedrijf', 'text', false],
    'function' => ['Functie', 'text', false],
    'tasks' => ['Taken', 'textarea', false],
    'from' => ['Van', 'text', false],
    'to' => ['Tot', 'text', false],
  );

  $linguarData = array(
    'language' => ['Taal', 'text', false],
    'languageSkill' => ['Behendigheid', 'range', false],
  );

  $computerData = array(
    'program' => ['Programma', 'text', false],
    'programSkill' => ['Behendigheid', 'range', false],
  );

  $drivingData = array(
    'license' => ['Rijbewijs', 'text', false],
  );

  // Sector specific
  $sectorProgramming = array(
    'programmingLanguage' => ['Programmeertaal', 'text', false],
    'programmingSkill' => ['Behendigheid', 'range', false]
  );

  $sectorProjects = array(
    'project' => ['Projectnaam', 'text', false],
    'description' => ['Omschrijving', 'textarea', false],
    'link' => ['Link', 'text', false]
  );

  //Default form elements
  $form = [$personalData, $educationData, $workExperienceData, $linguarData, $computerData, $linguarData];
  if(isset($sector)) {
    switch ($sector) {
      case '9':
      array_push($form, $sectorProgramming, $sectorProjects);
      break;

      default:
      # code...
      break;
    }
    $formSet = true;
  }

  $view = 'views/create.php';

  include $template;
?>
