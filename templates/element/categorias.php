	  <div class="aside-nav minimize-on-small">
		<!--h4 style="text-align: center;">Categorias</h4 -->
		<p class="aside-nav-text">Categorias</p>
		 <ul>
			<?php foreach ($categorias as $categoria): ?>
			<li>
			 <?=$this->Html->link($categoria->nombre,['controller'=>'Beneficios','action'=>'search', $categoria->id])?>
			</li>
			<?php endforeach; ?>
			<!--li><a>VOUCHERS</a></li>
			<li>
			   <a>ELECTRONICA</a>
			   <ul> <li><a>Product 1</a></li>  </ul>
			</li>
			<li><a></a>
			   <ul> <li><a>About</a></li> </ul>
			</li>
			<li><a>Contact</a></li-->
		 </ul>
	 </div>           