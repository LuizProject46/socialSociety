<?php
session_start();
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

error_reporting(0);

# Start var: $config
if(getenv('APP_ENV') == "develop") {

  $site[url] = "http://local.socialsociety.com/";

  ini_set('display_errors','on');
  error_reporting( E_ALL & ~E_WARNING & ~E_NOTICE & ~E_DEPRECATED);
}
else{
	$site[url] = "http://socialsociety.com.br";
}



$login = new Login();


if($_SESSION[user_id] && strpos($_GET[qpage],"logout") !== false) {
	
  $login->logout();

  
  
   
}

if($_SESSION[user_id] && strpos($_GET[qpage],"login") !== false) {
	
  echo "<script>window.location='{$site[url]}timeline'</script>";
  exit;
}


$username = explode(" ",$_SESSION[user_name]);

$username = $username[0];


?>