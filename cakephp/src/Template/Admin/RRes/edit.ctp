<h3><?= __('Modifier réservation '.$res->idRRes) ?></h3>

<?= $this->Form->create('RRes', ['class' => 'form-group col-lg-6']) ?>
<!-- <?= $this->Form->control('idRZone', ['label' => 'Zone', 'type' => 'select', 'options' => $zones, 'class' => 'form-control']) ?>
<?= $this->Form->control('idRTable', ['label' => 'Table', 'type' => 'select', 'options' => $tables, 'class' => 'form-control']) ?> -->
<?= $this->Form->control('dateRRes', ['label' => 'Date *', 'type' => 'date', 'class' => 'form-control']) ?>
<?= $this->Form->control('heureRRes', ['label' => 'Heure *', 'type' => 'time', 'class' => 'form-control']) ?>
<?= $this->Form->control('nbPersRRes', ['label' => 'Nb Pesronnes', 'type' => 'number', 'class' => 'form-control']) ?>
<?= $this->Form->control('nomRRes', ['label' => 'Nom', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('Modifier', ['label' => false, 'type' => 'button', 'class' => 'btn btn-primary btn-block btn-flat mt-3']) ?>
<?= $this->Form->end() ?>

<div class="input-group date" data-provide="datepicker">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
    <input type="text" class="form-control hasDatepicker" value="<?= date('Y-m-d') ?>">
</div>