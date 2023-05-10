<p class="text-muted font-13 m-b-30"></p>		
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	  <thead>
		 <tr>
				<th class="col"><?= $this->Paginator->sort('id','Imagen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('categoria_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad_maxima') ?></th>
                <th scope="col"><?= $this->Paginator->sort('puntos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_desde') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_hasta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
	  </thead>
	  <tbody>  
	 <?php foreach ($beneficios as $beneficio): ?>
            <tr>
                <td>
				<?php 
					$uploadPath = 'beneficios'.DS;
					$filename = WWW_ROOT . 'img' . DS .$uploadPath.$beneficio['imagen'] ;						
					if (file_exists($filename))
					echo $this->Html->image($uploadPath.$beneficio['imagen'], ['alt' => str_replace('"', '', $beneficio['nombre']),'height' => 75]);
				?>
				</td>
                <td><?= h($beneficio->nombre) ?></td>
                <td><?= h($beneficio->categoria_id) ?></td>
                <td><?= $this->Number->format($beneficio->cantidad_maxima) ?></td>
                <td><?= number_format(round($beneficio->puntos, 3),0,',','.');?>
				</td>
				
                <td><?= date_format($beneficio['fecha_desde'],'d-m-Y'); ?></td>
                <td><?= date_format($beneficio['fecha_hasta'],'d-m-Y'); ?></td>
                <td><?= date_format($beneficio['creado'],'d-m-Y H:i:s'); ?></td>
                <td class="actions">
                    <?=	$this->Html->image("admin/icn_edit.png", ["alt" => "Edit",'url' => ['controller' => 'Beneficios', 'action' => 'edit_admin',  $beneficio['id']]]); ?>
					<?= $this->Form->postLink($this->Html->image('admin/icn_trash.png',
						["alt" => __('Delete'), "title" => __('Delete')]), 
						['action' => 'delete_admin', $beneficio['id']], 
						['escape' => false, 'confirm' => __('Esta seguro de eliminar a # {0}?', $beneficio['id'])]);
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