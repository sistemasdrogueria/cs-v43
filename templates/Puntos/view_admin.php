<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Punto $punto
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Punto'), ['action' => 'edit', $punto->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Punto'), ['action' => 'delete', $punto->id], ['confirm' => __('Are you sure you want to delete # {0}?', $punto->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Puntos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punto'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="puntos view large-9 medium-8 columns content">
    <h3><?= h($punto->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $punto->has('cliente') ? $this->Html->link($punto->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $punto->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($punto->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Disponible') ?></th>
            <td><?= $this->Number->format($punto->cantidad_disponible) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modificado') ?></th>
            <td><?= h($punto->modificado) ?></td>
        </tr>
    </table>
</div>
