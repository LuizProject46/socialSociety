<style>
.photo_perfil {
  border: 2px solid #50d382;
  border-radius: 50%;

}

.photo-post {
  width: 55px;
  height: 55px;
  border-radius: 50%;
  margin: -9px;
}

.post-name {
  margin: 26px;
  /*margin-top: -6px;*/
  font-weight: bold;
}
</style>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">

            <div class="col-md-6">
              <div class="img-perfil">
                <img style="position:relative;width:196px;height:196px;" class="photo_perfil" src="<?=($_SESSION[user_photo] ? "../../uploads/".$_SESSION[user_photo] : '../../assets/img/user.png') ?>" />
                <form>
                <button type="button" data-toggle="modal" data-target="#exampleModal" style="margin-top: -53px;position: absolute;" class="btn btn-primary btn-round btn-fab"><i class="fa fa-camera "></i></button>
                </form>
              </div>


            </div>
            <div class="col-md-6">  
              <div class="form-group">
                  <label for="exampleFormControlInput1">Nome</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ex: Gustavo" value='<?=$_SESSION[user_name]?>'>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="name@example.com" value="<?=$_SESSION[user_email]?>">
              </div>
        
              
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Bio</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$_SESSION[user_bio]?></textarea>
              </div>
            
              <button type="button" class="btn btn-primary btn-update">Atualizar</button>
            </div>


          </div>


        </div>
      </div>

    </div>

  </div>
  <?if(count($posts) == 0):?>
    <div class="alert alert-warning" role="alert">
      <h4><i style="color:#fff;" class="fa fa-info-circle"></i> Você não possui nenhuma publicação no momento...</h4>
    </div>
  <?else:?>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          
            <h3 style="text-align:center;font-weight:bold;"><i></i> Meus posts</h3>
            <?foreach($posts as $p):?>
            <div style="" class="card posts">
              <div class="card-header card-header-icon card-header-primary">
                <!-- <label style="float: right;"class="btn btn-danger   btn-fab btn-round btn_delete" data-toggle="tooltip" data-placement="top" title="Excluir postagem"><i style="padding: 3px 13px 8px;"  class="fa fa-trash"></i></label> -->
                <a style="float: right;font-size:18px;color: #666;" class="nav-link btn_op" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#"><i
                    class="fa fa-ellipsis-h"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <!-- <a class="dropdown-item " id="<?=$p[id]?>"  href="#"><i style="font-size:20px;padding:1px;" class="fa fa-pencil"></i>
                    Editar</a> -->
                  <a class="dropdown-item btn_delete" id="<?=$p[id]?>" href="#"><i style="font-size:20px;padding:1px;" class="fa fa-trash"
                      title="Excluir postagem"></i> Excluir</a>
                </div>
                <div style="border-radius: 50%" class="card-icon">
                  <img class="photo-post" src="<?=($_SESSION[user_photo] ? "../../uploads/".$_SESSION[user_photo] : '../../assets/img/user.png') ?>">

                </div>

              </div>
              <h3 class="card-title post-name"> <?=$_SESSION[user_name]?></h3>

              <div class="card-body post-text">
                  <?=$p[description]?>
              
              </div>
              <div class="card-footer">
                <div class="stats">
                  <button class="btn btn-primary btn-fab btn-fab-mini btn-round btn_like">
                    <i class="fa fa-heart"></i>
                  </button>
                  <label class="count_like" style="font-size:18px;"><?=$p[likes]?></label>
                </div>
              </div>

          

            </div>
            <?endforeach;?>
            <?endif;?>
        </div>

      </div>

    </div>
  </div>


  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Escolha sua foto de perfil</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          
            <input name='imagem'type="file" class="btn "/>
            
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input  type="submit" class="btn btn-primary" value="Salvar">
        </div>
      </form>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="../../assets/js/qp/perfil.js"></script>