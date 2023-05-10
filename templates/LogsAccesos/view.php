<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\LogsAcceso $logsAcceso
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Logs Acceso'), ['action' => 'edit', $logsAcceso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Logs Acceso'), ['action' => 'delete', $logsAcceso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $logsAcceso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Logs Accesos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Logs Acceso'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="logsAccesos view large-9 medium-8 columns content">
    <h3><?= h($logsAcceso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ip') ?></th>
            <td><?= h($logsAcceso->ip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($logsAcceso->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Users Id') ?></th>
            <td><?= $this->Number->format($logsAcceso->users_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha') ?></th>
            <td><?= h($logsAcceso->fecha) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Super') ?></th>
            <td><?= $logsAcceso->super ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
