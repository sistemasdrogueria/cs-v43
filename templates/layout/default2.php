<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Comunidad Sur';
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<html xml:lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
	
	  
	  <?= $this->Html->css('components') ?>
	  <?= $this->Html->css('icons') ?>
	  <?= $this->Html->css('responsee.css') ?>
	  <?= $this->Html->css('owl-carousel/owl.carousel') ?>
	  <?= $this->Html->css('owl-carousel/owl.theme') ?>
    
      <!-- CUSTOM STYLE -->
      
	   <?= $this->Html->css('template-style') ?>
      <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
     
		<?= $this->Html->script('jquery-1.8.3.min');?>
		<?= $this->Html->script('jquery-ui.min');?>
		
</head>
<body>
    
	      <!-- TOP NAV WITH LOGO -->
      <header>
         <nav>
            <div class="line">
               <div class="s-12 l-2">
			   <?php echo $this->Html->image('logo_cs.png', ['alt' => 'Drogueria Sur S.A. Comunidad Sur','class'=>'s-5 l-12 center']);?> 
                
               </div>
               <div class="top-nav s-12 l-10 right">
                  <p class="nav-text">Menu</p>
                  <ul class="right">
                      <li><?=$this->Html->link(__('Inicio'),['controller'=>'Pages','action'=>'home'])?></li>
					 
					 <li>
                        <a>Servicio</a>
                        <ul>
                           <li><a>Producto 1</a></li>
                           <li><a>Producto 2</a></li>
                           <li>
                              <a>Producto 3</a>
                              <ul>
                                 <li><a>Producto 3-1</a></li>
                                 <li><a>Producto 3-2</a></li>
                                 <li><a>Producto 3-3</a></li>
                              </ul>
                           </li>
                        </ul>
                     </li>
                     <li>
                        <a>La Empresa</a>
                        <ul>
                           <li><a>Acerca</a></li>
                           <li><a>Ubicación</a></li>
                        </ul>
                     </li>
                     <li><a>Contacto</a></li>
					 <li><?=$this->Html->link(__('Ingresar'),['controller'=>'Users','action'=>'login'])?></li>
                  </ul>
               </div>
            </div>
         </nav>
		 	<div id="mensaje" style="display:none;"> <?= $this->Flash->render('changepass'); ?>	</div>
	<?= $this->Form->create(null, ['url'=>['controller' => 'users', 'action' => 'login'],'name'=>'confirmInput','id'=>'loginusers']) ?>
	<div class="input_text_login">
		<div class="input_text_input">
        <?= $this->Form->input('username', ['class'=>'input-text2', 'label'=>'','type'=>'text' ,'value'=>'Usuario *' ,'onFocus'=>"if(this.value==this.defaultValue)this.value=''",'onBlur'=>"if(this.value=='')this.value=this.defaultValue;"]); ?>
        </div>
		<div class="input_text_input">
		<?= $this->Form->password('password', ['class'=>'input-text2', 'label'=>'','type'=>'password' ,'placeholder'=>'Contraseña *' ,'onFocus'=>"if(this.value==this.defaultValue)this.value=''",'onBlur'=>"if(this.value=='')this.value=this.defaultValue;",'onchange'=>'javascript:document.confirmInput.submit();']); ?>
		</div>
		<div class="input_text_input">
		<?= $this->Form->button('Ingresar',['class'=>'buttonlogin'])?>
		</div>
	<?= $this->Form->end(['data-type' => 'hidden']) ?>	 
	</div>
	<?= $this->Flash->render() ?>
      </header>
      <section>
         <!-- CAROUSEL --> 
         <div id="carousel">
            <div id="owl-demo" class="owl-carousel owl-theme">
               <div class="item">
                  <img src="img/1500x606.jpg" alt="">
                  <div class="line">
                     <h2>Muy Pronto</h2>
                  </div>
               </div>
               <!--div class="item">
                  <img src="img/1500x606-2.png" alt="">
                  <div class="line">
                     <h2>Fully responsive components</h2>
                  </div>
               </div>
               <div class="item">
                  <img src="img/1500x606-3.jpg" alt="">
                  <div class="line">
                     <h2>Build new layout in 10 minutes!</h2>
                  </div>
               </div-->
            </div>
         </div>
         <!-- FIRST BLOCK -->
         <div id="first-block">
            <div class="line">
               <div class="margin">
                  <div class="s-12 m-6 l-3 margin-bottom">
                     <i class="icon-paperplane_ico icon3x"></i>
                     <h2>Nosotros</h2>
                     <p>.</p>
                  </div>
                  <div class="s-12 m-6 l-3 margin-bottom">
                     <i class="icon-star icon3x"></i>
                     <h2>La empresa</h2>
                     <p></p>
                  </div>
                  <div class="s-12 m-6 l-3 margin-bottom">
                     <i class="icon-message icon3x"></i>
                     <h2>Servicos</h2>
                     <p></p>
                  </div>
                  <div class="s-12 m-6 l-3 margin-bottom">
                     <i class="icon-mail icon3x"></i>
                     <h2>Contacto</h2>
                     <p></p>
                  </div>
               </div>
            </div>
         </div>
         <!-- SECOND BLOCK -->
         <div id="second-block">
            <div class="line">
               <div class="margin-bottom">
                  <div class="margin">
                     <article class="s-12 m-12 l-8 center">
                        <h1></h1>
                        <p>                        
						• Atención personalizada permanente de toda nuestra cartera de clientes. <br>

• Asesoramiento sobre compras iniciales y mantenimiento de niveles óptimos de stock.<br>

• Acreditación directa en cuenta corriente de las ventas con tarjetas de crédito.<br>

• Servicio de operadoras para toma de pedidos.<br>

• Servicio de asesoramiento exclusivo de Patagonia Med para compra ofertas y tranfers.<br>

• Publicación mensual de revista con contenido de ofertas y novedades de interés general.<br>

• Servicio diario de entrega de pedidos.<br>
						</p>


						</article>
                  </div>
               </div>
            </div>
         </div>
         <!-- GALLERY -->
         <div id="third-block">
            <div class="line">
               <h2>Galeria</h2>
               <div class="margin">
                  <div class="s-12 m-6 l-3">
                     <img class="margin-bottom" src="img/330x190.jpg">
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img class="margin-bottom" src="img/330x190-2.jpg">
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img class="margin-bottom" src="img/330x190-3.jpg">
                  </div>
                  <div class="s-12 m-6 l-3">
                     <img class="margin-bottom" src="img/330x190.jpg">
                  </div>
               </div>
            </div>
         </div>
         <div id="fourth-block">
            <div class="line">
               <div id="owl-demo2" class="owl-carousel owl-theme">
                  <div class="item">
                     <h2>Amazing responsive template</h2>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet 
                        dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                        lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
                  <div class="item">
                     <h2>Responsive components</h2>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet 
                        dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                        lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
                  <div class="item">
                     <h2>Retina ready</h2>
                     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet 
                        dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit 
                        lobortis nisl ut aliquip ex ea commodo consequat.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- FOOTER -->
	  
	  <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    
      <footer>
         <div class="line">
            <div class="s-12 l-6">
               <p>Copyright 2017, Drogueria Sur S.A</p>
            </div>
            <div class="s-12 l-6">
               <a class="right" href="http://www.drogueriasur.com" title="Drogueria Sur S.A.">Drogueria Sur S.A.</a>
            </div>
         </div>
      </footer>
     
	  <?= $this->Html->script('responsee');?>
	   <?= $this->Html->script('owl-carousel/owl.carousel');?>
     
      <script type="text/javascript">
         jQuery(document).ready(function($) {	  
           $("#owl-demo").owlCarousel({		
           	navigation : true,
           	slideSpeed : 300,
           	paginationSpeed : 400,
           	autoPlay : true,
           	singleItem:true
           });
          /* $("#owl-demo2").owlCarousel({
        		slideSpeed : 300,
        		autoPlay : true,
        		navigation : true,
        		pagination : true,
        		singleItem:true
        	  });*/
         });	 
      </script>
	
    
</body>
</html>
