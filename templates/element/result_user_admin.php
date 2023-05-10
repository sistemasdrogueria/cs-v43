<p class="text-muted font-13 m-b-30"></p>		
	<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
	  <thead>
		<tr>
			<th class="header"><?= $this->Paginator->sort('id','Número') ?></th>
            <th class="header"><?= $this->Paginator->sort('username','Usuario') ?></th>
           	<th class="header"><?= $this->Paginator->sort('cliente_id','Cliente') ?></th>
			<th class="header"><?= $this->Paginator->sort('role','Rol') ?></th>
            <th class="header"><?= $this->Paginator->sort('created','Creado') ?></th>
            <th class="header"><?= $this->Paginator->sort('modified','Modificado') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
		</tr>
	  </thead>
	  <tbody>  
		 <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $this->Number->format($user['id']) ?></td>
            <td><?= h($user['username']) ?></td>
			<td><?php echo $user['cliente']['nombre'] ?></td>
            <td><?= h($user['role']) ?></td>
			
           <td><?= date_format($user['created'],'d-m-Y H:i:s'); ?></td>
		   <td><?= date_format($user['modified'],'d-m-Y H:i:s'); ?></td>
		    <td class="actions">
			<?=	$this->Html->image("admin/icn_edit.png", ["alt" => "Edit",'url' => ['controller' => 'users', 'action' => 'edit_admin',  $user['id']]]); ?>
			<?php 
					if ($this->request->getSession()->read('User.id') === 4985)
					echo $this->Form->postLink($this->Html->image('admin/icn_trash.png',
						["alt" => __('Delete'), "title" => __('Delete')]), 
						['action' => 'delete_admin', $user['id']], 
						['escape' => false, 'confirm' => __('Esta seguro de eliminar a # {0}?', $user['id'])]);
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