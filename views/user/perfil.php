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
      <div class="card-body">
        <?foreach($user as $u):?>
									<img style="<?=(!$u[photo] ? 'border: solid 1px #333;' : ''  )?>" src="<?=($u[photo] ? '../../uploads/'.$u[photo] : '../../assets/img/user.png')?>" alt="image" class="img-lg rounded-circle mb-2">
									<h4><?=$u[name]?></h4>
									<p class="text-muted">Entrou em <?=date("d/m/Y",strtotime($u[created_at]))?></p>
									<p class="mt-4 card-text">
                      <?=$u[bio]?>
                  </p>
                 
                  <?if(in_array($u[id],$following)):?>
                    <button data-id="<?=$u[id]?>" style="background-color:#00e68a;" class="btn btn-follow  btn-sm mt-3 mb-4">
                    <i class="fa fa-check"></i> 
                    Seguindo
                    </button>
                  <?else:?>
                    <button data-id="<?=$u[id]?>" class="btn btn-follow btn-primary btn-sm mt-3 mb-4">
                    <i class="fa fa-plus"></i> 
                    Seguir
                  </button>
                   
                  <?endif;?> 
                  
									<div class="border-top pt-3">
										<div class="row">
											<div class="col-4">
												<h6><?=(count($posts) > 0 ? count($posts) : '0')?></h6>
												<p>Posts</p>
											</div>
											<div class="col-4">
												<h6><?=($u[followers] == 0 ? '0' : $u[followers])?></h6>
												<p>Seguidores</p>
											</div>
											<div class="col-4">
												<h6>7896</h6>
												<p>Likes</p>
											</div>
										</div>
									</div>
								</div>
          <?endforeach;?>
      
      
      </div>
    
    
    </div>
  
  </div>
  <?if(count($posts) == 0):?>
    <div class="alert alert-warning" role="alert">
      <h4><i style="color:#fff;" class="fa fa-info-circle"></i> <?=$user[0][name]?> não possui nenhuma publicação no momento...</h4>
    </div>
  <?else:?>
    <div style="margin-top: -42px;" class="row">
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
                  <button data-like="<?=$p[id]?>"data-user="<?=$user[0][id]?>" class="btn btn-primary btn-fab btn-fab-mini btn-round btn_like">
                    <i class="fa fa-heart"></i>
                  </button>
                  <label id="count_like_<?=$p[id]?>"class="count_like" style="font-size:18px;"><?=$p[likes]?></label>
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