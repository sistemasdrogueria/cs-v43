
<p class="text-muted font-13 m-b-30"></p>		
	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	  <thead>
		<tr>
				
				<th scope="col"><?= $this->Paginator->sort('id','Número') ?></th>
                <th scope="col"><?= $this->Paginator->sort('identificacion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('volumen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('conversion') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
				
				<th class="actions"><?= __('Actions') ?></th>
		</tr>
	  </thead>
	  <tbody>  
	  <?php foreach ($equivalencias as $equivalencia): ?>
            <tr>
                
				<td><?= h($equivalencia->id) ?></td>
                <td><?= h($equivalencia->identificacion) ?></td>
                <td><?= h($equivalencia->volumen) ?></td>
                
                <td><?= number_format(round($equivalencia->conversion, 3),0,',','.');?></td>
				<td><?= date_format($equivalencia['creado'],'d-m-Y H:i:s'); ?></td>
				<td class="actions">
                    <?=	$this->Html->image("admin/icn_edit.png", ["alt" => "Edit",'url' => ['controller' => 'Equivalencias', 'action' => 'edit_admin',   $equivalencia->id]]); ?>
					<?php /* $this->Form->postLink($this->Html->image('admin/icn_trash.png',
						["alt" => __('Delete'), "title" => __('Delete')]), 
						['action' => 'delete_admin',  $equivalencia->id], 
						['escape' => false, 'confirm' => __('Esta seguro de eliminar a # {0}?', $equivalencia->id)]);
					*/?>
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