<p class="text-muted font-13 m-b-30"></p>		
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	  <thead>
		 <tr>
				<th class="col"><?= $this->Paginator->sort('id','Imagen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('titulo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('interno') ?></th>
				<th scope="col"><?= $this->Paginator->sort('importante') ?></th>
                <th scope="col"><?= $this->Paginator->sort('activo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                 <th scope="col" class="actions"><?= __('Actions') ?></th>
          </tr>
	  </thead>
	  <tbody>  
	<?php foreach ($novedades as $novedade): ?>
            <tr>
                <td>
				<?php 
					$uploadPath = 'novedades'.DS;
					$filename = WWW_ROOT . 'img' . DS .$uploadPath.$novedade['img_file'] ;						
					if (file_exists($filename))
							echo $this->Html->image($uploadPath.$novedade['img_file'], ['alt' => str_replace('"', '', $novedade['titulo']),'height' => 70]);
						else 
							echo $this->Html->image('sinimagen.jpg', ['alt' => str_replace('"', '', $novedade['titulo']),'height' => 70]);
				?>
				</td>
				<td><?= h($novedade->titulo) ?></td>
                <td><?= h($novedade->tipo) ?></td>
                 <td><?= date_format($novedade['fecha'],'d-m-Y'); ?></td>
                <td><?= h($novedade->interno) ?></td>
				<td><?= h($novedade->importante) ?></td>
                <td><?= h($novedade->activo) ?></td>
               <td><?= date_format($novedade['creado'],'d-m-Y H:i:s'); ?></td>
                <td class="actions">
                    <?=	$this->Html->image("admin/icn_edit.png", ["alt" => "Edit",'url' => ['controller' => 'Novedades', 'action' => 'edit_admin',  $novedade['id']]]); ?>
					<?= $this->Form->postLink($this->Html->image('admin/icn_trash.png',
						["alt" => __('Delete'), "title" => __('Delete')]), 
						['action' => 'delete_admin', $novedade['id']], 
						['escape' => false, 'confirm' => __('Esta seguro de eliminar a # {0}?', $novedade['id'])]);
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