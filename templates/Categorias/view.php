<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Categoria $categoria
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Beneficios'), ['controller' => 'Beneficios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Beneficio'), ['controller' => 'Beneficios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nombre') ?></th>
            <td><?= h($categoria->nombre) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Beneficios') ?></h4>
        <?php if (!empty($categoria->beneficios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Descripcion') ?></th>
                <th scope="col"><?= __('Categoria Id') ?></th>
                <th scope="col"><?= __('Cantidad Maxima') ?></th>
                <th scope="col"><?= __('Puntos') ?></th>
                <th scope="col"><?= __('Fecha Desde') ?></th>
                <th scope="col"><?= __('Fecha Hasta') ?></th>
                <th scope="col"><?= __('Creado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->beneficios as $beneficios): ?>
            <tr>
                <td><?= h($beneficios->id) ?></td>
                <td><?= h($beneficios->descripcion) ?></td>
                <td><?= h($beneficios->categoria_id) ?></td>
                <td><?= h($beneficios->cantidad_maxima) ?></td>
                <td><?= h($beneficios->puntos) ?></td>
                <td><?= h($beneficios->fecha_desde) ?></td>
                <td><?= h($beneficios->fecha_hasta) ?></td>
                <td><?= h($beneficios->creado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Beneficios', 'action' => 'view', $beneficios->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Beneficios', 'action' => 'edit', $beneficios->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Beneficios', 'action' => 'delete', $beneficios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $beneficios->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
