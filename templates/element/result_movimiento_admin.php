
<p class="text-muted font-13 m-b-30"></p>		
	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	  <thead>
		 <tr>
                <th scope="col"><?= $this->Paginator->sort('id','Número') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id','Cliente') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Concepto') ?></th>
                
				<th scope="col"><?= $this->Paginator->sort('cantidad','Puntos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad_disponible','Disponibles') ?></th>
                <!--th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th-->
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
	  </thead>
	  <tbody>  
		
		<?php foreach ($movimientos as $movimiento): ?>
            <tr>
                <td><?= $this->Number->format($movimiento->id) ?></td>
                <td><?= $movimiento->has('cliente') ? $movimiento->cliente->codigo.' - '.$movimiento->cliente->razon_social : '' ?></td>
				<td><?= $movimiento->concepto?></td>
				
                <td><?= number_format($movimiento->cantidad,0,',','.') ?></td>
				<td><?= date_format($movimiento['fecha'],'d-m-Y'); ?></td>
               	<td><?= number_format($movimiento->cantidad_disponible,0,',','.');?>
				<!--td><?= date_format($movimiento['creado'],'d-m-Y H:i:s'); ?></td>
				<td><?php 
				if ($movimiento['modificado']!=null)
				echo date_format($movimiento['modificado'],'d-m-Y H:i:s'); ?>
				
				</td -->
                <td class="actions">
                    <?=	$this->Html->image("admin/icn_edit.png", ["alt" => "Edit",'url' => ['controller' => 'Historiales', 'action' => 'edit_admin',  $movimiento['id']]]); ?>
					<?= $this->Form->postLink($this->Html->image('admin/icn_trash.png',
						["alt" => __('Delete'), "title" => __('Delete')]), 
						['action' => 'delete_admin', $movimiento['id']], 
						['escape' => false, 'confirm' => __('Esta seguro de eliminar a # {0}?', $movimiento['id'])]);
					?>
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

