<?php
include './google_login_config.php';
include './DB_config.php';

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
     
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;

    // echo $email;
    echo $name;

    $conn = getConnection();
    $sql = "select * from login where username = '$name'";
    $result = oci_parse($conn, $sql);
    oci_execute($result);
    $result = oci_fetch($result);
    if(!empty($result))
    {
            
        // $err = 'Login successfull';
        header('Location: ./user-login.php?err=Login successfull');
            
    }
    else
    {
        header('Location: ./user-login.php?err=This account is not registered. Please register first.');
    }
    
    // now you can use this profile info to create account in your website and make user logged in.
  } else {
    echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";
  }
?>