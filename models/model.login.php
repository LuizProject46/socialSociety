<?php

Class Login {

	public static function logout() {
		global $site;

		$_SESSION[user_id] = null;
    $_SESSION[user_name] = null;
    $_SESSION[user_email] = null;

    echo "<script>window.location='{$site[url]}'</script>";
    exit;

	}


	public static function register($name,$email, $password) {
   
     $db = Db::connect();
     $sql   = $db->query("SELECT email FROM user WHERE email= '$email' ");
     $user  = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
    if(!$user){
       $db->exec("INSERT INTO user(name,email,password) VALUES('".addslashes($name)."','".addslashes($email)."','".addslashes(sha1($password))."')");

      return true;
    }else{

      return false;
    }
    
	}

	public static function signin($email,$password) {
    
    $db = Db::connect();

   $pass = sha1($password);
    $sql   = $db->query("SELECT * FROM user WHERE email= '$email' AND password='$pass'");
    $user  = $sql->fetchAll(PDO::FETCH_ASSOC)[0];

    if($user){

      $_SESSION[user_id] = $user[id];
      $_SESSION[user_name] = $user[name];
      $_SESSION[user_email] = $user[email];
      $_SESSION[user_photo] = $user[photo];
      $_SESSION[user_bio] = $user[bio];

      return true;
      
    }else{
      $_SESSION[user_id] = null;
      $_SESSION[user_name] = null;
      $_SESSION[user_email] = null;
      $_SESSION[user_photo] = null;
      $_SESSION[user_bio] = null;
      return false;
    }

		

	}
}

?>