<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Punto[]|\Cake\Collection\CollectionInterface $puntos
  */
?>
<div class="puntos">
    <h3><?= __('Puntos') ?></h3>
	<div class="puntos_disponibles">
			   <?php if ($punto!=null ) 
			    {
					echo "Cantidad: ".$punto->cantidad_disponible.'<br>';
					echo "Ultimo cambio: ".date_format($punto['modificado'],'d-m-Y'); 
				}
				else
				{
					echo 'Cantidad: 0<br>';
					echo 'Ultimo cambio: - '; 
					
				}	
					?>
	</div>
	
	<h3><?= __('Vencimientos') ?></h3>
	<div class="puntos_a_vencer">
	 <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','Número') ?></th>
				<th scope="col"><?= $this->Paginator->sort('concepto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad_disponible','Cantidad a Vencer') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_vencimiento') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movimientos as $movimiento): ?>
            <tr>
                <td><?= $this->Number->format($movimiento->id) ?></td>         
				<td><?= $movimiento->concepto ?></td>
                <td><?= $movimiento->cantidad_disponible;	?></td>
				<td><?= date_format($movimiento['fecha_vencimiento'],'d-m-Y'); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	</div>

	 <h3><?= __('Conversión de puntos') ?></h3>
	 <div class="puntos_equivalencias">
		
		$ <?php echo $cliente->conversion;?> de compra en medicamentos = 1 punto comunidad <br>
		$ <?php echo $cliente->conversion;?> de compra en perfumería = 2 puntos comunidad 
			
	 </div>
</div>
