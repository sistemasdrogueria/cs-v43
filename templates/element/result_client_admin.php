
<p class="text-muted font-13 m-b-30"></p>		
	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	  <thead>
		<tr>
			<th class="header"><?= $this->Paginator->sort('codigo') ?></th>
			<th class="header"><?= $this->Paginator->sort('razon_social') ?></th>
			<th class="header"><?= $this->Paginator->sort('habilitado') ?></th>
			<th class="header">Puntos</th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	  </thead>
	  <tbody>  
		<?php foreach ($clientes as $cliente): ?>
		<tr>
			<td><?= h($cliente->codigo) ?></td>
			<td><?= h($cliente->razon_social) ?></td>
			<td><?php if ($cliente->habilitado==1) 
						echo "SI";
					else
						echo "NO";
					?></td>
		   <td> 
			<?php if ($cliente['puntos']!=null) echo $cliente['puntos'][0]['cantidad_disponible']; ?>
		   </td>
			<td class="actions">
			<!--?=	$this->Html->image("admin/icn_edit.png", ["alt" => "Edit",	'url' => ['controller' => 'clientes', 'action' => 'edit_admin',  $cliente->id]]);? -->
			<!--?=	$this->Html->image("admin/icn_view.png", ["alt" => "Ver",	'url' => ['controller' => 'clientes', 'action' => 'view_admin',  $cliente->id]]);? -->
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