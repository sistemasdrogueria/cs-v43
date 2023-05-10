<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\PermisosPerfile[]|\Cake\Collection\CollectionInterface $permisosPerfiles
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Permisos Perfile'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Perfiles'), ['controller' => 'Perfiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Perfile'), ['controller' => 'Perfiles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Permisos'), ['controller' => 'Permisos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Permiso'), ['controller' => 'Permisos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permisosPerfiles index large-9 medium-8 columns content">
    <h3><?= __('Permisos Perfiles') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('perfiles_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('permisos_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permisosPerfiles as $permisosPerfile): ?>
            <tr>
                <td><?= $this->Number->format($permisosPerfile->id) ?></td>
                <td><?= $permisosPerfile->has('perfile') ? $this->Html->link($permisosPerfile->perfile->id, ['controller' => 'Perfiles', 'action' => 'view', $permisosPerfile->perfile->id]) : '' ?></td>
                <td><?= $permisosPerfile->has('permiso') ? $this->Html->link($permisosPerfile->permiso->id, ['controller' => 'Permisos', 'action' => 'view', $permisosPerfile->permiso->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permisosPerfile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permisosPerfile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permisosPerfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permisosPerfile->id)]) ?>
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
