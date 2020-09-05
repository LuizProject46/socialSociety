<?php
if($_SESSION[user_id] == null){
	echo "<script>window.location='{$site[url]}signin'</script>";
  exit;
}


$user = User::get($_GET[id]);
if(!$user){
  echo "<script>window.location='{$site[url]}timeline'</script>";
  exit;
}
$posts = Posts::get($_GET[id]);

$following = User::verifyFollow($_SESSION[user_id]);



?>