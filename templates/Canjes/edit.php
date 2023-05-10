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
                ['action' => 'delete', $canje->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $canje->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Canjes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Beneficios'), ['controller' => 'Beneficios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Beneficio'), ['controller' => 'Beneficios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="canjes form large-9 medium-8 columns content">
    <?= $this->Form->create($canje) ?>
    <fieldset>
        <legend><?= __('Edit Canje') ?></legend>
        <?php
            echo $this->Form->control('fecha', ['empty' => true]);
            echo $this->Form->control('beneficio_id', ['options' => $beneficios, 'empty' => true]);
            echo $this->Form->control('cliente_id', ['options' => $clientes, 'empty' => true]);
            echo $this->Form->control('cantidad_puntos');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
