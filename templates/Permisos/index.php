<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Permiso[]|\Cake\Collection\CollectionInterface $permisos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Permiso'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Perfiles'), ['controller' => 'Perfiles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Perfile'), ['controller' => 'Perfiles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="permisos index large-9 medium-8 columns content">
    <h3><?= __('Permisos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('clase') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($permisos as $permiso): ?>
            <tr>
                <td><?= $this->Number->format($permiso->id) ?></td>
                <td><?= h($permiso->clase) ?></td>
                <td><?= h($permiso->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $permiso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permiso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permiso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permiso->id)]) ?>
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
