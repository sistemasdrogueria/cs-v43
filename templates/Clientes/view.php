<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Cliente $cliente
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Provincias'), ['controller' => 'Provincias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provincia'), ['controller' => 'Provincias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Localidads'), ['controller' => 'Localidads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Localidad'), ['controller' => 'Localidads', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Canjes'), ['controller' => 'Canjes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Canje'), ['controller' => 'Canjes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Historiales'), ['controller' => 'Historiales', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Historiale'), ['controller' => 'Historiales', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Puntos'), ['controller' => 'Puntos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Punto'), ['controller' => 'Puntos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sucursals'), ['controller' => 'Sucursals', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Sucursal'), ['controller' => 'Sucursals', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="clientes view large-9 medium-8 columns content">
    <h3><?= h($cliente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Razon Social') ?></th>
            <td><?= h($cliente->razon_social) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cuit') ?></th>
            <td><?= h($cliente->cuit) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($cliente->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo Postal') ?></th>
            <td><?= h($cliente->codigo_postal) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Provincia') ?></th>
            <td><?= $cliente->has('provincia') ? $this->Html->link($cliente->provincia->id, ['controller' => 'Provincias', 'action' => 'view', $cliente->provincia->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Localidad') ?></th>
            <td><?= $cliente->has('localidad') ? $this->Html->link($cliente->localidad->id, ['controller' => 'Localidads', 'action' => 'view', $cliente->localidad->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Telefono') ?></th>
            <td><?= h($cliente->telefono) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($cliente->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email Alternativo') ?></th>
            <td><?= h($cliente->email_alternativo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clacli') ?></th>
            <td><?= h($cliente->clacli) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gln') ?></th>
            <td><?= h($cliente->gln) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($cliente->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo') ?></th>
            <td><?= $this->Number->format($cliente->codigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Representante Id') ?></th>
            <td><?= $this->Number->format($cliente->representante_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Clave Pedidos') ?></th>
            <td><?= $this->Number->format($cliente->clave_pedidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Codigo Pedidos') ?></th>
            <td><?= $this->Number->format($cliente->codigo_pedidos) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Grupo Id') ?></th>
            <td><?= $this->Number->format($cliente->grupo_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Habilitado') ?></th>
            <td><?= $this->Number->format($cliente->habilitado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Eliminado') ?></th>
            <td><?= $this->Number->format($cliente->eliminado) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actualizo Correo') ?></th>
            <td><?= $this->Number->format($cliente->actualizo_correo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tienesucursal') ?></th>
            <td><?= $cliente->tienesucursal ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ofertaxmail') ?></th>
            <td><?= $cliente->ofertaxmail ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Respuestaxmail') ?></th>
            <td><?= $cliente->respuestaxmail ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Domicilio') ?></h4>
        <?= $this->Text->autoParagraph(h($cliente->domicilio)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Canjes') ?></h4>
        <?php if (!empty($cliente->canjes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Int') ?></th>
                <th scope="col"><?= __('Fecha') ?></th>
                <th scope="col"><?= __('Beneficio Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Cantidad Puntos') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->canjes as $canjes): ?>
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
    <div class="related">
        <h4><?= __('Related Historiales') ?></h4>
        <?php if (!empty($cliente->historiales)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Cantidad') ?></th>
                <th scope="col"><?= __('Fecha Vencimiento') ?></th>
                <th scope="col"><?= __('Cantidad Canjeado') ?></th>
                <th scope="col"><?= __('Eliminado') ?></th>
                <th scope="col"><?= __('Creado') ?></th>
                <th scope="col"><?= __('Modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->historiales as $historiales): ?>
            <tr>
                <td><?= h($historiales->id) ?></td>
                <td><?= h($historiales->cliente_id) ?></td>
                <td><?= h($historiales->cantidad) ?></td>
                <td><?= h($historiales->fecha_vencimiento) ?></td>
                <td><?= h($historiales->cantidad_canjeado) ?></td>
                <td><?= h($historiales->eliminado) ?></td>
                <td><?= h($historiales->creado) ?></td>
                <td><?= h($historiales->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Historiales', 'action' => 'view', $historiales->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Historiales', 'action' => 'edit', $historiales->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Historiales', 'action' => 'delete', $historiales->id], ['confirm' => __('Are you sure you want to delete # {0}?', $historiales->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Puntos') ?></h4>
        <?php if (!empty($cliente->puntos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Cantidad Disponible') ?></th>
                <th scope="col"><?= __('Modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->puntos as $puntos): ?>
            <tr>
                <td><?= h($puntos->id) ?></td>
                <td><?= h($puntos->cliente_id) ?></td>
                <td><?= h($puntos->cantidad_disponible) ?></td>
                <td><?= h($puntos->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Puntos', 'action' => 'view', $puntos->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Puntos', 'action' => 'edit', $puntos->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Puntos', 'action' => 'delete', $puntos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $puntos->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sucursals') ?></h4>
        <?php if (!empty($cliente->sucursals)): ?>
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
            <?php foreach ($cliente->sucursals as $sucursals): ?>
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
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($cliente->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Cliente Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Perfile Id') ?></th>
                <th scope="col"><?= __('Notificacion') ?></th>
                <th scope="col"><?= __('Super') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cliente->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->cliente_id) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td><?= h($users->perfile_id) ?></td>
                <td><?= h($users->notificacion) ?></td>
                <td><?= h($users->super) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
