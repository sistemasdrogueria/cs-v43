<section class="s-12 m-8 l-9">

    <div class="noticia"> 
		<div class="row">
			<h2>
				<?= h($novedade->titulo) ?>
			</h2>
				<div class="large-2 columns dates end">
					<p><?=	date_format($novedade['fecha'],'d-m-Y');?></p><br/>
				</div>
			<div>
				<div class="columns large-9">
				   
					<p class="texto" style=" font-weight: bold;" >
					 <?php echo nl2br(h($novedade->descripcion)); ?>
					</p>
					
					<br/>
					<p class="texto">
					<?php echo nl2br(h($novedade->descripcion_completa)); ?>
					</p>
				</div>
			</div>
		</div>
    </div>
</section>

<section  class="s-12 m-4 l-3 right">

    <div class="product-item-3"> 
	
		<h4 class="name">Noticias</h4>
		<br>
<?php foreach ($novedades2 as $novedade): ?>
<div class="noticia">

				
				<div>
					<?php
						if ($novedade->img_file!="")
							$nameimagen="novedades/".$novedade->img_file;
						else	
							$nameimagen="sinimagen.png";
						
					
						echo $this->Html->image($nameimagen, ["alt" => "Novedades",'width'=>'75%',
						'url' => ['controller' => 'novedades', 'action' => 'noticia',  $novedade->id]]);
						
							
					?>
				</div><!-- /.author-avatar -->
				<div class="member-details">
					<div class="member-top">									
						<h4 class="name"><?= h($novedade->titulo) ?></h4>
						
					</div><!-- /.member-top -->
					
					<p class="texto">	
					<?php echo nl2br(h($novedade->descripcion)); 
						echo date_format($novedade['fecha'],'d-m-Y');
						?>
					
					
						<?= $this->Html->link(__('Mas'), ['controller' => 'Novedades', 'action' => 'noticia',$novedade->id]) ?>
					</p>
				</div>									

</div>				
<?php endforeach; ?>


		
  </div>		
</section>
	