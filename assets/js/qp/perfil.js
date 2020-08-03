$(document).ready(function (){

  $(".btn_delete").click(function (){
    var id = $(this).attr("id")
    
    $.ajax({
      url: (window.url+"controllers/api"),
      type: "POST",
      data:{
        action: "delete_post",
        postId: id,
        id:window.user_id

      },
      success: function (data){
      
        swal({title:"Sucesso!",text:"Publicação excluída com sucesso.",type: "success"}).then(()=>{
          window.location.href = window.url + "perfil"
        })
      },
      error: function (data){
        swal({title:"Erro!",text:"Algum erro ocorreu...Tente novamente mais tarde.",type: "error"})
      }
    })
    
  
  
  
  })

  $(".btn-update").click(function (){
    var name = $("#exampleFormControlInput1").val()
    var email = $("#exampleFormControlInput2").val()
    var bio = $("#exampleFormControlTextarea1").val()
    console.log(email)
    if(name == "" || email == ""){
      swal({title:"Ops!",text:"Os campos email e nome não pode ser vazios ",type: "warning"})
    }else{
      $.ajax({
        url: (window.url+"controllers/api"),
        type: "POST",
        data:{
          action: "update_perfil",
          name: name,
          email: email,
          bio: bio,
          id:window.user_id
    
        },
        success: function (data){
        
          swal({title:"Sucesso!",text:"Informações editadas com sucesso. ",type: "success"}).then(()=>{
            window.location.href = window.url + "perfil"
          })
        },
        error: function (data){
          swal({title:"Erro!",text:"Algum erro ocorreu...Tente novamente mais tarde.",type: "error"})
        }
      })
    
    }
  
  
  })



})