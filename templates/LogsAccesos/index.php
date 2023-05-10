<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\LogsAcceso[]|\Cake\Collection\CollectionInterface $logsAccesos
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Logs Acceso'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="logsAccesos index large-9 medium-8 columns content">
    <h3><?= __('Logs Accesos') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha') ?></th>
                <th scope="col"><?= $this->Paginator->sort('users_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('ip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('super') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($logsAccesos as $logsAcceso): ?>
            <tr>
                <td><?= $this->Number->format($logsAcceso->id) ?></td>
                <td><?= h($logsAcceso->fecha) ?></td>
                <td><?= $this->Number->format($logsAcceso->users_id) ?></td>
                <td><?= h($logsAcceso->ip) ?></td>
                <td><?= h($logsAcceso->super) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $logsAcceso->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $logsAcceso->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $logsAcceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logsAcceso->id)]) ?>
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
