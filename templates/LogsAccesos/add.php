<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Logs Accesos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="logsAccesos form large-9 medium-8 columns content">
    <?= $this->Form->create($logsAcceso) ?>
    <fieldset>
        <legend><?= __('Add Logs Acceso') ?></legend>
        <?php
            echo $this->Form->control('fecha', ['empty' => true]);
            echo $this->Form->control('users_id');
            echo $this->Form->control('ip');
            echo $this->Form->control('super');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
