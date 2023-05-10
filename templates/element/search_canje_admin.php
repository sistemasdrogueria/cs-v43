<?= $this->Form->create('Canjes',['url'=>['controller'=>'Canjes','action'=>'index_admin'], 'class'=>'form-horizontal form-label-left']); ?>
		 <div class="form-group">
			<div class="col-sm-9">
			  <div class="input-group">
				<?= $this->Form->control('termino', ['class'=>'form-control','label'=>'','type'=>'text' ,'placeholder'=>'Buscar... ']); ?>
				<span class="input-group-btn">
				<?= $this->Form->button('Buscar',['class'=>'btn btn-primary']); ?>     
				</span>
			  </div>
			</div>
		  </div>
 <?= $this->Form->end() ?>