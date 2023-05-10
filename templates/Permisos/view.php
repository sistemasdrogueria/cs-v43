<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Permiso $permiso
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Permiso'), ['action' => 'edit', $permiso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Permiso'), ['action' => 'delete', $permiso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permiso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Permisos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Permiso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Perfiles'), ['controller' => 'Perfiles', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Perfile'), ['controller' => 'Perfiles', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="permisos view large-9 medium-8 columns content">
    <h3><?= h($permiso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Clase') ?></th>
            <td><?= h($permiso->clase) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($permiso->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($permiso->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Perfiles') ?></h4>
        <?php if (!empty($permiso->perfiles)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Nombre') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($permiso->perfiles as $perfiles): ?>
            <tr>
                <td><?= h($perfiles->id) ?></td>
                <td><?= h($perfiles->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Perfiles', 'action' => 'view', $perfiles->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Perfiles', 'action' => 'edit', $perfiles->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Perfiles', 'action' => 'delete', $perfiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $perfiles->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
