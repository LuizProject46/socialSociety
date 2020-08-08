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

                $(".list-group").html(html)
              })
            

               
            }else{
             
              html = `<li class="list-group-item list-people">
              <div class="row">
                Nenhum resultado...
              </div>
            </li>`
            $(".list-group").html(html)
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
      console.log(data.length)
      $(".noti-count").html(data.length)
    }
    
  })
}

$(document).on('click','.btn-noti',function(){
  $(".noti-count").html('')
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
  },60000)

// Execute a function when the user releases a key on the keyboard
