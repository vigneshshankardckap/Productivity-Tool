<?php 
  require "google-api-php-client/vendor/autoload.php";
  
  $clientId="391204263871-ebbl34e05rjcvg3357nr6e8ivijgickd.apps.googleusercontent.com";
  $clientSecret="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";
  $redirectURI="http://localhost:43449/signup.php";
  
  $client=new Google_Client();
  $client->setClientId($clientId);
  $client->setClientSecret($clientSecret);
  $client->setRedirectURI($redirectURI);
  $client->addScope("email");
  $client->addScope("profile");
?>