<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $beneficio->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $beneficio->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Beneficios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Canjes'), ['controller' => 'Canjes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Canje'), ['controller' => 'Canjes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="beneficios form large-9 medium-8 columns content">
    <?= $this->Form->create($beneficio) ?>
    <fieldset>
        <legend><?= __('Edit Beneficio') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('descripcion');
            echo $this->Form->control('categoria_id', ['options' => $categorias, 'empty' => true]);
            echo $this->Form->control('cantidad_maxima');
            echo $this->Form->control('puntos');
            echo $this->Form->control('imagen');
            echo $this->Form->control('imagen2');
            echo $this->Form->control('imagen3');
            echo $this->Form->control('fecha_desde', ['empty' => true]);
            echo $this->Form->control('fecha_hasta', ['empty' => true]);
            echo $this->Form->control('creado', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
