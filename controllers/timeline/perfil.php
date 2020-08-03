<?php

if($_SESSION[user_id] == null){
	echo "<script>window.location='{$site[url]}signin'</script>";
  exit;
}

$posts = Posts::get($_SESSION[user_id]);

if($_FILES){

  $image = $_FILES[imagem];
  
  if($image != null){
    $extension = explode(".",$image[name]);
    $extension = $extension[1];

    if($extension == "jpg" || $extension == "jpeg" || $extension == "png"){
      $name = md5($image[name] . time()) ."." .$extension;
      $dir = '../../uploads/';
      $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
    
      $move = move_uploaded_file($image[tmp_name],$upload_dir.$name);
      
      if($move){
        User::upload($_SESSION[user_id],$name);
      }else{
        echo "vixi";
      }

    }else{
      echo "erro";
    }
  }
 

}
?>