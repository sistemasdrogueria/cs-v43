<?php
/**
  * @var \App\View\AppView $this
  */
?>
 <aside class="s-12 m-4 l-2 right">
                  <div class="aside-nav minimize-on-small">
                     <p class="aside-nav-text">Mis Puntos</p>
                     Mis Puntos<br>
					<h5><?php if ($punto!=null ) echo $punto->cantidad_disponible; else echo '0';?></h5>
					 A vencer
					<h5>0</h5>
					 <!--ul>
                        <li><a>Home</a></li>
					<ul-->	
				
				</div>
</aside>						
<section class="s-12 m-8 l-10">
    <div class="margin">		   
         <div class="s-12 m-6 l-4">   
				<div class="canje_beneficio_imagen">
				<?php
				$uploadPath = 'beneficios/'.$beneficio['imagen'];
				echo $this->Html->image($uploadPath, ['alt' => str_replace('"', '', $beneficio['nombre']),"ALIGN"=>"center"
					,'style'=>' float: left; z-index: 10;'
					]);
				
				?>
				</div>
				<div class="canje_beneficio_vigencia">
					<?php 	echo 'Vigencia'.'</br><h5>';
							echo date_format($beneficio['fecha_desde'],'d-m-Y').' al '.date_format($beneficio['fecha_hasta'],'d-m-Y').'</h5>';
					?>
				</div>
				<div class="canje_beneficio_puntos">
						<?php echo 'Puntos'.'</br>';?>
					<h5>	<?php echo $beneficio['puntos'].'</br>'; ?></h5>
				</div>
		


				<?= $this->Form->create($canje,['url'=>['controller'=>'Canjes','action'=>'confirm'],['class'=>'customform s-12 l-8']]) ?>
				<?php
						//echo $this->Form->control('fecha', ['empty' => true,'type'=>'hidden']);
						echo $this->Form->control('beneficio_id', ['value' => $beneficio->id, 'empty' => true,'type'=>'hidden']);
						echo $this->Form->control('cliente_id', ['value' => $cliente_id, 'empty' => true,'type'=>'hidden']);
						echo $this->Form->control('cantidad_puntos',['value' => $beneficio->puntos,'type'=>'hidden']);
				?>
				</br></br>
				 <div>

						 <?php 
					   
					   if ($punto!=null)
					   {
						   if ($beneficio->puntos <= $punto->cantidad_disponible)
					   {
							
							//echo $this->Form->input('direccion_envio',['label'=>'Dirección de Envio','direccion_envio']);
							echo '<div class="s-9">';
							//echo $this->Form->input('telefono_envio',['label'=> 'Telefono Contacto','type'=>'text' ,'class'=>'form-control']);
							echo '</div>';
							echo $this->Form->button(__('Confirmar Canje'),['class'=>'button rounded-btn submit-btn s-12']);    
							
					   }
						else
								echo "No dispone de Puntos suficiente";
											   
					   }
							else
								echo "No dispone de Puntos suficiente";
								?>		
				 </div>	
					<?= $this->Form->end() ?>
          </div>
		  <div class="s-12 m-6 l-8"> 
				<div class="inner-container">
					<div class="member-details">
						<div class="canje_beneficio_descripcion">
						
						 <h5 class="margin-bottom"><strong><?php echo $beneficio['nombre']; ?></strong></h5>      
					
							
							
							<h3>DESCRIPCION</h3>
							
						<p class="texto">
						 <?php echo nl2br(h($beneficio->descripcion)); ?>
						</p>
						</div>
						
						
						
						<div class="canje_envio">
						<h3>ENVIO</h3>
						
<p>
El producto solicitado será enviado por la empresa OCA y entregado en el domicilio declarado por el cliente en Drogueria, dentro de los 15 días hábiles posteriores a la fecha en que se ha realizado el canje. 
Drogueria Sur no se responsabiza bajo ningún concepto del servicio brindado por la empresa de transporte

</p>
						</div>
						
						
						<div class="canje_envio">
						<h3>GARANTIA</h3>
							<p>
							Drogueria Sur no se responsabiliza bajo ningún concepto en caso de incorrecto funcionamiento de los productos canjeados. Cada producto cuenta con su garantía correspondiente y en caso de utilizarla, la gestión es absoluta responsabilidad del cliente
							</p>
						</div>
						
					</div><!-- /.member-details -->
				
				</div><!-- /.inner-container -->
		  

		  </div>
    
</div>

	
</section>



