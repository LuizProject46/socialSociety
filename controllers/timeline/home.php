<?php
if($_SESSION[user_id] == null){
	echo "<script>window.location='{$site[url]}signin'</script>";
  exit;
}



?>