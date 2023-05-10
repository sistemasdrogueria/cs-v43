<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $this->Html->meta('favicon.ico','/favicon.ico', ['type' => 'icon']);?>
	<title>PANEL COMUNIDAD SUR </title>
    <!-- Bootstrap -->
  <?= $this->Html->css('vendors/bootstrap/dist/css/bootstrap.min');?>
    <!-- Font Awesome -->
  <?= $this->Html->css('vendors/font-awesome/css/font-awesome.min');?>
    <!-- NProgress -->
  <?= $this->Html->css('vendors/nprogress/nprogress');?>
    <!-- iCheck -->
  <?= $this->Html->css('vendors/iCheck/skins/flat/green');?>
    <!-- bootstrap-progressbar -->
  <?= $this->Html->css('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min');?>
    <!-- bootstrap-daterangepicker -->
  <?= $this->Html->css('vendors/bootstrap-daterangepicker/daterangepicker');?>
    <!-- Custom Theme Style -->
  <?= $this->Html->css('build/css/custom.min');?>
  <?= $this->Html->css('vendors/dropzone/dist/min/dropzone.min');?>
 
 </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div  style="border: 0;">
              
             <a class="site_title"> <?php echo $this->Html->image('logo_comunidad.png', ['width'=>'30px', 'alt' => 'Comunidad Sur']);?><span> Comunidad Sur</span></a>
			 <!--class="navbar nav_title" -->
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
               
				  <?php echo $this->Html->image("admin/img.jpg", ['alt' =>'..', 'class'=>'img-circle profile_img']); ?>
              </div>
              <div class="profile_info">		  
                <span>Bienvenido,</span>
                <h2><?php echo $this->request->getSession()->read('User.username')?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
		          <li>
				  	<?= $this->Html->link(
					$this->Html->tag('i', '', ['class' => 'fa fa-gift']).'Beneficios', 
					['controller' => 'Beneficios', 'action' => 'index_admin'],
					['escape'=>false])?>
				  
                
                  </li>
                  <li>
				  <?= $this->Html->link(
					$this->Html->tag('i', '', ['class' => 'fa fa-shopping-cart']).'Canjes'.$this->Html->tag('span', '', ['class' => 'fa ']), 
					['controller' => 'Canjes', 'action' => 'index_admin'],
					['escape'=>false])?>
				  
                    <!--ul class="nav child_menu">
					  <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Canjes', 'action' => 'index_admin']) ?></li>                 
                    </ul-->
                  </li>
				   <li>
				     <?= $this->Html->link(
					$this->Html->tag('i', '', ['class' => 'fa fa-users']).'Usuarios', 
					['controller' => 'Users', 'action' => 'index_admin'],
					['escape'=>false])?>
				 
    
                  </li>
                  <li>
				   <?= $this->Html->link(
					$this->Html->tag('i', '', ['class' => 'fa fa-briefcase']).'Clientes'.$this->Html->tag('span', '', ['class' => 'fa fa-chevron-down']), 
					['controller' => 'Clientes', 'action' => 'index_admin'],
					['escape'=>false])?>
                    <ul class="nav child_menu">
                      <li><?= $this->Html->link(__('Movimientos'), ['controller' => 'Movimientos', 'action' => 'index_admin']) ?> </li>
                      <li><?= $this->Html->link(__('Puntos'), ['controller' => 'Puntos', 'action' => 'index_admin']) ?> </li>
					  <li><?= $this->Html->link(__('Visualizar'), ['controller' => 'Clientes', 'action' => 'index_admin']) ?> </li>
                      
                    </ul>
                  </li>
                  <li>
				   <?= $this->Html->link(
					$this->Html->tag('i', '', ['class' => 'fa fa-newspaper-o']).'Novedades', 
					['controller' => 'Novedades', 'action' => 'index_admin'],
					['escape'=>false])?>
           
                  </li>
				  <li>
				     <?= $this->Html->link(
					$this->Html->tag('i', '', ['class' => 'fa fa-gears']).'Equivalencias'.$this->Html->tag('span', '', ['class' => 'fa']), 
					['controller' => 'Equivalencias', 'action' => 'index_admin'],
					['escape'=>false])?>
				 
                   
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Configuración">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
			  <?= $this->Html->link(
			  $this->Html->tag('span', '', ['class' => 'glyphicon glyphicon-off', 'aria-hidden'=>'true']), 
			  ['controller' => 'Users', 'action' => 'logout'],
			  ['data-toggle'=>'tooltip' ,'data-placement'=>'top' ,'title'=>'Salir','escape'=>false]) ?>
			  <!-- a data-toggle="tooltip" data-placement="top" title="Salir" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a -->
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                   <?php echo $this->Html->image("admin/img.jpg", ['alt' =>'..']); ?>
				   <?php echo $this->request->getSession()->read('User.username')?>
                   <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Cuenta</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configuracion</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ayuda</a></li>
                    <li>
					  <?= $this->Html->link(
					  $this->Html->tag('i', '', ['class' => 'fa fa-sign-out pull-right']).'Salir', 
					  ['controller' => 'Users', 'action' => 'logout'],
					  ['title'=>'Salir','escape'=>false]) ?>
					
					<!--a href="../users/logout"><i class="fa fa-sign-out pull-right"></i> Salir</a-->
					
					</li>
					
					
                  </ul>
                </li>
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image">
						<?php echo $this->Html->image("admin/img.jpg", ['alt' =>'Profile Image.']); ?>
						</span>
                        <span>
                          <span><?php echo $this->request->getSession()->read('User.username')?></span>
                          <span class="time"><?php //echo now(); ?></span>
                        </span>
                        <span class="message">
                         Mensaje de notificacion de alguna novedad.
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Todas las alertas</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Usuarios</span>
              <div class="count">0</div>
              <span class="count_bottom"><i class="green">0% </i> En total <span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Total Clientes</span>
              <div class="count">0</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>0% </i> En total</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Beneficios</span>
              <div class="count green">0</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>0% </i> La ultima semana</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Puntos</span>
              <div class="count">0</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>0% </i> La ultima semana</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Canjes</span>
              <div class="count">0</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>0% </i> La ultima semana</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Ingresos</span>
              <div class="count">0</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>0% </i> La ultima semana</span>
            </div>
          </div>
          <!-- /top tiles -->
			<div id="mensaje" style="display:none;">
				<?= $this->Flash->render('changepass'); ?>		
			</div>
            <div class="row">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Copyright © <?php echo date("o"); ?> Droguería Sur.
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <?= $this->Html->script('vendors/jquery/dist/jquery.min');?>
    <!-- Bootstrap -->
    <?= $this->Html->script('vendors/bootstrap/dist/js/bootstrap.min');?>
    <!-- FastClick -->
    <?= $this->Html->script('vendors/fastclick/lib/fastclick');?>
    <!-- NProgress -->
    <?= $this->Html->script('vendors/nprogress/nprogress');?>
    <!-- Chart.js -->
    <?= $this->Html->script('vendors/Chart.js/dist/Chart.min');?>
    <!-- gauge.js -->
    <?= $this->Html->script('vendors/gauge.js/dist/gauge.min');?>
    <!-- bootstrap-progressbar -->
    <?= $this->Html->script('vendors/bootstrap-progressbar/bootstrap-progressbar.min');?>
    <!-- iCheck -->
    <?= $this->Html->script('vendors/iCheck/icheck.min');?>
    <!-- Skycons -->
    <?= $this->Html->script('vendors/skycons/skycons');?>
    <!-- Flot -->
    <?= $this->Html->script('vendors/Flot/jquery.flot');?>
    <?= $this->Html->script('vendors/Flot/jquery.flot.pie');?>
    <?= $this->Html->script('vendors/Flot/jquery.flot.time');?>
    <?= $this->Html->script('vendors/Flot/jquery.flot.stack');?>
    <?= $this->Html->script('vendors/Flot/jquery.flot.resize');?>
    <!-- Flot plugins -->
    <?= $this->Html->script('vendors/flot.orderbars/js/jquery.flot.orderBars');?>
    <?= $this->Html->script('vendors/flot-spline/js/jquery.flot.spline.min');?>
    <?= $this->Html->script('vendors/flot.curvedlines/curvedLines');?>
    <!-- DateJS -->
    <?= $this->Html->script('vendors/DateJS/build/date');?>
    <!-- bootstrap-daterangepicker -->
    <?= $this->Html->script('vendors/moment/min/moment.min');?>
	<?= $this->Html->script('es');?>
	

    <?= $this->Html->script('vendors/bootstrap-daterangepicker/daterangepicker');?>
    <!-- Custom Theme Scripts -->
		<?= $this->Html->css('jquery.notifyBar');?>
		<?= $this->Html->script('jquery.notifyBar');?>
		
    <?= $this->Html->script('build/js/custom.min');?>	
	 
  	<!-- ?= $this->Html->script('vendors/dropzone/dist/min/dropzone.min');?-->
    <!-- bootstrap-datetimepicker -->    
    <?= $this->Html->script('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min');?>
	
	 <script>
    $('#fecha').datetimepicker({
        format: "DD/MM/YYYY"
    });
	/*
	 $('#fecha_desde').datetimepicker({
        format: "DD/MM/YYYY"
    });*/
	 $('#fecha_hasta').datetimepicker({
        format: "DD/MM/YYYY"
    });
	
	$("#fecha_desde").datetimepicker({
		format: "DD/MM/YYYY"
		});
		
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

  </body>
</html>
