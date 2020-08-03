<?
if($_SESSION[user_id] == null){
	echo "<script>window.location='{$site[url]}signin'</script>";
  exit;
}


$user = User::get($_GET[id]);

$posts = Posts::get($_GET[id]);


?>