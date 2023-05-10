<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Historiale[]|\Cake\Collection\CollectionInterface $movimientos
  */
?>
<div class="movimientos">
    <h3><?= __('Consumos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                
            <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
				<th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('concepto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $first =1;
            $subtotal = 0;
            foreach ($movimientos as $movimiento): 
            
            ?>
            <tr>
                <td><?= $movimiento->has('cliente') ? $movimiento->cliente->codigo : '' ?></td>
                <td><?= date_format($movimiento['fecha'],'d-m-Y'); ?></td>
				<td><?= $movimiento->concepto ?></td>
                <td><?php if ($movimiento->tipo==1) echo $movimiento->cantidad; else	echo '('.$movimiento->cantidad.')'; ?></td>
		        <td><?php 
                        if ($first) {
                            $first=0;
                           
                            $subtotal = $movimiento->cantidad;
                        }                    
                        else
                        {
                        if ($movimiento->tipo==1) 
                            $subtotal +=$movimiento->cantidad;
                            else
                            $subtotal -=$movimiento->cantidad;
                        }
                        // echo $subtotal;
                ?></td>
        
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
	
</div>
