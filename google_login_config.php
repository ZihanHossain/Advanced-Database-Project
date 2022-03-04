<?php
require_once 'vendor/autoload.php';

// init configuration
$clientID = '169867576286-kng56ta7itph14qe2j43ge57i1200uh9.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://127.0.0.1/login_with_google.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
?>