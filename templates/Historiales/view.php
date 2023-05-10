<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Historiale $historiale
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Historiale'), ['action' => 'edit', $historiale->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Historiale'), ['action' => 'delete', $historiale->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historiale->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Historiales'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Historiale'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="historiales view large-9 medium-8 columns content">
    <h3><?= h($historiale->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $historiale->has('cliente') ? $this->Html->link($historiale->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $historiale->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($historiale->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($historiale->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Canjeado') ?></th>
            <td><?= $this->Number->format($historiale->cantidad_canjeado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Eliminado') ?></th>
            <td><?= $this->Number->format($historiale->eliminado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Vencimiento') ?></th>
            <td><?= h($historiale->fecha_vencimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($historiale->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($historiale->modificado) ?></td>
        </tr>
    </table>
</div>
