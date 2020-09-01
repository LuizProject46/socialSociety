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

public static function noti($id){

  $db = Db::connect();
    $res["rows"] = [];
    $data = [];
   
    $sql = $db->query("SELECT * FROM notifications WHERE id_to ='$id' ORDER BY id DESC");
    $noti = $sql->fetchAll(PDO::FETCH_ASSOC);
   
    foreach($noti as $n){
     $aux = [];
      
      $aux[time] = date("H:i",strtotime($n[created_at]));
      $aux[type] = $n[type];
      $aux[id_noti]= $n[id];
      $aux[view] =$n[view];
      $sql = $db->query("SELECT * FROM user WHERE id='$n[id_from]'");
      $user = $sql->fetchAll(PDO::FETCH_ASSOC);
      foreach($user as $u){
       
       
        $aux[name] = $u[name];
        $aux[photo]= $u[photo];
        $aux[id_user] = $u[id];
       
      }
     
      $data[] = $aux;
    }

   
    
    
   $res["rows"][] = $data;
    
   if(count($data) == 0){
      return 0;
   }else{
      return $res;
   }
   
}

public static function notiView($id){
  $db = Db::connect();
 
 
   $db->query("UPDATE notifications SET view=1 WHERE id_to='$id'");

  return 1;
  
}

public static function delete($id){
  $db = Db::connect();
 
   $db->exec("DELETE  FROM posts WHERE id_user='$id'");
   $db->exec("DELETE  FROM user WHERE id='$id'");
    
   $_SESSION[user_id] = null;
   $_SESSION[user_name] = null;
   $_SESSION[user_photo] = null;
   $_SESSION[user_email] = null;
   $_SESSION[user_bio] = null;

  return 1;
  
}


public static function firstTime($id){

  $db = Db::connect();
   
   
    $sql = $db->query("SELECT first_time FROM user WHERE id ='$id'");
    $res = $sql->fetchAll(PDO::FETCH_ASSOC)[0];
    foreach($res as $r){
      $result = $r;
    }
    return $result;
}

public static function follow($id_user,$id_from){
  $db = Db::connect();

  $db->exec("INSERT INTO followers(id_following,id_user) VALUES('$id_from','$id_user')");
  $db->exec(" UPDATE user SET followers= followers + 1 WHERE id='$id_user'");
  return 1;

}

public static function verifyFollow($id_from){
  $db = Db::connect();
   
   
  $sql = $db->query("SELECT * FROM followers WHERE id_following='$id_from'");
  $res = $sql->fetchAll(PDO::FETCH_ASSOC)[0];

  return $res;

} 
}

?>