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
                ['action' => 'delete', $contacto->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contacto->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contactos'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="contactos form large-9 medium-8 columns content">
    <?= $this->Form->create($contacto) ?>
    <fieldset>
        <legend><?= __('Edit Contacto') ?></legend>
        <?php
            echo $this->Form->control('nombre');
            echo $this->Form->control('email');
            echo $this->Form->control('telefono');
            echo $this->Form->control('detalle');
            echo $this->Form->control('departamento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
