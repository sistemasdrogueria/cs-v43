  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
				    <h2><?= $titulo ?><small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                      <li>
		  <?= $this->Html->link(
					$this->Html->tag('span', '', ['class' => 'fa fa-plus']), 
					['controller' => 'Users', 'action' => 'add_admin'],
					['escape'=>false])?>
		</li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
		</div>
		<div class="x_content">
		<?php echo $this->element('search_user_admin'); ?>
		<?php echo $this->element('result_user_admin'); ?>
		</div> 
</div>		 
</div>		

