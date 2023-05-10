<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Novedade[]|\Cake\Collection\CollectionInterface $novedades
  */
?>
<section class="s-12 m-8 l-9 right">
<h4 class="name">Comunicados</h4>
	<br>
	<?php foreach ($novedades as $novedade): ?>

		<div class="noticia_novedad">
			<div >	
				<h6>Bahia Blanca <?php echo ', '.date_format($novedade['fecha'],'d-m-Y'); ?></h6>
				<h4 class="name"><?= h($novedade->titulo) ?></h4>
				<span class="designation"><?= h($novedade->tipo) ?></span>
			</div>

			<p class="texto" style=" font-weight: bold;" >
			 <?php echo nl2br(h($novedade->descripcion)); ?>
			</p>
			<p class="texto">
			<?php echo nl2br(h($novedade->descripcion_completa)); ?>
			</p>
		</div>

	<?php endforeach; ?>
</section>

 <section class="s-12 m-4 l-3">
	<h4 class="name">Noticias</h4>
		<br>
	<?php $contador=0;?>	
	<?php foreach ($novedades2 as $novedade): ?>
	<div class="noticia">
		<div>
			<?php
				$contador++;
				if ($contador<5)
				{
				if ($novedade->img_file!="")
					$nameimagen="novedades/".$novedade->img_file;
				else	
					$nameimagen="sinimagen.png";
				echo $this->Html->image($nameimagen, ["alt" => "Novedades",'width'=>'75%',
				'url' => ['controller' => 'novedades', 'action' => 'noticia',  $novedade->id]]);
				}
			?>
		</div>
		<div class="noticia_detalle">
			<div class="noticia_titulo">									
				<h4 class="name"><?= h($novedade->titulo) ?></h4>
			</div>
			<p class="texto">	
			<?php 		
				if ($contador<5)
					echo nl2br(h($novedade->descripcion));
				echo date_format($novedade['fecha'],'d-m-Y');
				echo $this->Html->link(__('Mas'), ['controller' => 'Novedades', 'action' => 'noticia',$novedade->id]) ?>
			</p>
		</div>									
	</div>				
	<?php endforeach; ?>
</section>