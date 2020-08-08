<!DOCTYPE html>
<html>
<head>
	
	<title>Social Society</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<link href="../assets/css/material-dashboard.min.css?v=2.1.2" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css"/>
  <link rel="stylesheet" href="../assets/css/qp/home.css"/>
<style>
.list-people {
  border-bottom: 1px solid #efe7e7;
}
.list-people-img{
  width: 44px;
    height: 44px;
    border: 2px solid purple;
    border-radius: 39px;
    padding-bottom: 0px;

}

</style>
</head>
<script>
  window.url = "<?=$site[url]?>"
 window.user_id = "<?=$_SESSION[user_id]?>"
 window.user_name = "<?=$_SESSION[user_name]?>";
 window.user_photo = "<?=$_SESSION[user_photo]?>"
  </script>
<body>
<ul class="list-group" style="       z-index: 1000;
    position: absolute;
    background: white;
    border-radius: 15px;
    box-shadow: 1px 1px 14px #777777;
    left: 34%;
    top: 10%;
    width: 320px;

">

</ul>
	<div class="card card-nav-tabs card-plain">
    <div class="card-header" style="background-color:#00e68a">
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                	 <li class="nav-item">
                        <a style="font-size: 18px;"class="nav-link " href="<?=$site[url]?>timeline" ><i class="fa fa-comments-o"></i> <b>SocialSociety</b></a>
                    </li>
                   <li style="margin:auto;" class="nav-item">
                      <input class="input-search" placeholder="Pesquisar usuários"/>
                   </li>
                    <!-- <li class="nav-item" style="margin-left:auto;">
                        <a style="font-size: 18px;"class="nav-link " href="<?=$site[url]?>timeline" ><i class="fa fa-comments-o"></i> <b>SocialSociety</b></a>
                    </li> -->
                 
                    <li class="nav-item" style="margin-left:auto;display:flex;align-items: baseline;">
                    <a style="font-size: 22px;color:white;font-weight:bold;padding-top:3px;margin-right:18px;cursor:pointer;"class=" btn-noti"     ><i class="fa fa-bell"></i></a><label style="position: absolute;
    margin-left: 16px;"class="badge badge-danger noti-count"></label>
                    <div style="padding-top:10px;" class="dropdown">
                  
                      <a style="font-size: 18px;color:white;font-weight:bold;padding-top:3px;"class=" dropdown-toggle" id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?=$site[url]?>timeline" ><img style="width:30px;height:30px;border-radius:50%;" src="<?=($_SESSION[user_photo] ? '../../uploads/'. $_SESSION[user_photo] : '../../assets/img/user.png')?>"/> <?=$username?></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?=$site[url]?>perfil"><i style="font-size:20px;padding:4px;"class="fa fa-cog"></i> Perfil</a>
                        <a class="dropdown-item" href="<?=$site[url]?>logout"><i style="font-size:20px;padding:4px;"class="fa fa-sign-out"></i> Sair</a>
                        
                      </div>
                    </div>
                    </li>
                   
                    
                   
                </ul>
            </div>
        </div>
    </div>

  </div>

  