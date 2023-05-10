<p class="text-muted font-13 m-b-30"></p>		
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	  <thead>
			<tr>
				<th scope="col"><?= $this->Paginator->sort('id','N°') ?></th>
				<th class="col"><?= $this->Paginator->sort('id','Imagen') ?></th>
				<th scope="col"><?= $this->Paginator->sort('beneficio_id') ?></th>
				<th scope="col"><?= $this->Paginator->sort('cliente_id', 'Cliente') ?></th>
				<th scope="col"><?= $this->Paginator->sort('cantidad_puntos','Puntos') ?></th>
				<th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
				<th scope="col"><?= $this->Paginator->sort('canjes_estado_id','Estado') ?></th>
				<th scope="col" class="actions"><?= __('Actions') ?></th>
			</tr>
	  </thead>
	  <tbody>  
						<?php foreach ($canjes as $canje): ?>
						<tr>
							<td><?= $this->Number->format($canje->id) ?></td>
							<td><?php 
									$uploadPath = 'beneficios'.DS;
									$imagen =$canje->beneficio->imagen;
									$filename = WWW_ROOT . 'img' . DS .$uploadPath.$imagen;						
									if (file_exists($filename))
									echo $this->Html->image($uploadPath.$imagen, ['alt' => str_replace('"', '', $canje->beneficio->nombre),'height' => 65]);
								
								?>
							</td>
							<td><?= $canje->has('beneficio') ? $canje->beneficio->nombre : '' ?></td>
							<td><?= $canje->has('cliente') ? $canje->cliente->codigo.' - '.$canje->cliente->razon_social : '' ?></td>
							<td><?= $this->Number->format($canje->cantidad_puntos,['locale'=>'fr_ES']) ?></td>
							<td><?= date_format($canje->fecha,'d-m-Y'); ?></td>
							<td><?= h($canje->canjes_estado_id) ?></td>
							<td class="actions">
								<?=	$this->Html->image("admin/icn_view.png", ["alt" => "Ver",	'url' => ['controller' => 'Canjes', 'action' => 'view_admin',  $canje->id]]);?>
								<?=	$this->Html->image("admin/icn-sendmail.png", ["alt" => "Ver",	'url' => ['controller' => 'Canjes', 'action' => 'sendmail',  $canje->id]]);?>
							</td>
						</tr>
						<?php endforeach; ?>

	  </tbody>
</table>

<div class="paginator">
	<ul class="pagination">
		<?= $this->Paginator->first('<< ' . __('Primero')) ?>
		<?= $this->Paginator->prev('< ' . __('Anterior')) ?>
		<?= $this->Paginator->numbers() ?>
		<?= $this->Paginator->next(__('Siguiente') . ' >') ?>
		<?= $this->Paginator->last(__('Ultimo') . ' >>') ?>
	</ul>
	<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, {{count}} total')]) ?></p>
</div>