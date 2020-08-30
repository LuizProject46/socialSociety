<?php
if($_SESSION[user_id] == null){
	echo "<script>window.location='{$site[url]}signin'</script>";
  exit;
}

$verify[first_time] = User::firstTime($_SESSION[user_id]);


?>