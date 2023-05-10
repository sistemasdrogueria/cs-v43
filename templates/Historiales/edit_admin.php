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
                ['action' => 'delete', $historiale->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $historiale->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Historiales'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="historiales form large-9 medium-8 columns content">
    <?= $this->Form->create($historiale) ?>
    <fieldset>
        <legend><?= __('Edit Historiale') ?></legend>
        <?php
            echo $this->Form->control('cliente_id', ['options' => $clientes, 'empty' => true]);
            echo $this->Form->control('cantidad');
            echo $this->Form->control('fecha_vencimiento', ['empty' => true]);
            echo $this->Form->control('cantidad_canjeado');
            echo $this->Form->control('eliminado');
            echo $this->Form->control('creado', ['empty' => true]);
            echo $this->Form->control('modificado', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
