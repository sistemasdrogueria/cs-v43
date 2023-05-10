<div class="margin">		   
	<?php foreach ($beneficios as $beneficio): ?>
           <div class="s-12 m-6 l-3">
		   <div class="beneficio_index_imagen" ALIGN="center">
			<?php
			$uploadPath = 'beneficios/'.$beneficio['imagen'];
			
				
			echo $this->Html->image($uploadPath, ['alt' => str_replace('"', '', $beneficio['nombre']),"ALIGN"=>"center"
				,'style'=>'  z-index: 10;'
				,'url'=>['controller'=>'Canjes','action'=>'add', $beneficio->id]]);	
			//$file_headers = @get_headers('http://www.drogueriasur.com.ar/cs/webroot/img/'.$uploadPath);
			///if($file_headers[0] == 'HTTP/1.1 404 Not Found') 
			//else float: left;

			?>
			</div>
			<!-- div style=" float: left;	margin-top: -50%;	z-index: 100;margin-left: 70%;text-align:left;"></div -->		
			<div class="beneficio_index_titulo">
				<h5 class="margin-bottom"><strong><?php echo $beneficio['nombre']; ?></strong></h5>
			</div>
			<div class="beneficio_index_puntos">
				<h5><?php echo '<strong>'.$beneficio['puntos'].'</strong>'.' Puntos';?></h5>		
			</div>
			<div class="customform s-12 margin-bottom2x">
			   <?=$this->Html->link('Canjear',['controller'=>'Canjes','action'=>'add', $beneficio->id],['class'=>'button rounded-btn submit-btn s-12'])?>
			   
			</div>
			
          </div>
    <?php endforeach; ?>
</div>
	<div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primero')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
            <?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
        </ul>
		<div class="pagination_count"><span><?= $this->Paginator->limitControl(['10'=>10,'20'=>20,'40'=>40],null,['label'=>'Cant:','class'=>'cantidadselect2']);?></span></div>
    
        <div class="pagination_count"><span><?php echo $this->Paginator->counter(
    'Pagina {{page}} de {{pages}}, Se ven {{current}} registro(s) de
     {{count}} total,  comenzando en el registro {{start}}, y terminando en {{end}}'
); ?></span></div>
    </div>