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
    <div class="col-12">
      <div class="card">
        <div style="display: flex;justify-content: center;" class="card-body">
        
          <?foreach($user as $u):?>
            <div style="text-align:center;">
                <img style="border: 2px solid purple;
                border-radius: 50%;
                width: 220px;
                height: 220px;"src="<?=($u[photo] ? '../../uploads/'.$u[photo] : '../../assets/img/user.png')?>"/>
                 
                 <h2 class="card-title"><?=$u[name]?></h2>
                 <div style="width: 450px;word-break: break-all;">
                    <h4 class="category"><?=$u[bio]?></h4>
                 </div>
                 
                 <h4 class="category"><i style="color:purple;" class="fa fa-envelope"></i> <?=$u[email]?></h4>
            </div>
           
          <?endforeach;?>
          
        
        
        </div>
      
      </div>
    
    
    </div>
  
  </div>
  <?if(count($posts) == 0):?>
    <div class="alert alert-warning" role="alert">
      <h4><i style="color:#fff;" class="fa fa-info-circle"></i> <?=$user[0][name]?> não possui nenhuma publicação no momento...</h4>
    </div>
  <?else:?>
    <div class="row">
    <div class="col-12">

      <div class="card">
        
        <div class="card-body">
          <h3 style="text-align:center;font-weight:bold;">Linha do tempo</h3>
            <?foreach($posts as $p):?>
            <div style="" class="card posts">
              <div class="card-header card-header-icon card-header-primary">
                <!-- <label style="float: right;"class="btn btn-danger   btn-fab btn-round btn_delete" data-toggle="tooltip" data-placement="top" title="Excluir postagem"><i style="padding: 3px 13px 8px;"  class="fa fa-trash"></i></label> -->
               
                <div style="border-radius: 50%" class="card-icon">
                  <img class="photo-post" src="<?=($user[0][photo] ? "../../uploads/".$user[0][photo] : '../../assets/img/user.png') ?>">

                </div>

              </div>
              <h3 class="card-title post-name"> <?=$user[0][name]?></h3>

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


          
        </div>
        
      </div>

    </div>
  </div>
  <?endif;?>
  
</div>