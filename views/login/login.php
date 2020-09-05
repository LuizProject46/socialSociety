<!DOCTYPE html>
<html>
<head>
	<title>SocialSociety - Login</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
			<input type="text" name="email" placeholder="Email">
			<input type="password" name="password" placeholder="Senha">
			<button class="btn-login"><i class="fa fa-sign-in"></i> Entrar</button>
      <a style="text-align: center;" href="signup">Cadastre-se já!</a>
      <!-- <a style="text-align: center;
    color: #800080b8;
    font-weight: 500;
    font-size: 14px;
    text-decoration: underline;"href="#"  data-toggle="modal" data-target="#exampleModal">Esqueci minha senha</a>
		 -->
     
		</div >
	</div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recuperar senha</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
      <div class="modal-body">
      <div class="alert alert-warning">
        <p><b>Atenção :</b> você só receberá o email de recuperação apenas se estiver cadastrado com o mesmo.</p>
      </div>
        <input style=" margin-top: 20px;
  border: 1px solid #ddd;
  height: auto;
  padding: 0 20px;
  font-size: 15px;
  border-radius: 7px;
  width: 100%;
  margin-bottom: 10px;
  color: #666" type="email" name="email" placeholder="Digite seu email">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" name="btn-send"style="background: purple;
    border: none;" class="btn btn-primary">Enviar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 
<script type="text/javascript" src="../../assets/js/qp/login.js"></script>
</body>
</html>