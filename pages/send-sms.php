<?php
// use Twilio\Rest\Client;
use Twilio/Rest/Client.php;
// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'Twilio/autoload.php';

// $client = new Client;



// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = getenv("ACeddfc01bcf4d952c065ddce73d8932d0");
$token = getenv("3e39d516dae018a06034b1259f613964");
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+639466825122", // to
                           [
                               "body" => "This is a message",
                               "from" => "+19896013568"
                           ]
                  );

print($message->sid);