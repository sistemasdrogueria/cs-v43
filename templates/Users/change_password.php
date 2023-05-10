<section class="s-12 m-12 l-12 center">
	<h3 style="text-align: center;">Cambiar Contraseña</h3>
	<br>
	<div class="s-6 m-6 l-6 center" >
	<?= $this->Form->create(null,['url'=>['controller'=>'Users','action'=>'change_password']]); ?>
	
		
			<div class="cliente_info">
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td class="label_user">Contraseña Actual</td>
						<td>
						<?php echo $this->Form->control('username', ['value' => $this->request->getSession()->read('User.username'),'type'=>'hidden']);?>
						<?php echo $this->Form->password('password');?></td>
					</tr>	
					<tr>
						<td class="label_user">Contraseña Nueva</td>
						<td><?php echo $this->Form->password('current_password');?></td>
					</tr>
					<tr>
						<td class="label_user">Confirme Contraseña</td>
						<td><?php echo $this->Form->password('confirm_new_password');?></td>
					</tr>	
				</table>			
			</div>
		
		<br>
		<div class="customform s-12 margin-bottom2x">
			  
			   <?= $this->Form->submit('Guardar',['class'=>'button rounded-btn submit-btn s-12']) ?>
		</div>
</div>
<?= $this->Form->end() ?>
</section>
