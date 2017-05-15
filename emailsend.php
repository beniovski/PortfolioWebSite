<?php

require 'phpmailer/PHPMailerAutoload.php';
$name = $_POST["name"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$message = $_POST["message"];

$mail = new PHPMailer;
//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'danielbednarczuk90@gmail.com';                 // SMTP username
$mail->Password = 'matematyka';                          // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('danielbednarczuk90@gmail.com', 'Formularz ');
$mail->addAddress('info@danielbednarczuk.pl');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Wiadomosc ze strony';
$mail->Body    = "<b>imie :</b>".$name."<br>
                <b>nazwisko :</b>".$lastname."<br>
                <b>email :</b>".$email."<br>
                <b>wiadomosc</b>".$message;

if(!$mail->send()) {
   echo $mail->ErrorInfo;
} else {
    header('Location:index.html');
}






