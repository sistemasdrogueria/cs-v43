<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Beneficio[]|\Cake\Collection\CollectionInterface $beneficios
  */
?>
<section class="s-12 m-8 l-10 right">
	<h3 style="text-align: center;">Beneficios</h3>
	<br>
	<?php echo $this->element('result_sort'); ?>			
	<?php echo $this->element('result_beneficio'); ?>
</section>
<aside class="s-12 m-4 l-2">
	<?php echo $this->element('categorias'); ?>
</aside>