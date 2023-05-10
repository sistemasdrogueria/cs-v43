<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Movimiento $movimiento
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Movimiento'), ['action' => 'edit', $movimiento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Movimiento'), ['action' => 'delete', $movimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movimiento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Movimientos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Movimiento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="movimientos view large-9 medium-8 columns content">
    <h3><?= h($movimiento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $movimiento->has('cliente') ? $this->Html->link($movimiento->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $movimiento->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Concepto') ?></th>
            <td><?= h($movimiento->concepto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($movimiento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tipo') ?></th>
            <td><?= $this->Number->format($movimiento->tipo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($movimiento->cantidad) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Disponible') ?></th>
            <td><?= $this->Number->format($movimiento->cantidad_disponible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Eliminado') ?></th>
            <td><?= $this->Number->format($movimiento->eliminado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($movimiento->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Vencimiento') ?></th>
            <td><?= h($movimiento->fecha_vencimiento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($movimiento->creado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($movimiento->modificado) ?></td>
        </tr>
    </table>
</div>
