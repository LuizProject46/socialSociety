<link rel="stylesheet" type="text/css" href="../../assets/css/qp/chat.css"/>
<style>

.photo-post{
  width: 55px;
  height: 55px;
  border-radius: 50%;
  margin: -9px;
}
.post-name{
  margin: 26px;
  /*margin-top: -6px;*/
  font-weight: bold;
}
.chat {
 
}
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
}
.chat-card {
  position: fixed;
    top: 14%;
    padding: 10px;
    z-index: 10000000;
    right: 1%;
    color: white;
    height: 357px;
    padding-top: 14px;
    border-radius: 11px;
    max-width: 430px;
    flex: 1;
}
}
}
</style>
<ul class="list-group" style="       z-index: 1000;
    position: absolute;
    background: white;
    border-radius: 15px;
    box-shadow: 1px 1px 14px #777777;
    left: 34%;
    top: 6%;
    width: 320px;

">

</ul>
<div style="margin-top: -54px;"class="row">
    <div style="display:none;" class="card chat-card">
       
        
    <!-- <div class="chat_window"> -->
          <h4 class="card-title">Chat</h4>
          <ul class="messages" id="messagesBox"></ul>
          <div class="bottom_wrapper clearfix">
          <div class="message_input_wrapper">
          <input class="message_input" id="message" placeholder="Type your message here..." />
          </div>
        <div onclick="sendMessage();return false;" class="send_message" onkeypress="sendMessage()">
        <button class="btn btn-primary btn-round  btn-fab"><i class="fa fa-paper-plane"></i></button>
        </div>
      </div>
    <!-- </div> -->
        
    </div>
</div>
<a style=" position: fixed;
  top: 86%;
  /* left: 1%; */
  padding: 10px;
  z-index: 10000000;
  right: 1%;
  color: white;
  width: 100px;
  height: 50px;
  padding-top: 14px;
  border-radius: 160px;" class="chat-button btn btn-primary chat btn-lg"><i style="color:white;" class="fa fa-comments-o"></i> Chat</a>
  <div class="col-12">
    <div style="z-index:1;"class="card">
      <div class="card-header">
        <h4 class="card-title">Publique algo aqui </h4>     
      </div>
      <div class="card-body">
        <div class="form-group form-file-upload form-file-simple">
          <input type="text" class="form-control inputFileVisible input_post"  placeholder="Em que está pensando?">
          <button type="button" class="btn btn-primary btn_publish">Publicar</button>
        </div>
      </div>
      
    </div>
  </div>

  <div style="margin:auto;" class="col-md-10">
    <div class="posts-clone"></div>
    
      <div style="display:none;" class="card posts">
            <div class="card-header card-header-icon card-header-primary">
                <!-- <label style="float: right;"class="btn btn-danger   btn-fab btn-round btn_delete" data-toggle="tooltip" data-placement="top" title="Excluir postagem"><i style="padding: 3px 13px 8px;"  class="fa fa-trash"></i></label> -->
                <a style="float: right;font-size:18px;color: #666;"class="nav-link btn_op" id="dropdownMenuButton"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" ><i class="fa fa-ellipsis-h"></i></a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <!-- <a class="dropdown-item " href="#"><i style="font-size:20px;padding:1px;"class="fa fa-pencil"></i> Editar</a> -->
                        <a class="dropdown-item btn_delete" href="#"><i style="font-size:20px;padding:1px;"class="fa fa-trash" title="Excluir postagem"></i> Excluir</a>
                      </div>
              <div style="border-radius: 50%;cursor:pointer;"class="card-icon">
                <a class="perfil-link"><img class="photo-post"src="../../assets/img/user.png"></a>
              
              </div>
            
            </div>
            <h3  class="card-title post-name"> Luiz</h3>
            
            <div class="card-body post-text">
                
                    The place is close to Barceloneta Beach and bus stop just 2 min by walk and near to "Naviglio" where you can enjoy the main night life in Barcelona...
            </div>
            <div class="card-footer">
              <div class="stats">
              <button class="btn btn-primary btn-fab btn-fab-mini btn-round btn_like">
                <i class="fa fa-heart"></i> 
              </button>
              <label class="count_like" style="font-size:18px;">1</label>
              </div>
            </div>
    
    
     
  </div>
     

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script src="../../assets/js/qp/chat.js"></script>

