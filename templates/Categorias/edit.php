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
                ['action' => 'delete', $categoria->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Beneficios'), ['controller' => 'Beneficios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Beneficio'), ['controller' => 'Beneficios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorias form large-9 medium-8 columns content">
    <?= $this->Form->create($categoria) ?>
    <fieldset>
        <legend><?= __('Edit Categoria') ?></legend>
        <?php
            echo $this->Form->control('nombre');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
