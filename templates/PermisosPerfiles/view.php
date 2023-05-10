<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PermisosPerfile $permisosPerfile
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permisos Perfile'), ['action' => 'edit', $permisosPerfile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permisos Perfile'), ['action' => 'delete', $permisosPerfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permisosPerfile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permisos Perfiles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permisos Perfile'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Perfiles'), ['controller' => 'Perfiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Perfile'), ['controller' => 'Perfiles', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Permisos'), ['controller' => 'Permisos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permiso'), ['controller' => 'Permisos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permisosPerfiles view large-9 medium-8 columns content">
    <h3><?= h($permisosPerfile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Perfile') ?></th>
            <td><?= $permisosPerfile->has('perfile') ? $this->Html->link($permisosPerfile->perfile->id, ['controller' => 'Perfiles', 'action' => 'view', $permisosPerfile->perfile->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Permiso') ?></th>
            <td><?= $permisosPerfile->has('permiso') ? $this->Html->link($permisosPerfile->permiso->id, ['controller' => 'Permisos', 'action' => 'view', $permisosPerfile->permiso->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($permisosPerfile->id) ?></td>
        </tr>
    </table>
</div>
