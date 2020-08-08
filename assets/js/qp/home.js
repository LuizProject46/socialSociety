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
            
             
            if(data.length > 0){
              
              $.each(data,function(key,value){
                
                var photo = ''
                var html = ''
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
                </li>`

                $(".list-peoples").html(html)
              })
            

               
            }else{
             
              html = `<li class="list-group-item list-people">
              <div class="row">
                Nenhum resultado...
              </div>
            </li>`
            $(".list-peoples").html(html)
            }
           
          }
        })
      }else{
        $(".list-group").html("")
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
     console.log(data)
      if(data != 0){
        var notifications = data.rows[0]
        var qtd_noti = data.rows[0].length
        var html = ""
        var cont = 0
      
      
        $.each(notifications,function(key,value){
          
         var photo = value.photo == "" ? "../assets/img/user.png" : "../uploads/"+value.photo
         var msg = value.type == "like_post" ? "curtiu a sua publicação.": "curtiu sua foto."
          if(value.view == 0){
            cont++
            $(".noti-count").html(cont)
            
          }
          html += `<li  class="list-group-item list-noti">
          <div class="row">
            <div class="col-md-2">
            <a href="${url}/user/${value.id_user}"><img class="list-people-img"src="${photo}"></a>
            </div>
            <div style='margin: 12px;' class="col-md-9">
            <label style="color:#333;"><strong>${value.name}</strong> ${msg}</label>
            </div>
          </div>
          <div class="row">
            <div class="col d-flex justify-content-end">
              <label><i class="fa fa-clock-o"></i> ${value.time}</label>
            </div>
          </div>
        
        </li>`
  
        $(".list-group-noti").html(html)

       
        })
      }else{
        html = `<li style="padding: 26px;
        margin: auto;" class="list-group-item list-noti">
        <div class="row">
         
          <p><i class="fa fa-info-circle"></i>  Nenhuma notificação no momento..</p>
          
         
        </div>
      </li>`
      $(".list-group-noti").html(html)
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
      $(".noti-count").html('')
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
      var post = data.rows
      
      $(".posts-clone").html("");
     
      $.each(post,function(key,value){
      
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

        $(".posts-clone").append(clone);

      })



    }
  })


$('.chat-button').click(function(e){
  
 
    e.preventDefault();
    el = $(".chat-card")
    el.toggle()

  if( $(".chat-card").is(":visible")){
  //   $(".chat-card").hide()
    
      $(this).html('<i style="color:white;" class="fa fa-times"></i> Fechar</a>').fadeIn()
    
   }else {
  //   $(".chat-card").show()
  //   
      $(this).html('<i style="color:white;" class="fa fa-comments-o"></i> Chat</a>').fadeIn()
  }
 
})
}

update_posts()
update_noti()
setInterval(()=>{
update_posts()
},10000)

setInterval(()=>{
  update_noti()
  },10000)

// Execute a function when the user releases a key on the keyboard
