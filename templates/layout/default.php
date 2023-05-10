<!doctype html>
<html>

<head>
	<meta name="viewport" content="width=device-width, maximum-scale=1">
	<meta charset="utf-8">
	<link rel="icon" href="favicon.ico" type="image/png">
	<title>Comunidad Sur</title>
	<script src="https://www.google.com/recaptcha/api.js?render=6LezUNglAAAAAJuqE1cLXpmR8pc8hl0jbSEOsgL1"></script>
	<script>
		document.addEventListener('submit', function(e) {
			e.preventDefault();
			grecaptcha.ready(function() {
				grecaptcha.execute('6LezUNglAAAAAJuqE1cLXpmR8pc8hl0jbSEOsgL1', {
					action: 'submit'
				}).then(function(token) {
					let form = e.target;
					let input = document.createElement('input');
					input.type = 'hidden';
					input.name = 'g-recaptcha-response';
					input.value = token;
					form.appendChild(input);
					form.submit();
				});
			});
		});
	</script>
	<?php
	echo $this->Html->meta('favicon.ico', '/favicon.ico', ['type' => 'icon']);
	echo $this->fetch('meta');
	echo $this->Html->css('default/jquery-ui.min');
	echo $this->Html->css('default/bootstrap.min');
	echo $this->Html->css('default/style');
	echo $this->Html->css('default/font-awesome.min');
	echo $this->Html->css('default/jquery.notifyBar.min');
	?>
	<!--[if lt IE 9]>
		 <?php
			echo $this->Html->script('respond-1.1.0.min');
			echo $this->Html->script('html5shiv');
			echo $this->Html->script('html5element');
			echo $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
	<![endif]-->
</head>

<body>
	<!--Header_section-->
	<header id="header_wrapper">
		<div class="container">
			<div class="header_box">

				<div class="logo">
					<?php echo $this->Html->image('logo_comunidad_sur300.png', ['alt' => 'Comunidad Sur', 'class' => 's-5 l-12 center']); ?>
					<?php //echo $this->Html->image('&.png', ['alt' => 'Comunidad Sur','class'=>'s-5 l-12 center','id'=>'and']);
					?>
					<?php //echo $this->Html->image('logo_ds.png', ['alt' => 'Drogueria Sur S.A.','class'=>'s-5 l-12 center']);
					?>
				</div>
				<nav class="navbar navbar-inverse" role="navigation">
					<div class="navbar-header">
						<button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
					</div>
					<div id="main-nav" class="collapse navbar-collapse navStyle">
						<ul class="nav navbar-nav" id="mainNav">
							<li class="active"><a href="#hero_section" class="scroll-link">Inicio</a></li>
							<!--li><a href="#aboutUs" class="scroll-link"></a></li>
			  <li><a href="#service" class="scroll-link">Servicios</a></li -->
							<!--li><a href="#Portfolio" class="scroll-link">Terminos y Condiciones</a></li-->
							<!-- li><a href="#novedades" class="scroll-link">Novedades</a></li -->
							<li><a href="#contact" class="scroll-link">Contacto</a></li>
						</ul>
					</div>
				</nav>
				</head>
				<div id="mensaje" style="display:none;"> <?= $this->Flash->render('changepass'); ?> </div>
				<?= $this->Form->create(null, ['url' => ['controller' => 'users', 'action' => 'login'], 'name' => 'confirmInput', 'id' => 'loginusers']) ?>
				<div class="input_text_login">
					<div class="input_text_input">
						<?= $this->Form->control('username', ['class' => 'input-text2', 'label' => '', 'type' => 'text', 'value' => 'Usuario *', 'onFocus' => "if(this.value==this.defaultValue)this.value=''", 'onBlur' => "if(this.value=='')this.value=this.defaultValue;"]); ?>
					</div>
					<div class="input_text_input">
						<?= $this->Form->password('password', ['class' => 'input-text2', 'label' => '', 'type' => 'password', 'placeholder' => 'Contraseña *', 'onFocus' => "if(this.value==this.defaultValue)this.value=''", 'onBlur' => "if(this.value=='')this.value=this.defaultValue;", 'onchange' => 'javascript:document.confirmInput.submit();']); ?>
						<?  echo $this->Form->control('remember_me', [
    'type' => 'checkbox'
]);
?>
					</div>	
					<div class="input_text_input">
				
					</div>	
					<div class="input_text_input">
						<?= $this->Form->button('Ingresar', ['class' => 'buttonlogin']) ?>
					</div>
					<?= $this->Form->end(['data-type' => 'hidden']) ?>
				</div>
				<?= $this->Flash->render() ?>
			</div>
		</div>
	</header>
	<!--Header_section-->
	<!--Hero_Section-->
	<section id="hero_section" class="top_cont_outer">
		<div class="hero_wrapper">
			<div class="container">
				<div class="hero_section">
					<div class="row">
						<?php echo $this->element('visualizarimagenes'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Hero_Section-->
	<section id=aboutUs>
		<div class=inner_wrapper>
			<div class=container>
				<h2>La Empresa</h2>
				<div class=inner_section>
					<div class=row>
						<div class="col-lg-6 col-md-6 col-sm-6  col-xs-12 pull-right">
							<p><strong>Identificación con las marcas y comercialización legitima:</strong></p>
							<p class=texto>Comercializamos productos de laboratorios de reconocidas marcas existentes en el mercado, garantizando la autenticidad por adquirirlos exclusivamente de su productor original.</p>
							<br>
							<p><strong>Compromiso real con el ambiente:</strong></p>
							<p class=texto>Trabajamos bajo estrictas normas que aseguren dentro de nuestra actividad, la conservación y preservación del medio ambiente, asumiendo como principio de responsabilidad empresaria la divulgación de toda agresión a los recursos no renovables y al ambiente en si, participando en la cultura y toma de conciencia de toda la población.</p>
							<br>
							<p class=slogan><strong>"PORQUE PENSAMOS DIFERENTE, DESARROLLAMOS VINCULOS CONVINCENTES Y CONTRIBUIMOS A LA VISION ABSOLUTA DEL NEGOCIO. SIMPLEMENTE OFRECEMOS UN SERVICIO INTEGRAL Y PERFECCIONADO, PARA CLIENTES SOFISTICADOS COMPROMETIDOS CON LA EXCELENCIA."</strong> </p>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
							<div class="delay-01s animated fadeInDown wow animated">
								<p class=texto>Somos una droguería integral, de capitales independientes, fundada en el año 1970 en la ciudad de Bahía Blanca, provincia de Buenos Aires.</p>
								<p class=texto>Con flota propia y planta automatizada de 7000m2 ubicada en el corazón céntrico de la ciudad, abastecemos diariamente a 7 provincias:
									Buenos Aires, La Pampa, Neuquén, Rio Negro, Chubut, Santa Cruz y Tierra del Fuego. </p>
								<p class=texto>Contamos con un staff de más de 200 colaboradores que hacen posible que cada día los 1200 clientes activos de la droguería, reciban sus pedidos.</p>
								<p class=texto>Con la misión de brindar un servicio diferente y perfeccionado, distribuimos mensualmente más de 2.000.000 de unidades, recorriendo aproximadamente 163.000 kilómetros lo que equivale a 5 vueltas al mundo.</p>
								<br>
								<p><strong>Integralidad:</strong></p>
								<p class=texto>Comercializamos todos los productos existentes en el mercado, ya sean ambulatorios, otc, tratamientos especiales, oncología, perfumería, accesorios, etc. </p>
								</br>
								<?php //echo $this->Html->image('fondods+cliente.jpg'); //,['width'=>'200px']
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--Aboutus-->
	<!--Service-->
	<section id=service>
		<div class=container>
			<h2>SOBRE NUESTROS SERVICIOS</h2>
			<div class=service_wrapper>
				<div class=row>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-left">
						<p>• Atención personalizada y servicio diseñado a medida.</p>
						<p>• Asesoramiento sobre compras iniciales y mantenimiento de niveles óptimos de stock.</p>
						<p>• Acreditación directa en cuenta corriente de las ventas con tarjeta de crédito/débito. </p>
						<p>• Departamento de Telemarketing para toma de pedidos. </p>
						<p>• Departamento exclusivo para venta de transfers y negocios especiales.</p>

					</div>

					<?php /*echo '<div style="  display: flex;
  
  
  height: 100%;
  justify-content: center;
  align-items: center;">'.$this->Html->image('COMUNIDAD-SUR.png',['data-u'=>'image']).'</div>';*/ ?>


					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
						<p>• Emisión mensual de revista con contenido de ofertas e información de interés general.</p>
						<p>• Entregas diarias a 160 localidades.</p>
						<p>• Sitio de E-commerce perfeccionado, intuitivo y amigable.</p>
						<p>• Amplia disponibilidad de stock. </p>
						<p>• Club de beneficios Comunidad Sur: canje de puntos por premios.</p>


					</div>

				</div>
			</div>
		</div>
	</section>
	<!--Footer-->
	<footer class="footer_wrapper" id="contact">
		<div class="container">
			<section class="page_section contact" id="contact">
				<div class="contact_section">
					<h2>Contactenos</h2>
				</div>
				<div class="row">
					<div class="col-lg-12 wow fadeInLeft delay-06s">
					<?= $this->Form->create(null, ['url' => ['controller' => 'contactos', 'action' => 'enviar-mail'],'id' => 'demo-form']) ?>
						<?php
						/*$opciones = ['Departamento de Cobranzas','Departamento de Ventas','Departamento de Compras','Departamento de Patagonia Med','Departamento de Perfumeria','Departamento de Sistemas'];
			echo $this->Form->select('departamento',$opciones,['class'=>'input-text']);*/
						echo $this->Form->control('nombre', ['class' => 'input-text', 'placeholder' => 'Nombre *']);
						echo $this->Form->control('telefono', ['class' => 'input-text', 'placeholder' => 'Telefono *']);
						echo $this->Form->control('email', ['class' => 'input-text', 'placeholder' => 'Email *', 'type' => 'email']);
						echo $this->Form->textarea('detalle', ['class' => 'input-text text-area', 'placeholder' => 'Detalle *', 'type' => 'text']);

						echo $this->Form->button(__('Enviar mensaje'), ['class' => 'input-btn ']);
						echo "</form>";
						?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="member wow bounceInUp animated">
						<div class="member-container" data-wow-delay=".1s">
							<div class="inner-container">
								<div class="contacto">
									Villarino 46/58 (B8000JIB) </br>Bahía Blanca - Buenos Aires</br>(0291) 485 3077 </br>
									<a href="mailto:sursa@drogueriasur.com.ar">sursa@drogueriasur.com.ar</a> </br>
								</div></br>
								<h4>Call Center – Clientes de Droguería Sur SA </h4>
								<h5>Línea General: (0291) 485 3077</br>
									Línea Alternativa: (0291) 456 3333 / 455 2247 / 456 4533 </br>
								</h5></br>
								<h4>Horarios:</h4>
								Lunes a Viernes de 8 a 21 hs. </br>
							</div><!-- /.inner-container -->
						</div><!-- /.member-container -->
					</div><!-- /.member -->
				</div>
				<div class="col-md-6">
					<div class="member wow bounceInUp animated">
						<div class="member-container" data-wow-delay=".1s">
							<div class="inner-container">
								<div class="map_drog">
									<div id="map" class="map-holder" style="height: 350px"></div>
								</div>
							</div><!-- /.inner-container -->
						</div><!-- /.member-container -->
					</div><!-- /.member -->
				</div>
			</section>
		</div>
		<div class="container">
			<div class="footer_bottom"><span>Droguería Sur SA © <?php echo date("o"); ?> . Villarino 46/58 (B8000JIB) - Bahía Blanca - Buenos Aires </span> </div>
		</div>
	</footer>
	<?php

	echo $this->Html->script('default/jquery-1.11.3');
	echo $this->Html->script('default/jquery-ui.min');
	echo $this->Html->script('default/bootstrap.min');
	//echo $this->Html->script('default/jquery-scrolltofixed.min');
	echo $this->Html->script('default/jquery.nav.min');
	echo $this->Html->script('default/jquery.easing.1.3.min');
	echo $this->Html->script('default/jquery.isotope.min');
	echo $this->Html->script('default/wow.min');
	//echo $this->Html->script('default/custom2');
	echo $this->Html->script('default/bjqs-1.3.min');
	echo $this->Html->script('default/jquery.notifyBar.min');


	?>
	<script type="text/javascript">
		$(function() {
			var UI = document.getElementById('flashmensajesuccess');
			if (UI != null) {
				if (UI.innerHTML != '') {
					$.notifyBar({
						cssClass: "success",
						html: UI.innerHTML,
						position: "bottom"
					});
				}
			}
			var UI2 = document.getElementById('flashmensajeerror');
			if (UI2 != null) {
				if (UI2.innerHTML != '') {
					$.notifyBar({
						cssClass: "error",
						html: UI2.innerHTML,
						close: true,
						closeOnClick: false
					});
				}
			}
			var UI3 = document.getElementById('flashmensajewarning');
			if (UI3 != null) {
				if (UI3.innerHTML != '') {
					$.notifyBar({
						cssClass: "warning",
						html: UI3.innerHTML
					});
				}
			}
		});
		//jQuery(function($){$('.first-map, .map-holder').gmap3({marker:{address: '-38.723229,-62.261543'},map:{options:{zoom: 15,scrollwheel: false,streetViewControl : true}}});});
	</script>




	<script>
		jQuery('.creload').on('click', function() {
			var mySrc = $(this).prev().attr('src');
			var glue = '?';
			if (mySrc.indexOf('?') != -1) {
				glue = '&';
			}
			$(this).prev().attr('src', mySrc + glue + new Date().getTime());
			return false;
		});
	</script>
	<script>
		var map;

		function initMap() {
			var ds = {
				lat: -38.723238,
				lng: -62.261702
			};

			map = new google.maps.Map(document.getElementById('map'), {
				zoom: 15,
				center: ds
			});
			var marker = new google.maps.Marker({
				position: ds,
				map: map
			});
		}
	</script>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7qyT3xCgctQneZKp3RFwHRS8zV0IA2bo&callback=initMap">
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->

	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-QPBS0E526D');
	</script>

</body>

</html>