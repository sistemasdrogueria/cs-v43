<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Canje $canje
  */
?>
<?php
/**
  * @var \App\View\AppView $this
  */
?>
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


                  <div class="aside-nav minimize-on-small">
                     <p class="aside-nav-text">Cliente</p>
                     <h5><?php echo $canje['cliente']['razon_social'].' - '.$canje['cliente']['codigo'];;?></h5>
					 <p> Código Postal: <?php echo $canje['cliente']['codigo_postal']?></p>
					 
					 <!--ul>
                        <li><a>Home</a></li>
					<ul-->	
					<div class="canje_beneficio_vigencia">
					<?php 	echo 'Fecha'.'</br><h5>';
							echo date_format($canje['fecha'],'d-m-Y').'</h5>';	?>
				</div>
				<div class="canje_beneficio_puntos">
						<?php echo 'Cantidad de Puntos'.'</br>';?>
					<h5>	<?php echo $canje['cantidad_puntos'].'</br>'; ?></h5>
				</div>
				</div>
						

    <div class="margin">		   
         <div class="s-12 m-6 l-4">   
				<div class="canje_beneficio_imagen">
				<?php
				$uploadPath = 'beneficios/'.$canje['beneficio']['imagen'];
				echo $this->Html->image($uploadPath, ['alt' => str_replace('"', '', $canje['beneficio']['nombre']),"ALIGN"=>"center"
					,'style'=>' float: left; z-index: 10;']);
				?>
				</div>
		
		


				
          </div>
		  <div class="s-12 m-6 l-8"> 
				<div class="inner-container">
					<div class="member-details">
						<div class="canje_beneficio_descripcion">
						
						 <h5 class="margin-bottom"><strong><?php echo $canje['beneficio']['nombre']; ?></strong></h5>      
					
							
							
							<h3>DESCRIPCION</h3>
							
						<p class="texto">
						 <?php echo nl2br(h($canje['beneficio']['descripcion'])); ?>
						</p>
						</div>
						
						
						

						

						</div>
						
					</div><!-- /.member-details -->
				
				</div><!-- /.inner-container -->
		  

		  </div>
    
</div>

	


</div>


