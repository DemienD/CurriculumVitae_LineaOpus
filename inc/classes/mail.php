<?php
  require "PHPMailer/PHPMailerAutoload.php";
  function foo() {
    $mail = new PHPMailer();

    $password = "MyLittlesnaHFan123";
    $email = "infocvcreate@gmail.com";
    $mask = 'no-reply@cvcreate.com';

    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Username = $email;
    $mail->Password = $password;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";
    $mail->Port = "465";

    $mail->setFrom($mask, 'Sir Lord Madam Queen Elisabeth the fourtieth');
    $mail->AddAddress('infocvcreate@gmail.com', 'J. Ribbers');

    $mail->Subject  =  'Imigaration | Australian House of order.';
    $mail->IsHTML(true);
    $mail->Body    = 'Hi there ,
    <br />
    this mail was sent using PHPMailer...
    <br />
    cheers... :)';


    if($mail->Send())
    {
      echo "Message was Successfully Send :)";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }
  foo();
?>
