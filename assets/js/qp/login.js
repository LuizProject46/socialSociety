


$(document).ready(function (){

$(".btn-login").click(function(){
  
  var email = $("input[name=email]").val();
  var password = $("input[name=password]").val();
  if( email == '' || password == ''){

    swal({title:"Ops!",text:"É necessário preencher todos os campos",type: "error"})
  }else{
    $.ajax({
      url: (window.url +"controllers/api"),
      type: "POST",
      dataType: "json",
      data : {
        
        email: email,
        password: password,
        action: "login"
      },
      success: function (data){
        console.log(data)
        if(data){
          swal({title:"Sucesso!",text:"Logado com sucesso!",type: "success"}).then(()=>{
            window.location.href = window.url +"timeline"
          })
        }
      },
  
      error: function(){
        swal({title:"Ops!",text:"Email ou senha incorretos.",type: "error"}).then(()=>{
          window.location.href = window.url +"signin"
      })
      }
    })
  }
  
})

$(".btn-signup").click(function(){
  var name = $("input[name=name]").val();
  var email = $("input[name=email]").val();
  var password = $("input[name=password]").val();

  if(name == "" || email == '' || password == ''){

      swal({title:"Ops!",text:"É necessário preencher todos os campos",type: "error"})
  }else{
    $.ajax({
      url: (window.url +"controllers/api"),
      type: "POST",
      dataType: "json",
      data : {
        name: name,
        email: email,
        password: password,
        action: "register"
      },
      success: function (data){
        console.log(data)
        if(data){
          swal({title:"Sucesso!",text:"Cadastro feito com sucesso.",type: "success"}).then(()=>{
            window.location.href = window.url +"signin"
          })
        }
      },
  
      error: function(){
        swal({title:"Ops!",text:"Já existe um conta com esse email :(",type: "error"}).then(()=>{
          window.location.href = window.url +"signup"
      })
      }
    })
  }

})



})