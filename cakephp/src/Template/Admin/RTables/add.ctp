<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

$cakeDescription = 'Add Table';
?>

<h3><?= __('Ajouter une table') ?></h3>

<?= $this->Form->create('RTables', ['class' => 'form-group col-lg-6']) ?>
<?= $this->Form->control('idRZone', ['label' => 'Zone *', 'type' => 'select', 'options' => $zones, 'class' => 'form-control']) ?>
<?= $this->Form->control('nomRTable', ['label' => 'Nom *', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('Ajouter', ['label' => false, 'type' => 'button', 'class' => 'btn btn-primary btn-block btn-flat margin-top']) ?>
<?= $this->Form->end() ?>
