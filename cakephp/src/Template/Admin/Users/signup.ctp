<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

$cakeDescription = 'Sign Up';
?>

<div class="columns large-10 medium-9 content">
    <h3><?= __('Ajouter un user') ?></h3>

    <?= $this->Form->create('Users', ['class' => 'form-group']) ?>
    <?= $this->Form->control('nomUser', ['label' => 'Nom', 'type' => 'text', 'class' => 'form-control']) ?>
    <?= $this->Form->control('prenomUser', ['label' => 'Prénom', 'type' => 'text', 'class' => 'form-control']) ?>
    <?= $this->Form->control('emailUser', ['label' => 'Email', 'type' => 'text', 'class' => 'form-control']) ?>
    <?= $this->Form->control('passwordUser', ['label' => 'Mot de passe', 'type' => 'password', 'class' => 'form-control']) ?>
    <?= $this->Form->button('Inscription', array('class' => 'col-lg-3 btn btn-primary btn-block btn-flat')) ?>
    <?= $this->Form->end() ?>
</div>

</body>
</html>
