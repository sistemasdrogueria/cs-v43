	<?= $this->Form->create('Movimientos',['url'=>['controller'=>'Movimientos','action'=>'index_admin'], 'class'=>'form-horizontal form-label-left']); ?>
                     <!-- div class="form-group">
                        <div class="col-sm-9">
                  
                          <div class="input-group">
							<?= $this->Form->control('termino', ['class'=>'form-control','label'=>'','type'=>'text' ,'placeholder'=>'Buscar... ']); ?>
                         
                            
                          </div>
                        </div>
                      </div -->
                    	<div class="form-group">
						
						<div class="col-md-7 col-sm-7 col-xs-12">
						<?php echo $this->Form->select('termino', $clientes,['class'=>'select2_single form-control','tabindex'=>'-1']);	?>
						</div>
						<div class="col-md-3 col-sm-3 col-xs-12">
						<!--span class="input-group-btn" -->
						<?= $this->Form->button('Buscar',['class'=>'btn btn-primary']); ?>     
                          <!--/span -->
						</div>
					</div>
					
					<?= $this->Form->end() ?>