<?php
/**
  * @var \App\View\AppView $this
  */
?>
  <?= $this->Html->css('vendors/switchery/dist/switchery.min');?>

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
	  <div class="x_title">
		<h2><?= $titulo ?><small></small></h2>
		<ul class="nav navbar-right panel_toolbox">
		  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
		  </li>
		  <li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
			<ul class="dropdown-menu" role="menu">
			  <li><a href="#">Settings 1</a>
			  </li>
			  <li><a href="#">Settings 2</a>
			  </li>
			</ul>
		  </li>
		  <li><a class="close-link"><i class="fa fa-close"></i></a>
		  </li>
		</ul>
		<div class="clearfix"></div>
	  </div>
		<div class="x_content">


	<?= $this->Form->create($user,['class'=>'form-horizontal form-label-left']); ?>
	
	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccionar Cliente</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		<?php echo $this->Form->select('cliente_id', $clientes,['class'=>'select2_single form-control','tabindex'=>'-1']);	?>
		</div>
	</div>
	<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Usuario <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
						  <?php	echo $this->Form->control('username',[  'label'=>'','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','required'=>'required','id'=>'first-name']);?>
                        </div>
                      </div>

	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
			<?php echo $this->Form->password('password',['class'=>'form-control','value'=>''] );?>
		  
		</div>
	  </div>
	  
		   <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Confirme Password</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
			
			<?php echo $this->Form->password('password_confirm',['class'=>'form-control','value'=>''] );?>
		  
		</div>
	  </div>  
	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Seleccionar perfil</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		<?php echo $this->Form->select('perfile_id', $perfiles,['class'=>'select2_single form-control','tabindex'=>'-1']);	?>
		</div>
	  </div>	  
	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Super Usuario</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			<label>
			  <?php	echo $this->Form->checkbox('super', ['class'=>'js-switch']);?>
			  
			</label>
		  </div>

		</div>
	  </div>
	  <div class="ln_solid"></div>
	  <div class="form-group">
		<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
	
				  	<?php	
				echo $this->Form->button('Cancel', array(
			'type' => 'button',
			   'class' => 'btn btn-danger',
			   'onclick' => 'location.href=\'/cs/users/index_admin\''
			));
				?>
						

		
		<?php	echo $this->Form->button('Reset', array(
				'type'=>'reset',
				'class' => 'btn btn-primary',
				'div' => false
				)); ?>
		  <?= $this->Form->button(__('Guardar'),['type'=>'submit','class'=>'btn btn-success']) ?>	  
		</div>
	  </div>
	<?= $this->Form->end() ?>

			</div> 
</div>		 
</div>	
<?= $this->Html->script('vendors/switchery/dist/switchery.min');?>