<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

$cakeDescription = 'Add User';
?>

<h3><?= __('Ajouter un user') ?></h3>

<?= $this->Form->create('Users', ['class' => 'form-group col-lg-6']) ?>
<?= $this->Form->control('nomUser', ['label' => 'Nom *', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('prenomUser', ['label' => 'Prénom *', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('emailUser', ['label' => 'Email *', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('passwordUser', ['label' => 'Mot de passe *', 'type' => 'password', 'class' => 'form-control']) ?>
<?= $this->Form->control('telephoneUser', ['label' => 'Téléphone', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('adresse1User', ['label' => 'Adresse', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('adresse2User', ['label' => 'Complément d\'adresse', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('cpUser', ['label' => 'Code postale', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('villeUser', ['label' => 'Ville', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('paysUser', ['label' => 'Pays', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('dateNaissUser', ['label' => 'Date de naissance', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('photoUser', ['label' => 'Photo', 'type' => 'file', 'class' => 'form-control']) ?>
<?= $this->Form->control('Ajouter', ['label' => false, 'type' => 'button', 'class' => 'btn btn-primary btn-block btn-flat margin-top']) ?>
<?= $this->Form->end() ?>
