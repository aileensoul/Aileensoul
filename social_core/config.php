<?php
/*
------------------------------------------------------
  www.idiotminds.com
--------------------------------------------------------
*/
session_start();
define('BASE_URL', filter_var('https://www.aileensoul.com/social/', FILTER_SANITIZE_URL));
// Visit https://code.google.com/apis/console to generate your
// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
define('CLIENT_ID','OAUTH CLIENT ID');
define('CLIENT_SECRET','OAUTH CLIENT SECRET');
define('REDIRECT_URI','OAUTH REDIRECT URI');//example:http://localhost/social/login.php?google,http://example/login.php?google
define('APPROVAL_PROMPT','auto');
define('ACCESS_TYPE','offline');

//For facebook
define('APP_ID','733552333461096');
define('APP_SECRET','01970c33734cf48d98209c94a9df137a');

?>