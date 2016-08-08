<?php

// After filling in the clientID, clientSecret and redirectUri (within 'config.json'), you should visit this page
// to get the authorisation URL.

// Note that the redirectUri value should point towards a hosted version of 'redirect_handler.php'.

require_once 'vendor/autoload.php';

use rajeshtomjoe\googlecontacts\helpers\GoogleHelper;

if(isset($_SESSION['access_token'])){
	unset($_SESSION['access_token']);
}

$client = GoogleHelper::getClient();

$authUrl = GoogleHelper::getAuthUrl($client);

header('Location: '.$authUrl);
