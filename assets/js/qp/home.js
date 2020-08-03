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
    
    $.ajax({
      url: (window.url+"controllers/api"),
      type: "POST",
      data:{
        action: "like_post",
        
        id:id

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
        clone.find(".count_like").attr("id","count_like_"+value.id)
        clone.find(".count_like").html(`<b>${value.likes}</b>`)
        clone.show();
        //clone.attr("style","display:flex");

        $(".posts-clone").append(clone);

      })



    }
  })


$('.chat-button').click(function(){
  
  var close = $(this).attr('data-closed')
console.log(close)
  if(close == 'true'){
    $(".chat-card").show()
    $(this).html('<i style="color:white;" class="fa fa-times"></i> Fechar</a>').show()
    $(this).attr("data-closed",false)
  }else {
    $(".chat-card").hide()
    $(this).html('<i style="color:white;" class="fa fa-comments-o"></i> Chat</a>').show()
    $(this).attr("data-closed",true)
  }
 
})
}

update_posts()

setInterval(()=>{
update_posts()
},10000)
