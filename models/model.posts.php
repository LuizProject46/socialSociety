<?php
class Posts {

  public static function new($text,$id){
    $db = Db::connect();

    $db->exec("INSERT INTO posts(id_user,description) VALUES('".addslashes($id)."','".addslashes($text)."')");

    return 1;
  }

  public static function getPosts(){
    $db = Db::connect();
    
    $sql = $db->query("SELECT * FROM posts ORDER BY id DESC ");
    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($posts as $p){
      
      $sql2 = $db->query("SELECT * FROM user WHERE id ='$p[id_user]' ");
      $user = $sql2->fetchAll(PDO::FETCH_ASSOC)[0];

      $data[id] = $p[id];
      $data[id_user] = $p[id_user];
      $data[text] = $p[description];
      $data[likes] = $p[likes];
      $data[deslikes] = $p[deslikes];
      $data[date] = $p[created_at];
      $data[name] = $user[name];
      $data[user_photo] = $user[photo];
      $return["rows"][] = $data;

    }
   

   
    return $return;
  }

  public static function get($id){
    $db = Db::connect();
    
    $sql = $db->query("SELECT * FROM posts WHERE id_user = '$id' ORDER BY id DESC ");
    $posts = $sql->fetchAll(PDO::FETCH_ASSOC);

    return $posts;
  }
  public static function delete($id,$postId){
    $db = Db::connect();

    $db->exec("DELETE FROM posts WHERE id='$postId' AND id_user = '$id' ");


    return 1;
  }

  public static function like($id){
    $db = Db::connect();

    $db->exec("UPDATE posts SET likes = likes + 1  WHERE id = '$id'");

    $sql = $db->query("SELECT likes FROM posts WHERE id = '$id' ");
    $posts = $sql->fetchAll(PDO::FETCH_ASSOC)[0];

   
    return $posts[likes];
  }
}

?>