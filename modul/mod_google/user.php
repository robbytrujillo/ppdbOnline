<div class="main-content-left">
<?php

########## Google Settings.. Client ID, Client Secret from https://cloud.google.com/console #############
$google_client_id 		= '958203143935-1r3jc5fuafm9um4drphcppfbqv477id1.apps.googleusercontent.com';
$google_client_secret 	= 'P5JE-bzdkq7cLefGZeY30abA';
$google_redirect_url 	= 'http://localhost/blog/google/'; //path to your script
$google_developer_key 	= 'AIzaSyB0dKjktyyYGK7s2_qEtpS_-EjBlIqXCtU';

########## mysql details (Replace with yours) #############
$db_username = "root"; //Database Username
$db_password = ""; //Database Password
$hostname = "localhost"; //mysql Hostname
$db_name = 'blogserba'; //Database Name
###################################################################

//include google api files
require_once '../../src/Google_Client.php';
require_once '../../src/contrib/Google_Oauth2Service.php';

//start session
session_start();

$gClient = new Google_Client();
$gClient->setApplicationName('Login to iamgomedia.co.id');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset'])) 
{
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
}

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) 
{ 
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
	return;
}


if (isset($_SESSION['token'])) 
{ 
	$gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
	  //For logged in user, get details from google using access token
	  $user 				= $google_oauthV2->userinfo->get();
	  $user_id 				= $user['id'];
	  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
	  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
	  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
	  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
	  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=50'></div>";
	  $_SESSION['token'] 	= $gClient->getAccessToken();
}
else 
{
	//For Guest user, get google login url
	$authUrl = $gClient->createAuthUrl();
}

//HTML page start
echo '<!DOCTYPE HTML><html>';
echo '<head>';
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
echo '<title>Login with Google</title>';
echo '</head>';
echo '<body>';


if(isset($authUrl)) //user is not logged in, show login button
{
echo '<b>Untuk Menjadi Kontributor Silahkan Login Dari akun Google Anda</b>';
	echo '</br><a class="login" href="'.$authUrl.'"><img src="images/google-login-button.png" /></a>';
} 
else // user logged in 
{
   /* connect to database using mysqli */
	$mysqli = new mysqli($hostname, $db_username, $db_password, $db_name);
	
	if ($mysqli->connect_error) {
		die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
	}
	
	//compare user id in our database
	$user_exist = $mysqli->query("SELECT COUNT(google_id) as usercount FROM users WHERE google_id=$user_id")->fetch_object()->usercount; 
	
	if($user_exist)
	{
		echo 'Welcome back '.$user_name.'!';
	}else{ 
		//user is new
		echo 'Hi '.$user_name.', Thanks for Registering!';
$mysqli->query("INSERT INTO users (google_id, nama_lengkap, username, email, id_session, google_link, google_picture_link) 
		VALUES ($user_id, '$user_name','$email', '$email','$profile_url','$profile_image_url')");
	}

	
	echo '<br /><a href="'.$profile_url.'" target="_blank"><img src="'.$profile_image_url.'?sz=100" /></a>';
	
	
	//list all user details
	echo '<pre>'; 
	echo'<p>user id :'; print_r($user_id);
	echo'<p>Email :'; print_r($email);
	echo'<p>Nama :'; print_r($user_name);
	echo '</pre>';	
}
 
echo '</body></html>';
?>
</div>


