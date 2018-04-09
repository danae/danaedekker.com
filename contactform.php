<?php
require("vendor/autoload.php");
require("settings.php");

use ReCaptcha\ReCaptcha;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

try
{
  // Create a new request
  $request = Request::createFromGlobals();

  // Check if we made a POST request
  if (!$request->isMethod('POST'))
    throw new MethodNotAllowedHttpException(['POST'],"This script only works by using a POST request");
  
  // Check if the captcha succeeded
  if (!$request->request->has('g-recaptcha-response'))
    throw new BadRequestHttpException("You didn't enter the captcha test");
  
  $recaptchaString = $request->request->get('g-recaptcha-response');
  $recaptcha = new ReCaptcha($recaptchaSecret);
  $recaptchaResponse = $recaptcha->verify($recaptchaString,$request->getClientIp());
  if (!$recaptchaResponse->isSuccess())
    throw new BadRequestHttpException('You failed the captcha test');
  
  // Get the parameters
  if (!$request->request->has('name'))
    throw new BadRequestHttpException("You didn't enter your name");
  $formName = $request->request->get('name');
  
  if (!$request->request->has('email'))
    throw new BadRequestHttpException("You didn't enter your email address");
  $formEmail = $request->request->get('email');
  
  if (!$request->request->has('message'))
    throw new BadRequestHttpException("You didn't enter a message");
  $formMessage = $request->request->get('message');
  
  // Create the message body
  $body = "
    <p>Hello Dennis,</p>
    <p>You have received the following message via the contact form on your site:</p>
    
    <p><b>Your name:</b><br>{$formName}</p>
    <p><b>Your email address:</b><br>{$formEmail}</p>
    <p><b>Your message:</b><br><i>{$formMessage}</i></p>

    <p>Kind regards,<br>Your contact form script</p>
  ";
  
  // Create a new mail transport
  $transport = new Swift_SmtpTransport($smtpServer,$smtpPort,$smtpEncryption);
  $transport->setUsername($smtpUsername);
  $transport->setPassword($smtpPassword);
  
  // Create a new mailer
  $mailer = new Swift_Mailer($transport);

  // Create a new message
  $message = new Swift_Message();
  
  // Fill the message
  $message->setFrom([$formEmail => "{$formName} via contact form"]);
  $message->setTo(['info@dennisdekker.art' => 'Dennis Dekker']);
  $message->setReplyTo([$formEmail => $formName]);
  $message->setSubject('Message via contact form');
  $message->setBody($body,'text/html');
  
  // Send the message
  $mailer->send($message);
  
  // Set response
  $responseMessage = "Your message was sent sccesfully!";
  $response = new JsonResponse(['message' => $responseMessage]);
  $response->send();
}
catch (HttpException $ex)
{
  $response = new JsonResponse(['error' => "Your message wasn't sent: " . $ex->getMessage()],$ex->getStatusCode());
  $response->send();
}
catch (Exception $ex)
{
  $response = new JsonResponse(['error' => "Oops, something went terribly wrong behind the scenes: " . $ex->getMessage()],500);
  $response->send();
}