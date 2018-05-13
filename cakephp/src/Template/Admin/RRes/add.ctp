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
<div class="input-group date" data-provide="datepicker">
    <div class="input-group-addon">
        <span class="glyphicon glyphicon-th"></span>
    </div>
    <input type="text" name="dateRRes" class="form-control hasDatepicker">
</div>
<div class="input-group time">
    <input type="time" name="dateRRes" class="form-control" value="<?= date('H:i') ?>">
</div>
<?= $this->Form->control('nbPersRRes', ['label' => 'Nb Personnes', 'type' => 'number', 'class' => 'form-control']) ?>
<?= $this->Form->control('nomRRes', ['label' => 'Nom résrevation', 'type' => 'text', 'class' => 'form-control']) ?>
<?= $this->Form->control('Ajouter', ['label' => false, 'type' => 'button', 'class' => 'btn btn-primary btn-block btn-flat mt-3']) ?>
<?= $this->Form->end() ?>

<script type="text/javascript">
	;(function($){
		$.fn.datepicker.dates['fr'] = {
			days: ["dimanche", "lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi"],
			daysShort: ["dim.", "lun.", "mar.", "mer.", "jeu.", "ven.", "sam."],
			daysMin: ["di", "lu", "ma", "me", "je", "ve", "sa"],
			months: ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"],
			monthsShort: ["janv.", "févr.", "mars", "avril", "mai", "juin", "juil.", "août", "sept.", "oct.", "nov.", "déc."],
			today: "Aujourd'hui",
			monthsTitle: "Mois",
			clear: "Effacer",
			weekStart: 1,
			format: "dd/mm/yyyy"
		};
	}(jQuery));


	$('.hasDatepicker').datepicker({
	    startDate: "today",
	    autoclose: true,	
	    language: "fr",
	    clearBtn: true,
	    todayHighlight: true
	});
</script>