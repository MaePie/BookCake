<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>

<h3><?= __('Ajouter un user') ?></h3>

<?= $this->Form->create('Prospects', ['class' => 'form-group col-lg-6']) ?>
<?= $this->Form->control('nomProspect', ['label' => 'Nom *', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('emailProspect', ['label' => 'Email *', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('telProspect', ['label' => 'Téléphone', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('Ajouter', ['label' => false, 'type' => 'button', 'class' => 'btn btn-primary btn-block btn-flat margin-top']) ?>
<?= $this->Form->end() ?>
