	<div id="beneficio_sort_linea">
	<div class="beneficio_sort">
		<div class="param_sort">ORDENAR POR: </div>
		<!--?= $this->Paginator->sort('nombre') ?-->
        <div class="param_sort" ><?= $this->Paginator->sort('puntos','Menor Valor',['direction' => 'asc'] ) ?> </div>
        <div class="param_sort"><?= $this->Paginator->sort('puntos','Mayor Valor',['direction' => 'desc'] ) ?></div>
        <div class="param_sort"><?= $this->Paginator->sort('creado','Fecha') ?></div>
		<div class="param_sort"><?= $this->Paginator->limitControl(['10'=>10,'20'=>20,'40'=>40],null,['label'=>'Cant:','class'=>'cantidadselect']);?></div>

		<br>
	</div>
	</div>