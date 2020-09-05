


$(document).ready(function(){
 
  $(".btn_publish").click(function(){
    var text = $(".input_post").val()
    if(text == ''){
      swal({title:"Ops!",text:"É necessário escrever algo.",type: "error"})
    }else{
      $.ajax({
        url: (window.url+"controllers/api"),
        type: "POST",
        data:{
          action: "publish_post",
          text: text,
          id:window.user_id
  
        },
        success: function (data){
          $(".input_post").prop("value", "")
          swal({title:"Sucesso!",text:"Publicado com sucesso, logo o pessoal verá sua publicação.",type: "success"})
        },
        error: function (data){
          swal({title:"Erro!",text:"Algum erro ocorreu...Tente novamente mais tarde.",type: "error"})
        }
      })
      
    }
 

  })

  $(document).on('keyup',".input-search",function(){

      var text = $(this).val()

      if(text != ""){
        $.ajax({
          url: (window.url+"controllers/api"),
          type: "POST",
          data:{
            text:text,
            action: "search_user"
          },
          // beforeSend: function(){
          //   html = `<li class="list-group-item list-people">
          //   <div class="row">
          //     Carregado <i class="fa fa-spinner"></i>
          //   </div>
          // </li>`
          // $(".list-group").html(html)
          // },

          success: function (data){
            var html = ''
             console.log(data)
            if(data.length > 0){
              
              $.each(data,function(key,value){
                
                var photo = ''
                
                var perfil = ""
                if(!value.photo){
                  photo = "../assets/img/user.png"
                }else{
                  photo = "../uploads/"+value.photo
                }
                if(value.id == user_id){
                  perfil = "perfil"
                }else{
                  perfil = "user/"+value.id
                }
                var urlLocal = `${window.location}`
                if(urlLocal.indexOf("/user/") != -1){
                 perfil = value.id
                }
               
                
                html += `<li id='${value.id}' class="list-group-item list-people">
                  <div class="row">
                    <div class="col-md-2">
                    <a href="${perfil}"><img class="list-people-img"src="${photo}"></a>
                    </div>
                    <div style='margin: 12px;' class="col-md-9">
                    <a href="${perfil}"><h5>${value.name}</h5></a>
                    </div>
                  </div>
                </li><hr>`
               
                $(".div-people").show()
                $(".div-people").html(html)
                
              })
            

               
            }else{
            
              html = `<li class="list-group-item list-people">
              <div class="row">
                <p>Nenhum resultado...</p>
              </div>
            </li>`
            $(".div-people").show()
            $(".div-people").html(html)
            }
           
          }
        })
      }else{
        $(".div-people").html("")
        $(".div-people").hide()
      }
  })

  $(document).on('click',".btn_delete",function (){
    var id = $(this).attr("data-posts")
   
    $.ajax({
      url: (window.url+"controllers/api"),
      type: "POST",
      data:{
        action: "delete_post",
        postId: id,
        id:window.user_id

      },
      success: function (data){
      
        swal({title:"Sucesso!",text:"Publicação excluída com sucesso.",type: "success"})
      },
      error: function (data){
        swal({title:"Erro!",text:"Algum erro ocorreu...Tente novamente mais tarde.",type: "error"})
      }
    })
    
  
  
  
  })

  $(document).on('click',".btn_like",function(){
    var id = $(this).attr("data-like")
    var idTo = $(this).attr("data-user")
    if(idTo == window.user_id){
      return false;
    }
    $.ajax({
      url: (window.url+"controllers/api"),
      type: "POST",
      data:{
        action: "like_post",
        
        id:id,
        idFrom: window.user_id,
        idTo: idTo 

      },
      success: function (data){
       $("#count_like_"+id).html(data)
      
      },
      error: function (data){
        swal({title:"Erro!",text:"Algum erro ocorreu...Tente novamente mais tarde.",type: "error"})
      }
    })


  })
})

function update_noti(){
  $.ajax({
    url: (window.url+"controllers/api"),
    type: "POST",
    data:{
      action: "get_noti",
      id: window.user_id
    },
    success: function (data){
     
      if(data != 0){
        var notifications = data.rows[0]
        var qtd_noti = data.rows[0].length
        var html = ""
        var cont = 0
      
      
        $.each(notifications,function(key,value){
          
         var photo = value.photo == undefined ? "../assets/img/user.png" : "../uploads/"+value.photo
         var msg = value.type == "like_post" ? "curtiu a sua publicação.": "curtiu sua foto."
          if(value.view == 0){
            cont++
            $(".count-noti").html(cont)
            
          }
         
         
          url_perfil = value.id_user  ? url + "user/"+value.id_user : ''
        html += `
        
        <div class="dropdown-divider"></div>
        <a  href="${url_perfil}" class="dropdown-item noti-item preview-item">
          <div  class="preview-thumbnail">
            <div style="margin-top:-40px;"class="preview-icon ">
              <img class="list-people-img"src="${photo}">
            </div>
          </div>
          <div class="preview-item-content">
            <h6 class="preview-subject font-weight-medium"><strong>${value.name}</strong></h6>
            <p class="font-weight-light small-text">
            ${msg}
            </p>
            <div class="row">
            <div class="col d-flex justify-content-end">
              <label> ${value.time}</label>
            </div>
          </div>
          </div>
        </a>`
  
        $(".noti-div").html(html)

       
        })
      }else{
        html = `
      
        <div class="dropdown-divider"></div>
        <a   class="dropdown-item preview-item">
          <div class="">Nenhuma notificação no momento....</div>
          </div>
        </a>`

      $(".noti-div").html(html)
      }
     
     
    }
    
  })
}

$(document).on('click','.btn-noti',function(){
 
  if(!$(".list-group-noti").is(":visible")){
      $(".list-group-noti").toggle()
  }else{
    $(".list-group-noti").hide()
  }
  

  $.ajax({
    url: (window.url+"controllers/api"),
    type: "POST",
    data:{
      action: "view_noti",
      id: window.user_id
    },
    success: function (data){
      $(".count-noti").html('')
    }
  })
})
function update_posts(){

  $.ajax({
    url: (window.url+"controllers/api"),
    type: "POST",
    data:{
      action: "get_post",
    },
    success: function (data){
     
      
     if(data){
      var post = data.rows
      $(".posts-clone").html("");
     
      $.each(post,function(key,value){
        
      if(value.id_following.includes(window.user_id) || window.user_id == value.id_user){
        var clone = $(".posts").clone();
        clone.attr("id", value.id)
        clone.removeClass("posts")
    
        if(value.id_user == window.user_id){
          clone.find(".btn_delete").attr("data-posts",value.id)
          clone.find(".perfil-link").attr("href","/perfil")

        }else{
          clone.find(".btn_op").hide()
          clone.find(".perfil-link").attr("href","/user/"+value.id_user)

        }
       
        clone.find(".post-name").html(value.name)
        clone.find(".post-text").html(value.text)
        if(value.user_photo){
          clone.find(".photo-post").attr("src","../../uploads/"+value.user_photo)
        }else{
          clone.find(".photo-post").attr("src","../../assets/img/user.png")
        }
        
        
        clone.find(".btn_like").attr("data-like",value.id)
        clone.find(".btn_like").attr("data-user",value.id_user)
        clone.find(".count_like").attr("id","count_like_"+value.id)
        clone.find(".count_like").html(`<b>${value.likes}</b>`)
        clone.show();
        //clone.attr("style","display:flex");
          
        $(".posts-clone").append(clone)
      }else{
        $(".posts-clone").html("<div class='alert text-center'>Nenhuma publicação do momento....</div>");
        return false;
      }
        

      })

    }else{
      $(".posts-clone").html("<div class='alert text-center'>Nenhuma publicação do momento....</div>");
    }

    }
  })

$(document).on("click",".btn-delete-account",function(){
  swal({
    title:"Atenção!",
    text: "Você tem certeza que quer excluir a sua conta? Todos seus dados serão removidos!",
    type: "warning",
    confirmButtonText:
    'Ok',
    showCancelButton: true,
    showCloseButton: true,
    
  }).then(()=>{
    $.ajax({
      url: (window.url+"controllers/api"),
    type: "POST",
    data:{
      action: "delete_account",
      id: window.user_id
    },
    success: function (data){
      swal({
        title:"Sucesso!",
        text: "Conta deletada com sucess. Obrigado por ter feito parte da nossa comunidade, volte sempre :)",
        type: "success",
        confirmButtonText:
        'Ok',
      
        
      }).then(()=>{
        window.location.href = url
      })
    },
    error: function (data){
      swal("Ops", "Houve algum erro, tente novamente mais tarde!","error")
    }
    })
  })
})
$('.chat-button').click(function(e){
  


  if( $(".chat-card").is(":visible")){
     $(".chat-card").hide()
    
      $(this).html('<i style="color:white;" class="fa fa-times"></i> Fechar</a>').fadeIn()
    
   }else {
     $(".chat-card").toggle()
  //   
      $(this).html('<i style="color:white;" class="fa fa-comments-o"></i> Chat</a>').fadeIn()
  }
 
})
}

$(document).on("click",".btn-follow",function(){
  id_user = $(this).attr("data-id")
  text = $(this).html()
  console.log(text)
  // if(text != '<i class="fa fa-check"></i> Seguindo'){
    $.post(window.url + "controllers/api",{action: "follow",id_user: id_user,id_from: window.user_id}).done(function (data){
    
      $(".btn-follow").removeClass("btn-primary")
      $(".btn-follow").addClass("btn-success")
      $(".btn-follow").css("background-color"," #00e68a")
     
      $(".btn-follow").html("<i class='fa fa-check'></i> Seguindo")
    })
  //}
 

})


update_posts()
update_noti()
setInterval(()=>{
update_posts()
},10000)

setInterval(()=>{
  update_noti()
  },10000)

// Execute a function when the user releases a key on the keyboard
