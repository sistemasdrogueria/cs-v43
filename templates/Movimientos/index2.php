<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Movimiento[]|\Cake\Collection\CollectionInterface $movimientos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Movimiento'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="movimientos index large-9 medium-8 columns content">
    <h3><?= __('Movimientos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('concepto') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tipo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_vencimiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad_disponible') ?></th>
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('eliminado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($movimientos as $movimiento): ?>
            <tr>
                <td><?= $this->Number->format($movimiento->id) ?></td>
                <td><?= $movimiento->has('cliente') ? $this->Html->link($movimiento->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $movimiento->cliente->id]) : '' ?></td>
                <td><?= h($movimiento->concepto) ?></td>
                <td><?= $this->Number->format($movimiento->tipo) ?></td>
                <td><?= $this->Number->format($movimiento->cantidad) ?></td>
                <td><?= h($movimiento->fecha) ?></td>
                <td><?= h($movimiento->fecha_vencimiento) ?></td>
                <td><?= $this->Number->format($movimiento->cantidad_disponible) ?></td>
                <td><?= h($movimiento->creado) ?></td>
                <td><?= h($movimiento->modificado) ?></td>
                <td><?= $this->Number->format($movimiento->eliminado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $movimiento->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $movimiento->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $movimiento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $movimiento->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
