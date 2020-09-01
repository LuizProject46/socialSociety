<!DOCTYPE html>
<html>
<head>
	
	<title>SocialSociety</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

  <link rel="shortcut icon" href="../assets/img/logo.ico" />
	
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css"/>
  <link rel="stylesheet" href="../assets/css/qp/home.css"/>
  <link rel="stylesheet" href="../assets/css/qp/styleVictory.css"/>
  <link rel="stylesheet" href="../node_modules/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../node_modules/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="../node_modules/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.min.css?v=2.1.2" type="text/css" rel="stylesheet" />
<style>

</style>
</head>
<script>
  window.url = "<?=$site[url]?>"
 window.user_id = "<?=$_SESSION[user_id]?>"
 window.user_name = "<?=$_SESSION[user_name]?>";
 window.user_photo = "<?=$_SESSION[user_photo]?>"
  </script>
<body>

<!-- <ul class="list-group list-peoples ul-search">

</ul>

<ul  class="list-group list-group-noti ul-noti" >

</ul> -->
	<!-- <div class="card card-nav-tabs card-plain">
    <div class="card-header" style="background-color:#00e68a"> -->
        <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
        <!-- <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
                <ul class="nav nav-tabs" data-tabs="tabs">
                	 <li class="nav-item">
                        <a style="font-size: 18px;"class="nav-link " href="<?=$site[url]?>timeline" ><i class="fa fa-comments-o"></i> <b>SocialSociety</b></a>
                    </li>
                   <li style="margin:auto;" class="nav-item">
                      <input class="input-search" placeholder="Pesquisar usuários"/>
                   </li>
                    
                   

                    <li class="nav-item nav-info">
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

                    MOBILE
                    <li class="nav-info-mobile">
                    
                   
                      <div style="padding-top:10px;" class="dropdown">
                    
                      <a style="font-size: 24px;color:white;font-weight:bold;padding-top:3px;"class=" " id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?=$site[url]?>timeline" ><i class="fa fa-bars"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <a class="dropdown-item" href="<?=$site[url]?>perfil"><i style="font-size:20px;padding:4px;"class="fa fa-cog"></i> Perfil</a>
                          <a class="dropdown-item" href="<?=$site[url]?>logout"><i style="font-size:20px;padding:4px;"class="fa fa-sign-out"></i> Sair</a>
                          
                        </div>
                      </div>
                    </li>
                   
                </ul>
            </div>
        </div>
    </div> -->

  <!-- </div> -->

  <nav  class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center nav-item d-flex align-items-center  justify-content-center">
        <ul class="navbar-nav">
          <li class="nav-item dropdown d-none d-lg-flex">
          <a class="nav-link nav-btn " href="/" style="color:white;"><i class="fa fa-comments-o"></i>SocialSociety</a>
          </li>
        </ul>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        
        <ul class="navbar-nav navbar-nav-right">
         
          <li class="nav-item dropdown">
            <a class="nav-link  btn-noti count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-bell-o mx-0"></i>
              <span style="position: absolute;
            margin-top: -10px;" class="count-noti badge badge-danger"></span>
            </a>
            <div style="overflow-y: auto;
    max-height: 308px;"class="dropdown-menu dropdown-menu-right notification-list navbar-dropdown preview-list " aria-labelledby="notificationDropdown">
                  <h4 class="p-3 mr-2 font-weight-normal float-left ">Notificações
                  </h4>
                  <div class="noti-div">
                  </div>
      
            </div>
          </li>
          <li class="nav-item dropdown">
    
          <a style="font-size: 18px;color:white;font-weight:bold;padding-top:3px;"class=" dropdown-toggle" id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="<?=$site[url]?>timeline" ><img style="width:30px;height:30px;border-radius:50%;" src="<?=($_SESSION[user_photo] ? '../../uploads/'. $_SESSION[user_photo] : '../../assets/img/user.png')?>"/> <?=$username?></a>
          <div style="overflow-y: auto;
    max-height: 150px;"class="dropdown-menu dropdown-menu-right  navbar-dropdown preview-list " aria-labelledby="notificationDropdown">
                 <a class="dropdown-item" href="<?=$site[url]?>perfil"><i style="font-size:20px;padding:4px;"class="fa fa-cog"></i> Perfil</a>
                        <a class="dropdown-item" href="<?=$site[url]?>logout"><i style="font-size:20px;padding:4px;"class="fa fa-sign-out"></i> Sair</a> 
                  
      
            </div>
          </li>
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right  d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
        
      </div>
    </nav>

   