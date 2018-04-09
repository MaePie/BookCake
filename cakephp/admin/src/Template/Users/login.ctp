<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->layout = 'default';

$cakeDescription = 'Login';
?>
<div class="users view large-10 medium-9 columns content">
    <h1>Login</h1>

    <?= $this->Form->create('Users', ['class' => 'form-group']) ?>
    <?= $this->Form->control('emailUser', ['label' => 'Email', 'type' => 'text', 'class' => 'form-control']) ?>
    <?= $this->Form->control('passwordUser', ['label' => 'Mot de passe', 'type' => 'password', 'class' => 'form-control']) ?>
    <?= $this->Form->button('Connexion', array('class' => 'btn btn-primary btn-block btn-flat')) ?>
    <?= $this->Form->end() ?>
</div>
