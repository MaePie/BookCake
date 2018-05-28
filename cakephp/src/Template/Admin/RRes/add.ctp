<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>

<h3><?= __('Ajouter une réservation') ?></h3>

<?= $this->Form->create('RRes', ['class' => 'form-group col-lg-6']) ?>
<!-- <?= $this->Form->control('idRZone', ['label' => 'Zone', 'type' => 'select', 'options' => $zones, 'class' => 'form-control']) ?>
<?= $this->Form->control('idRTable', ['label' => 'Table', 'type' => 'select', 'options' => $tables, 'class' => 'form-control']) ?> -->
<div class="input-group col-lg-6 date">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </div>
    <input type="text" name="dateRRes" class="form-control hasDatepicker" value="<?= date('d/m/Y') ?>">
</div>
<div class="input-group col-lg-6 time">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </div>
    <input type="time" name="heureRRes" class="form-control" value="20:00">
</div>
<div class="input-group col-lg-6 number">
    <div class="input-group-addon">
        <span class="fa fa-users"></span>
    </div>
    <input type="number" name="nbPersRRes" class="form-control">
</div>
<div class="input-group col-lg-6 text">
    <div class="input-group-addon">
        <span class="fa fa-user"></span>
    </div>
    <input type="text" name="nomRRes" class="form-control">
</div>
<div class="input col-lg-6 pl-0">
	<button type="submit" class="btn btn-primary btn-block btn-flat mt-3" id="ajouter">Ajouter</button>
</div>
<?= $this->Form->end() ?>