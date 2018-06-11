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
<label for="dateRRes">Date *</label>
<div class="input-group col-lg-6">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-calendar"></span>
    </div>
    <input type="text" id="dateRRes" name="dateRRes" class="form-control hasDatepicker" value="<?= date('d/m/Y') ?>" required>
</div>

<label for="heureRRes">Heure *</label>
<div class="input-group col-lg-6 time">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </div>
    <input type="time" name="heureRRes" class="form-control" value="20:00" step="300" required>
</div>

<label for="nbPersRRes">Nombre de personnes *</label>
<div class="input-group col-lg-6 number">
    <div class="input-group-addon">
        <span class="fa fa-users"></span>
    </div>
    <input type="number" name="nbPersRRes" class="form-control" required>
</div>

<label for="nomRRes">Nom *</label>
<div class="input-group col-lg-6 text">
    <div class="input-group-addon">
        <span class="fa fa-user"></span>
    </div>
    <input type="text" name="nomRRes" class="form-control" required>
</div>

<label for="mailRRes">Email</label>
<div class="input-group col-lg-6 text">
    <div class="input-group-addon">
        <span class="fa fa-envelope"></span>
    </div>
    <input type="text" name="mailRRes" class="form-control">
</div>

<label for="commentaireRRes">Commentaire</label>
<div class="input-group col-lg-6 text">
    <div class="input-group-addon">
        <span class="fa fa-comment"></span>
    </div>
    <input type="text" name="commentaireRRes" class="form-control">
</div>
<div class="input col-lg-6 pl-0">
	<button type="submit" class="btn btn-primary btn-block btn-flat mt-3" id="ajouter">Ajouter</button>
</div>
<?= $this->Form->end() ?>