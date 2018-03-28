<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users form large-10 medium-9 columns content">
    <h3><?= __('Modifier user') ?></h3>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <?php
            echo $this->Form->control('nomUser');
            echo $this->Form->control('prenomUser');
            echo $this->Form->control('emailUser');
            echo $this->Form->control('password');
            echo $this->Form->control('dateNaissUser');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Modifier')) ?>
    <?= $this->Form->end() ?>
</div>
