<!DOCTYPE html>
<html>
<head>
	<title>SocialSociety - Signup</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../../assets/css/material-dashboard.min.css?v=2.1.2" type="text/css" rel="stylesheet" />
  
  <!-- <script src="../../node_modules/sweetalert2/dist/sweetalert2.min.css"></script> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css"/>
  <script>
  window.url = "<?=$site[url]?>"
  </script>
	<style type="text/css">
		*{
  			margin : 0;
		  padding: 0;
		  outline: 0;
		  box-sizing: border-box;
		}

		html,body,#root{
		  height: 100%;
		}
		body{
		  background: #f3f3f3;
		}

		body,input,button {
		  font-family: Arial, Helvetica, sans-serif;
		}
		    .login-container{
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
}

.login-container .form{
  width: 100%;
  max-width: 300px;
  display: flex;
  flex-direction: column;
}

.login-container .form input{
  margin-top: 20px;
  border: 1px solid #ddd;
  height: 45px;
  padding: 0 20px;
  font-size: 15px;
  border-radius: 7px;
  margin-bottom: 10px;
  color: #666
}

.login-container .form input:focus{
  box-shadow: 1px 1px 8px #00e68a;
  transition: 0.7s;
}
.login-container input::placeholder{
  color: #999
}
.login-container .form button{
  background-color:   #00e68a;
  border-radius: 5px;
  border: 1px solid #ddd;
  height: 50px;
  font-size: 16px;
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: 0.7s;
}

.login-container .form button:hover{
background: #fff;
border-radius: 5px;
border: 2px solid #0f0f0a;
color: #333;
transition: 0.7s;

}

a{
  text-decoration: none;
  color: #333;
  font-weight: bold;
  margin-top: 10px;
  transition: 0.6s;
}

a:hover{
  color: #666;
  transition: 0.6s;
}



	</style>
	
</head>
<body>
	<div class="login-container">
		<div class="form" >
			<img src="../../assets/img/logo.png"/>
      <input type="text" name="name" placeholder="Nome">
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Senha">
			<button class="btn-signup"><i class="fa fa-sign-in"></i> Cadastrar</button>
			
		</form>
	</div>
  <!-- <script src="../../node_modules/sweetalert2/dist/sweetalert2.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  
<script type="text/javascript" src="../../assets/js/qp/login.js"></script>

</body>
</html>