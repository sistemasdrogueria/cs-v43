<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Cliente[]|\Cake\Collection\CollectionInterface $clientes
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Localidads'), ['controller' => 'Localidads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Localidad'), ['controller' => 'Localidads', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Canjes'), ['controller' => 'Canjes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Canje'), ['controller' => 'Canjes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Historiales'), ['controller' => 'Historiales', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Historiale'), ['controller' => 'Historiales', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sucursals'), ['controller' => 'Sucursals', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Sucursal'), ['controller' => 'Sucursals', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientes index large-9 medium-8 columns content">
    <h3><?= __('Clientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('razon_social') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cuit') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo_postal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('provincia_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('localidad_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('telefono') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tienesucursal') ?></th>
                <th scope="col"><?= $this->Paginator->sort('representante_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email_alternativo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clave_pedidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('codigo_pedidos') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ofertaxmail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('respuestaxmail') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clacli') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gln') ?></th>
                <th scope="col"><?= $this->Paginator->sort('grupo_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('habilitado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('eliminado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actualizo_correo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= $this->Number->format($cliente->id) ?></td>
                <td><?= $this->Number->format($cliente->codigo) ?></td>
                <td><?= h($cliente->razon_social) ?></td>
                <td><?= h($cliente->cuit) ?></td>
                <td><?= h($cliente->nombre) ?></td>
                <td><?= h($cliente->codigo_postal) ?></td>
                <td><?= $cliente->has('provincia') ? $this->Html->link($cliente->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $cliente->provincia->id]) : '' ?></td>
                <td><?= $cliente->has('localidad') ? $this->Html->link($cliente->localidad->id, ['controller' => 'Localidads', 'action' => 'view', $cliente->localidad->id]) : '' ?></td>
                <td><?= h($cliente->telefono) ?></td>
                <td><?= h($cliente->tienesucursal) ?></td>
                <td><?= $this->Number->format($cliente->representante_id) ?></td>
                <td><?= h($cliente->email) ?></td>
                <td><?= h($cliente->email_alternativo) ?></td>
                <td><?= $this->Number->format($cliente->clave_pedidos) ?></td>
                <td><?= $this->Number->format($cliente->codigo_pedidos) ?></td>
                <td><?= h($cliente->ofertaxmail) ?></td>
                <td><?= h($cliente->respuestaxmail) ?></td>
                <td><?= h($cliente->clacli) ?></td>
                <td><?= h($cliente->gln) ?></td>
                <td><?= $this->Number->format($cliente->grupo_id) ?></td>
                <td><?= $this->Number->format($cliente->habilitado) ?></td>
                <td><?= $this->Number->format($cliente->eliminado) ?></td>
                <td><?= $this->Number->format($cliente->actualizo_correo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cliente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cliente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?>
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
