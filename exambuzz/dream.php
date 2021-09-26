<?php
require_once 'vendor/autoload.php';
 
// Create the Transport
$transport = (new Swift_SmtpTransport('sg3plcpnl0014.prod.sin3.secureserver.net', 587, 'tls'))
  ->setUsername('d5frosty@prac.xyz')
  ->setPassword('TeamSyncbit');
 
// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);
 
// Create a message
$body = 'Hello, Everyone this is  auto generated mail a**holes';
 
$message = (new Swift_Message('no-reply@prac.xyz'))
  ->setFrom(['d5frosty@prac.xyz' => 'FROSTY'])
  ->setTo(['nishit123@gmail.com'])
  ->setCc(['atikjain55@gmail.com','tusharharel2@gmail.com','vishalpathak19972016@gmail.com'])
  //->setBcc(['chaturvedi.nishit12@gmail.com'])
  ->setBody($body)
  ->setContentType('text/html');
 
// Send the message
$mailer->send($message);


?>