<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Localidad $localidad
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Localidad'), ['action' => 'edit', $localidad->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Localidad'), ['action' => 'delete', $localidad->id], ['confirm' => __('Are you sure you want to delete # {0}?', $localidad->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Localidads'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Localidad'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sucursals'), ['controller' => 'Sucursals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sucursal'), ['controller' => 'Sucursals', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="localidads view large-9 medium-8 columns content">
    <h3><?= h($localidad->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($localidad->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= h($localidad->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provincia') ?></th>
            <td><?= $localidad->has('provincia') ? $this->Html->link($localidad->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $localidad->provincia->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($localidad->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Clientes') ?></h4>
        <?php if (!empty($localidad->clientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Codigo') ?></th>
                <th scope="col"><?= __('Razon Social') ?></th>
                <th scope="col"><?= __('Cuit') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Codigo Postal') ?></th>
                <th scope="col"><?= __('Domicilio') ?></th>
                <th scope="col"><?= __('Provincia Id') ?></th>
                <th scope="col"><?= __('Localidad Id') ?></th>
                <th scope="col"><?= __('Telefono') ?></th>
                <th scope="col"><?= __('Tienesucursal') ?></th>
                <th scope="col"><?= __('Representante Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Email Alternativo') ?></th>
                <th scope="col"><?= __('Clave Pedidos') ?></th>
                <th scope="col"><?= __('Codigo Pedidos') ?></th>
                <th scope="col"><?= __('Ofertaxmail') ?></th>
                <th scope="col"><?= __('Respuestaxmail') ?></th>
                <th scope="col"><?= __('Clacli') ?></th>
                <th scope="col"><?= __('Gln') ?></th>
                <th scope="col"><?= __('Grupo Id') ?></th>
                <th scope="col"><?= __('Habilitado') ?></th>
                <th scope="col"><?= __('Eliminado') ?></th>
                <th scope="col"><?= __('Actualizo Correo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($localidad->clientes as $clientes): ?>
            <tr>
                <td><?= h($clientes->id) ?></td>
                <td><?= h($clientes->codigo) ?></td>
                <td><?= h($clientes->razon_social) ?></td>
                <td><?= h($clientes->cuit) ?></td>
                <td><?= h($clientes->nombre) ?></td>
                <td><?= h($clientes->codigo_postal) ?></td>
                <td><?= h($clientes->domicilio) ?></td>
                <td><?= h($clientes->provincia_id) ?></td>
                <td><?= h($clientes->localidad_id) ?></td>
                <td><?= h($clientes->telefono) ?></td>
                <td><?= h($clientes->tienesucursal) ?></td>
                <td><?= h($clientes->representante_id) ?></td>
                <td><?= h($clientes->email) ?></td>
                <td><?= h($clientes->email_alternativo) ?></td>
                <td><?= h($clientes->clave_pedidos) ?></td>
                <td><?= h($clientes->codigo_pedidos) ?></td>
                <td><?= h($clientes->ofertaxmail) ?></td>
                <td><?= h($clientes->respuestaxmail) ?></td>
                <td><?= h($clientes->clacli) ?></td>
                <td><?= h($clientes->gln) ?></td>
                <td><?= h($clientes->grupo_id) ?></td>
                <td><?= h($clientes->habilitado) ?></td>
                <td><?= h($clientes->eliminado) ?></td>
                <td><?= h($clientes->actualizo_correo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Clientes', 'action' => 'view', $clientes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Clientes', 'action' => 'edit', $clientes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Clientes', 'action' => 'delete', $clientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $clientes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sucursals') ?></h4>
        <?php if (!empty($localidad->sucursals)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Razon Social') ?></th>
                <th scope="col"><?= __('Cuit') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col"><?= __('Codigo Postal') ?></th>
                <th scope="col"><?= __('Domicilio') ?></th>
                <th scope="col"><?= __('Provincia Id') ?></th>
                <th scope="col"><?= __('Localidad Id') ?></th>
                <th scope="col"><?= __('Telefono') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Email Alternativo') ?></th>
                <th scope="col"><?= __('Ofertaxmail') ?></th>
                <th scope="col"><?= __('Respuestaxmail') ?></th>
                <th scope="col"><?= __('Numero') ?></th>
                <th scope="col"><?= __('Habilitado') ?></th>
                <th scope="col"><?= __('Gln') ?></th>
                <th scope="col"><?= __('Eliminado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($localidad->sucursals as $sucursals): ?>
            <tr>
                <td><?= h($sucursals->id) ?></td>
                <td><?= h($sucursals->cliente_id) ?></td>
                <td><?= h($sucursals->razon_social) ?></td>
                <td><?= h($sucursals->cuit) ?></td>
                <td><?= h($sucursals->nombre) ?></td>
                <td><?= h($sucursals->codigo_postal) ?></td>
                <td><?= h($sucursals->domicilio) ?></td>
                <td><?= h($sucursals->provincia_id) ?></td>
                <td><?= h($sucursals->localidad_id) ?></td>
                <td><?= h($sucursals->telefono) ?></td>
                <td><?= h($sucursals->email) ?></td>
                <td><?= h($sucursals->email_alternativo) ?></td>
                <td><?= h($sucursals->ofertaxmail) ?></td>
                <td><?= h($sucursals->respuestaxmail) ?></td>
                <td><?= h($sucursals->numero) ?></td>
                <td><?= h($sucursals->habilitado) ?></td>
                <td><?= h($sucursals->gln) ?></td>
                <td><?= h($sucursals->eliminado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sucursals', 'action' => 'view', $sucursals->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sucursals', 'action' => 'edit', $sucursals->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sucursals', 'action' => 'delete', $sucursals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sucursals->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
