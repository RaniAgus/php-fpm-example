<?php

function enviar_mail($to, $mensaje, $subject) {
  require_once '../vendor/swiftmailer-5.4.12/lib/swift_required.php';

  $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
    ->setUsername(getenv('GMAIL_USER'))
    ->setPassword(getenv('GMAIL_PASSWORD'));

  $mailer = Swift_Mailer::newInstance($transport);

  $casilla = array(getenv('GMAIL_USER') => getenv('GMAIL_USERNAME'));

  $message = Swift_Message::newInstance($subject)
    ->setFrom($casilla)
    ->setTo($to)
    ->setCc($casilla)
    ->setBody($mensaje, 'text/html');

  try {
    $result = $mailer->send($message);
    echo htmlspecialchars_decode($mensaje);
  }
  catch (Exception $e)
  {
   echo 'Error al enviar el mail a ' . json_encode($to) . '- Con el subject: ' . $subject;
  }
}

enviar_mail(getenv('TO'), '<h1>It works!</h1>', 'Test');

?>
