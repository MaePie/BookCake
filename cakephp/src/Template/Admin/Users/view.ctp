<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

    $this->layout = 'default';
?>

<div class="container">
    <div class="row">
        <h3><?= __($user->nomUser).' '.__($user->prenomUser) ?></h3>
        <?= $this->Html->link('Changer ', ['controller' => 'users', 'action' => 'changePhoto/'.$user->idUser], ['class' => 'pull-right fa fa-edit', 'alt' => 'Modifier sa photo']); ?>
        <a><img class="img-rounded pull-right" src="<?= '/img/photoUser/' . $user->photoUser ?>" height="150px"></a>

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="row"><?= __('ID') ?></th>
                <td><?= $this->Number->format($user->idUser) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nom') ?></th>
                <td><?= $user->nomUser ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Prénom') ?></th>
                <td><?= $user->prenomUser ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Email') ?></th>
                <td><?= $user->emailUser ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Téléphone') ?></th>
                <td><?= $user->telephoneUser ?></td>
            </tr>
                <th scope="row"><?= __('Adresse') ?></th>
                <td><?= $user->adresse1User ?> <?= $user->adresse2User ?> <?= $user->cpUser ?> <?= $user->villeUser ?> <?= $user->paysUser ?> </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de naissance') ?></th>
                <td><?= date('d / m / Y', strtotime($user['dateNaissUser'])) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de création') ?></th>
                <td><?= date('d / m / Y H:i:s', strtotime($user['createdUser'])) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de modification') ?></th>
                <td><?= date('d / m / Y H:i:s', strtotime($user['modifiedUser'])) ?></td>
            </tr>
        </table>
    </div>
</div>