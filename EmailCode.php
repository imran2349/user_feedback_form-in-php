<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Favicon -->
      <link href="img/faveicon.jpg" rel="icon">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/PHPMailer.php'; 
require 'phpmailer/src/SMTP.php';

if(isset($_POST["send"])){
$mail = new PHPMailer(true);
$mail->isSMTP();

$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'imrankhanpakhtoon92@gmail.com';
$mail->Password ='nfos qyaj hpna ield';
$mail->SMTPSecure = 'ssl';
 $mail->Port = 465;
$mail->setFrom('imrankhanpakhtoon92@gmail.com'); // Your gmail
$mail->addAddress($_POST["email"]);
$mail->isHTML(true);
$mail->Subject = $_POST["subject"];
$mail->Body = $_POST["message"];
  if (isset($_FILES['attachment']) && !empty($_FILES['attachment']['name'])) {
        $totalAttachments = count($_FILES['attachment']['name']);

        for ($i = 0; $i < $totalAttachments; $i++) {
            $attachment = $_FILES['attachment']['tmp_name'][$i];
            $attachmentName = $_FILES['attachment']['name'][$i];
            $mail->addAttachment($attachment, $attachmentName);
        }
    }




$mail->send();
echo
"
<script>
alert('Sent Successfully');
document.location.href = 'contact.php';
</script>";
}
?>