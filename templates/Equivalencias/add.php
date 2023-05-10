<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Equivalencias'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="equivalencias form large-9 medium-8 columns content">
    <?= $this->Form->create($equivalencia) ?>
    <fieldset>
        <legend><?= __('Add Equivalencia') ?></legend>
        <?php
            echo $this->Form->control('identificacion');
            echo $this->Form->control('volumen');
            echo $this->Form->control('conversion');
            echo $this->Form->control('creado', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
