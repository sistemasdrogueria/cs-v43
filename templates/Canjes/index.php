<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Canje[]|\Cake\Collection\CollectionInterface $canjes
  */
?>
<div class="canjes">
    <h3><?= __('Mis Canjes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
				<th scope="col"><?= $this->Paginator->sort('id',' ') ?></th>
                <th scope="col"><?= $this->Paginator->sort('id','N° de operación') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha','Fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('beneficio_id') ?></th>
                
                <th scope="col"><?= $this->Paginator->sort('cantidad_puntos') ?></th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($canjes as $canje): ?>
            <tr>
			<td><?php 
									$uploadPath = 'beneficios'.DS;
									$imagen =$canje->beneficio->imagen;
									$filename = WWW_ROOT . 'img' . DS .$uploadPath.$imagen;						
									if (file_exists($filename))
									echo $this->Html->image($uploadPath.$imagen, ['alt' => str_replace('"', '', $canje->beneficio->nombre),'class' => 'canjes_img']);
								
								?>
							</td>
                <td><?= $canje->id ?></td>
          
				<td><?= date_format($canje->fecha,'d-m-Y'); ?></td>
                <td><?= $canje->has('beneficio') ? $this->Html->link($canje->beneficio->nombre, ['controller' => 'Canjes', 'action' => 'view', $canje->beneficio->id]) : '' ?></td>
                
                <td><?= $canje->cantidad_puntos ?></td>
                
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
        <div class="pagination_count"><span><?php echo $this->Paginator->counter(
    'Pagina {{page}} de {{pages}}, Se ven {{current}} registro(s) de
     {{count}} total,  comenzando en el registro {{start}}, y terminando en {{end}}'
); ?></span></div>
    </div>
	