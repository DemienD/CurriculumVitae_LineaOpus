<?php
  include("inc/mpdf60/mpdf.php");

  $name = 'Demien Drost';
  $image = 'image_14752251233876ce6ffef9eefcfaae933151b7a45abfc77fef.png';

  $resume = new mPDF('utf-8', 'Letter', 0, 'roboto', 0, 0, 0, 0, 0, 0);
  $content = "
    <style>
      .sidebar {
        width: 30%;
        background-color: #0066aa;
        height: 100%:
        position: absolute;
        left: 0;
        top: 0;
        margin: 0;
        padding: 0;
      }

      h1 {
        padding-top: 5%;
        color: #fff;
        width: 100%;
        font-family: 'roboto';
        word-spacing: 63mm;
        text-align: center;

      }
    </style>
    <div class='sidebar'>
      <img src='userImg/".$image."' class='image'/>
      <h1>".$name."</h1>

    </div>
  ";

  $resume->WriteHTML($content);
  $resume->Output();
  exit;
?>
