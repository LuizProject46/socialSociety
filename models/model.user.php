<?php

class User {

	public static function _update($name,$email,$bio,$id){
      $db = Db::connect();

      $res = $db->exec("UPDATE  user SET name='$name' , email='$email' ,  bio = '$bio' WHERE id = '$id'");
      if($res){
        $_SESSION[user_name] = $name;
        $_SESSION[user_email] = $email;
        $_SESSION[user_bio] = $bio;
      }

      return 1;
  }

  public static function upload($id,$path){
    $db = Db::connect();

    $res = $db->exec("UPDATE  user SET photo ='$path'  WHERE id = '$id'");
    if($res){
      $_SESSION[user_photo] = $path;
    }

    return 1;
}

public static function get($id){

  $db = Db::connect();
    
    $sql = $db->query("SELECT * FROM user WHERE id = '$id' ");
    $user = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $user;
}

public static function search($text){

  $db = Db::connect();
    
    $sql = $db->query("SELECT * FROM user WHERE name LIKE '%$text%' ");
    $user = $sql->fetchAll(PDO::FETCH_ASSOC);
 
    
    return $user;
}
}

?>