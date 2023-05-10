<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Historiale[]|\Cake\Collection\CollectionInterface $historiales
  */
?>
<div class="historiales index large-9 medium-8 columns content">
    <h3><?= __('Historiales') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id','Número') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cliente_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad') ?></th>
                <th scope="col"><?= $this->Paginator->sort('fecha_vencimiento') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cantidad_canjeado') ?></th>
               
                <th scope="col"><?= $this->Paginator->sort('creado') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modificado') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historiales as $historiale): ?>
            <tr>
                <td><?= $this->Number->format($historiale->id) ?></td>
                <td><?= $historiale->has('cliente') ? $historiale->cliente->codigo : '' ?></td>
                <td><?= $this->Number->format($historiale->cantidad) ?></td>
                <td><?= h($historiale->fecha_vencimiento) ?></td>
                <td><?= $this->Number->format($historiale->cantidad_canjeado) ?></td>
              
                <td><?= h($historiale->creado) ?></td>
                <td><?= h($historiale->modificado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $historiale->id]) ?>
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
