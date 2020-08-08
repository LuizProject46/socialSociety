<?php
session_start();

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Headers: Authorization, Origin, X-Requested-With, Content-Type, Accept');
header('Content-Type: application/json');



if($_POST[action] == "register"){

  $res = Login::register($_POST[name],$_POST[email],$_POST[password]);

  echo $res;
}

if($_POST[action] == "login"){

 
  $res = Login::signin($_POST[email],$_POST[password]);

  echo $res;
}else if($_POST[action] == "publish_post"){

  $res = Posts::new($_POST[text],$_POST[id]);

  echo $res;

}else if($_POST[action] == "get_post"){
  $res = Posts::getPosts();

  echo json_encode($res);
}else  if($_POST[action] == "delete_post"){

  $res = Posts::delete($_POST[id],$_POST[postId]);

  echo $res;
}else if($_POST[action] == "update_perfil"){
  $res = User::_update($_POST[name],$_POST[email],$_POST[bio],$_POST[id]);

  echo $res;
}else if($_POST[action] == "like_post"){
  
 $res = Posts::like($_POST[id],$_POST[idTo],$_POST[idFrom]);

  echo $res;
}else if($_POST[action] == 'search_user'){

  $res = User::search($_POST[text]);

  echo json_encode($res);
}else if($_POST[action] == 'get_noti'){
  $res = User::noti($_POST[id]);

  echo json_encode($res);
}else if($_POST[action] == "view_noti"){
  User::notiView($_POST[id]);

  echo 1;
}

?>