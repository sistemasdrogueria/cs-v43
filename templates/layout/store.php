<!DOCTYPE html>
<html lang="en-US">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Comunidad Sur</title>
	  
	    <?= $this->Html->meta('icon') ?>

		<?= $this->fetch('meta') ?>
		<?= $this->fetch('css') ?>
		<?= $this->fetch('script') ?>
		<?= $this->Html->css('components') ?>
		<?= $this->Html->css('icons') ?>
		<?= $this->Html->css('responsee.css') 
      ?>
	 
	   <?= $this->Html->css('template-style') ?>
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
     
		<?= $this->Html->script('jquery-1.8.3.min');?>
		<?= $this->Html->script('jquery-ui.min');?>	 
  
   </head>
   <body class="size-1280">
      <!-- HEADER -->
      <header>
         <div class="line">
            <div class="box">
               <div class="s-12 l-4" id="logos"> 

			    <?php echo $this->Html->image('logo_comunidad_sur300.png', ['alt' => 'Comunidad Sur.']);?>
				<?php //echo $this->Html->image('&.png', ['alt' => 'Comunidad Sur','id'=>'and']);?> 
				<?php //echo $this->Html->image('logo_ds.png', ['alt' => 'Drogueria Sur S.A.','class'=>'logods']);?>
               </div>
               <div class="s-12 l-8 right">
                  <div class="margin">
                     <!-- form  class="customform s-12 l-8" method="get" action="http://google.com/">
                        <div class="s-9"><input type="text" placeholder="Buscar Beneficio" title="Buscar Beneficio" /></div>
                        <div class="s-3"><button type="submit">Buscar</button></div>
                     </form -->
					 <?= $this->Form->create(null,['url'=>['controller'=>'Beneficios','action'=>'index'], 'class'=>'customform s-12 l-6']); ?>
						<div class="s-9">
						<?= $this->Form->control('termino', ['class'=>'form-control','label'=>'','type'=>'text' ,'placeholder'=>'Buscar Beneficio']); ?>
						</div>
                        <div class="s-3">
						<?= $this->Form->button('Buscar'); ?>     
						</div>
					 <?= $this->Form->end() ?>
                     <div class="s-6 1-4">
                        <p class="right">
						<?php echo $this->request->getSession()->read('User.codigo').' - '.$this->request->getSession()->read('User.razon');?>
						</p>
						</br>
						<!--p class="right"> Mis Puntos</p></br -->
						<p class="right">
						<?php  echo 'Puntos: '.$this->request->getSession()->read('User.puntos') ?>
						</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- TOP NAV -->  
         <div class="line">
            <nav>
               <p class="nav-text">MENU</p>
               <div class="top-nav s-12 l-10">
                  <ul>
					<li><?=$this->Html->link(__('Beneficios'),['controller'=>'Beneficios','action'=>'index'])?></li>
                     
                     <li>
						<?=$this->Html->link(__('Mis Puntos'),['controller'=>'Puntos','action'=>'index'])?>
                        
                        <ul>
                           
						    <li><?=$this->Html->link(__('Conversion'),['controller'=>'Puntos','action'=>'index'])?></li>
						    <li><?=$this->Html->link(__('Movimientos'),['controller'=>'Movimientos','action'=>'index'])?></li>
						    <li><?=$this->Html->link(__('Consumos'),['controller'=>'Movimientos','action'=>'consumo'])?></li>

                           </li>
                        </ul>
                     </li>
					 <li><?=$this->Html->link(__('Mis Canjes'),['controller'=>'Canjes','action'=>'index'])?></li>
                    
                    
					  <li>
                        <?=$this->Html->link(__('Novedades'),['controller'=>'Novedades','action'=>'index'])?>
                       
                     </li>
					 <li><a>Mi Cuenta</a>
					   <ul>
                           <li><a>Mis Datos</a></li>
						   <li><?=$this->Html->link(__('Cambiar Contraseña'),['controller'=>'Users','action'=>'change_password'])?></li>
						   
						   
                        </ul>
					 
					 </li>
					 <li><?=$this->Html->link(__('Términos y Condiciones'),['controller'=>'Novedades','action'=>'terminos_condiciones'])?></li>
                         
					 <li><?= $this->Html->link(__('Salir'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
					  
                  </ul>
               </div>
               <div class="hide-s hide-m l-2">
                  <i class="icon-facebook_circle icon2x right padding"></i>
               </div>
            </nav>
         </div>
      </header>
      <!-- ASIDE NAV AND CONTENT -->
      <div class="line">
         <div class="box">
            <div class="margin2x">
               <!-- CONTENT -->
               <div id=mensaje style=display:none>
				<?=$this->Flash->render('changepass');?>
				</div>
				<?=$this->fetch('content')?>              
                         
            </div>
         </div>
      </div>
      <!-- FOOTER -->
      <footer class="line">
         <div class="s-12 l-6">
		 
         <p><span>Droguería Sur SA © <?php echo date("o");?> . Villarino 46/58 (B8000JIB) - Bahía Blanca - Buenos Aires </span>   </p>
		  </div>
         <div class="s-12 l-6">
            <a class="right" href="https://www.drogueriasur.com" title="Drogueria Sur S.A.">Diseñado y desarrollado por Sistemas Drogueria Sur</a>
         </div>
		
        
      </footer>
		<?= $this->Html->css('jquery.notifyBar');?>
		<?= $this->Html->script('jquery.notifyBar');?>
		
	  <script>
	  $(function() {
		var UI=document.getElementById('flashmensajesuccess');
		if (UI != null)
		{
			if (UI.innerHTML != '')
			{
				$.notifyBar({ cssClass: "success", html: UI.innerHTML ,position: "bottom"});
			}
		}
		var UI2=document.getElementById('flashmensajeerror');
		if (UI2 != null)
		{
			if (UI2.innerHTML != '')
			{
				$.notifyBar({ cssClass: "error", html: UI2.innerHTML, close: true, closeOnClick: false });
			}
		}
		var UI3=document.getElementById('flashmensajewarning');
		if (UI3 != null)
		{
			if (UI3.innerHTML != '')
			{
				$.notifyBar({ cssClass: "warning", html: UI3.innerHTML });
			}
		}   
    });
	</script>
	  <?= $this->Html->script('responsee');?>	 
      <script async src="https://www.googletagmanager.com/gtag/js?id=G-QPBS0E526D"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-QPBS0E526D');
</script>
   </body>
</html>