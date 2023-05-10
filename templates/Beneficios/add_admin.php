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

<script>
window.addEventListener("load", cargaPagina);
function cargaPagina() {
    var btn = document.getElementById("botoncalcular").addEventListener("click", cambiaValores);
}

function cambiaValores() {
    var inputPrecio = document.getElementById("input_precio");
	var inputPuntos = document.getElementById("input_punto");
    var extra =0;
	if (inputPrecio.value<12000 )
		extra = 25000;
	if (inputPrecio.value>=12000 && inputPrecio.value<16000)
		extra = 20000;
	if (inputPrecio.value>=16000 && inputPrecio.value<20000)
	extra = 18000;
	if (inputPrecio.value>=20000 && inputPrecio.value<24000)
	extra = 15000;
	if (inputPrecio.value>=24000 && inputPrecio.value<28000)
	extra = 10000;
	if (inputPrecio.value>=28000 && inputPrecio.value<32000)
	extra = 8000;
	if (inputPrecio.value>=32000 && inputPrecio.value<36000)
	extra = 5000;
	
	inputPuntos.value = (inputPrecio.value*2) + extra;
}
</script>


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

<?php // $this->Form->create($beneficio,['class'=>'form-horizontal form-label-left']); ?>
<?= $this->Form->create($beneficio,['url'=>['controller'=>'Beneficios','action'=>'add_admin'],'type' => 'file','class'=>'form-horizontal form-label-left']) ?>
	<div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12" >Titulo</label>
		<div class="col-md-9 col-sm-9 col-xs-12">
		  <?php	echo $this->Form->control('nombre',[  'label'=>'','type'=>'text', 'class'=>'form-control col-md-7 col-xs-12','id'=>'first-name']);?>
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
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
		<?php echo $this->Form->select('categoria_id', $categorias,['class'=>'select2_single form-control','tabindex'=>'-1']);	?>
		</div>
	  </div>
	  
	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Puntos</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<?php echo $this->Form->control('puntos',['class'=>'form-control','id'=>'input_punto','label'=>''] );?>
		  
		</div>
	  </div>
	  
		   <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Cantidad</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			
			<?php echo $this->Form->control('cantidad_maxima',['class'=>'form-control','label'=>''] );?>
		  
		</div>
	  </div>  
	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Precio</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			
			<?php echo $this->Form->control('precio_real',['class'=>'form-control','id'=>'input_precio','label'=>''] );?>
		  
		</div>
		<input type="button" id="botoncalcular" name="botoncalcular" value="Calcular Puntos">
	  </div>  

	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Lugar de Compra</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			
			<?php 
			$groups  =['ML'=>'ML', 'FRAVEGA'=>'FRAVEGA','MUSIMUNDO'=>'MUSIMUNDO', 'LOCAL'=>'LOCAL', 'GARBARINO'=>'GARBARINO','OPORTUTEK'=>'OPORTUTEK'];
			echo $this->Form->control('mas_info', ['options' => $groups,'class'=>'form-control','label'=>''] );?>
		  
		</div>
	  </div>  
	  <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12">Orden</label>
		<div class="col-md-6 col-sm-6 col-xs-12">
			
			<?php echo $this->Form->control('orden',['class'=>'form-control','label'=>''] );?>
		  
		</div>
	  </div> 
       <!-- div class="form-group">
		
			<label class="control-label col-md-3 col-sm-3 col-xs-12"> Fecha Desde</label>
                    <div class="col-md-4 col-sm-4 col-xs-12">        
                              <div class="col-md-11 xdisplay_inputx form-group has-feedback" id="fecha_desde">
                                 <?= $this->Form->control('fecha_desde', ['type'=>'text','label'=>'', 
								   'class'=>'form-control has-feedback-left',  'aria-describedby'=>'inputSuccess2Status3' 
								   ]);?>
								<span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                              </div>
                            
                 </div>         
                  
		
	  </div-->
        <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12"> Fecha Desde</label>
		<div class="col-md-2 col-sm-2 col-xs-12">      
                        <div class='input-group date' id='fecha_desde'>
						 <?= $this->Form->control('fecha_desde', ['type'=>'text','label'=>'', 
								   'class'=>'form-control', 
								   ]);?>
                            <!--input type='text' class="form-control" /-->
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
		</div>                  
        </div>               
        <div class="form-group">
		<label class="control-label col-md-3 col-sm-3 col-xs-12"> Fecha Hasta</label>
		<div class="col-md-2 col-sm-2 col-xs-12">      
                        <div class='input-group date' id='fecha_hasta'>
						 <?= $this->Form->control('fecha_hasta', ['type'=>'text','label'=>'', 
								   'class'=>'form-control', 
								   ]);?>
                            <!--input type='text' class="form-control" /-->
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
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
		
		
		
					  	<?php	
				echo $this->Form->button('Cancel', array(
			'type' => 'button',
			   'class' => 'btn btn-danger',
			   'onclick' => 'location.href=\'/cs/beneficios/index_admin\''
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
