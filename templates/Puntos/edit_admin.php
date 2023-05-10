<?php
/**
  * @var \App\View\AppView $this
  */
?>

<?= $this->Html->css('vendors/bootstrap-daterangepicker/daterangepicker');?>
    <!-- bootstrap-datetimepicker -->
  <?= $this->Html->css('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker');?>
<STYLE type="text/css">
  label{
    display: inline;
  }
</STYLE>

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

<?= $this->Form->create($punto,['class'=>'form-horizontal form-label-left']) ?>
	  
	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<?php echo $cliente->codigo.' - '.$cliente->razon_social;?>
		</div>
	  </div>
   

	   <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			<label>
			  <?php	echo $this->Form->control('cantidad_disponible',  ['class'=>'form-control','label'=>'']);?>
			  
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
			   'onclick' => 'location.href=\'/cs/puntos/index_admin\''
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
<?= $this->Html->css('vendors/switchery/dist/switchery.min');?>
<?= $this->Html->script('vendors/switchery/dist/switchery.min');?>