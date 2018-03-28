<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
    </ul>
</nav> -->
<div class="users index large-10 medium-9 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th class="large-1" scope="col"><?= $this->Paginator->sort('idUser', 'ID') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nomUser', 'Nom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('prenomUser', 'Prénom') ?></th>
                <th scope="col"><?= $this->Paginator->sort('emailUser', 'Email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password', 'Password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dateNaissUser', 'Date de naissance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->idUser) ?></td>
                <td><?= h($user->nomUser) ?></td>
                <td><?= h($user->prenomUser) ?></td>
                <td><?= h($user->emailUser) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->dateNaissUser->format('d / m / Y')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->idUser]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->idUser]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->idUser], ['confirm' => __('Are you sure you want to delete # {0}?', $user->idUser)]) ?>
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
