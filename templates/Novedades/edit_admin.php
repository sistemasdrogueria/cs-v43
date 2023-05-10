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
		  <li><a class="close-link"><i class="fa fa-close"></i></a>
		  </li>
		</ul>
		<div class="clearfix"></div>
	  </div>
		<div class="x_content">

<?= $this->Form->create($novedade,['url'=>['controller'=>'Novedades','action'=>'edit_admin'],'type' => 'file','class'=>'form-horizontal form-label-left']) ?>

	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" >Titulo</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <?php	echo $this->Form->control('titulo',[  'label'=>'','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','id'=>'first-name']);?>
		</div>
	  </div>
	<div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion</label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	
		<?php echo $this->Form->control('descripcion',['type'=>'textarea','class'=>'form-control', "data-parsley-trigger"=>'keyup','label'=>''
		, 'data-parsley-minlength'=>'20' , 'data-parsley-maxlength'>='5000' , 'data-parsley-validation-threshold'=>'10'] );?>
		  </div>
	  </div>
	  <div class="form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12">Descripcion Completa</label>
	<div class="col-md-9 col-sm-9 col-xs-12">
	
		<?php echo $this->Form->control('descripcion_completa',['type'=>'textarea','class'=>'form-control', "data-parsley-trigger"=>'keyup','label'=>''
		, 'data-parsley-minlength'=>'20' , 'data-parsley-maxlength'>='5000' , 'data-parsley-validation-threshold'=>'10'] );?>
		  </div>
	  </div>
	  
	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $this->Form->control('tipo', ['class'=>'form-control','label'=>'']);	?>
		</div>
	  </div>
	   <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12"> Fecha</label>
		<div class="col-md-2 col-sm-2 col-xs-12">      
                        <div class='control-group date' id='fecha'>
						 <?= $this->Form->control('fecha', ['type'=>'text','label'=>'', 'value'=> date_format($novedade['fecha'],'d/m/Y'),
								   'class'=>'form-control', 
								   ]);?>
                            <!--control type='text' class="form-control" /-->
                            <span class="control-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
		</div>                  
        </div>    
	 <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Interno</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			<label>
			  <?php	echo $this->Form->checkbox('interno', ['class'=>'js-switch']);?>
			  
			</label>
		  </div>

		</div>
	  </div>
	   <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Importante</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			<label>
			  <?php	echo $this->Form->checkbox('importante', ['class'=>'js-switch']);?>
			  
			</label>
		  </div>

		</div>
	  </div>
	   <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Activo</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			<label>
			  <?php	echo $this->Form->checkbox('activo', ['class'=>'js-switch']);?>
			  
			</label>
		  </div>

		</div>
	  </div>	
	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Imagen</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <div class="">
			  <?php
			echo $this->Form->control('file',['type' => 'file','label'=>'','class'=>'dropzone']);
            ?>
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
<?= $this->Html->css('vendors/switchery/dist/switchery.min');?>
<?= $this->Html->script('vendors/switchery/dist/switchery.min');?>