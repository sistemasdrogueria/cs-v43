<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Beneficio $beneficio
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Beneficio'), ['action' => 'edit', $beneficio->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Beneficio'), ['action' => 'delete', $beneficio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $beneficio->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Beneficios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Beneficio'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Canjes'), ['controller' => 'Canjes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canje'), ['controller' => 'Canjes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="beneficios view large-9 medium-8 columns content">
    <h3><?= h($beneficio->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Descripcion') ?></th>
            <td><?= h($beneficio->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Categoria') ?></th>
            <td><?= $beneficio->has('categoria') ? $this->Html->link($beneficio->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $beneficio->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($beneficio->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cantidad Maxima') ?></th>
            <td><?= $this->Number->format($beneficio->cantidad_maxima) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Puntos') ?></th>
            <td><?= $this->Number->format($beneficio->puntos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Desde') ?></th>
            <td><?= h($beneficio->fecha_desde) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Hasta') ?></th>
            <td><?= h($beneficio->fecha_hasta) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Creado') ?></th>
            <td><?= h($beneficio->creado) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Canjes') ?></h4>
        <?php if (!empty($beneficio->canjes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Int') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Beneficio Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Cantidad Puntos') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($beneficio->canjes as $canjes): ?>
            <tr>
                <td><?= h($canjes->int) ?></td>
                <td><?= h($canjes->fecha) ?></td>
                <td><?= h($canjes->beneficio_id) ?></td>
                <td><?= h($canjes->cliente_id) ?></td>
                <td><?= h($canjes->cantidad_puntos) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Canjes', 'action' => 'view', $canjes->int]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Canjes', 'action' => 'edit', $canjes->int]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Canjes', 'action' => 'delete', $canjes->int], ['confirm' => __('Are you sure you want to delete # {0}?', $canjes->int)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
