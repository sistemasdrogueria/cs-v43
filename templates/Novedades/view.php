<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Novedade $novedade
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Novedade'), ['action' => 'edit', $novedade->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Novedade'), ['action' => 'delete', $novedade->id], ['confirm' => __('Are you sure you want to delete # {0}?', $novedade->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Novedades'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Novedade'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="novedades view large-9 medium-8 columns content">
    <h3><?= h($novedade->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Titulo') ?></th>
            <td><?= h($novedade->titulo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= h($novedade->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Img File') ?></th>
            <td><?= h($novedade->img_file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($novedade->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Importante') ?></th>
            <td><?= $this->Number->format($novedade->importante) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($novedade->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($novedade->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Interno') ?></th>
            <td><?= $novedade->interno ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Activo') ?></th>
            <td><?= $novedade->activo ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($novedade->descripcion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descripcion Completa') ?></h4>
        <?= $this->Text->autoParagraph(h($novedade->descripcion_completa)); ?>
    </div>
</div>
