<?php
/**
  * @var \App\View\AppView $this
  */
?>
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
<?= $this->Form->create($equivalencia,['class'=>'form-horizontal form-label-left']) ?>  
    <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Identificacion</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			<label>
			  <?php	echo $this->Form->control('identificacion',  ['class'=>'form-control','label'=>'']);?>
			  
			</label>
		  </div>

		</div>
	  </div>
	   <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Volumen</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			<label>
			  <?php	echo $this->Form->control('volumen',  ['class'=>'form-control','label'=>'']);?>
			  
			</label>
		  </div>

		</div>
	  </div>

	   <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Conversion</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			<label>
			  <?php	echo $this->Form->control('conversion',  ['class'=>'form-control','label'=>'']);?>
			  
			</label>
		  </div>

		</div>
	  </div>

	  <div class="ln_solid"></div>
	  <div class="form-group">
		<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
		  <button type="button" class="btn btn-primary">Cancel</button>
		  <button type="reset" class="btn btn-primary">Reset</button>
		
		  <?= $this->Form->button(__('Guardar'),['type'=>'submit','class'=>'btn btn-success']) ?>	  
		</div>
	  </div>
	<?= $this->Form->end() ?>
			</div> 
</div>		 
</div>