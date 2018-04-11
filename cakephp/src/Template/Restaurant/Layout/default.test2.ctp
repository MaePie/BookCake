<!DOCTYPE html>
<html>
<head>
	<title>Au fil de l'eau</title>

	<?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css') ?>
	<?= $this->Html->css('style.css') ?>

	<?= $this->Html->script('https://code.jquery.com/jquery-3.2.1.slim.min.js') ?>
	<?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js') ?>
</head>
<body>
	<header>
		<!-- <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<?= $this->Form->create() ?>
			<?= $this->Form->control('dateRRes', ['type' => 'date', 'selected' => date('Y-m-d'), 'label' => 'Date :']) ?>
			<?= $this->Form->control('heureRRes', ['type' => 'time', 'label' => 'Heure :']) ?>
			<?= $this->Form->control('nbRRes', ['type' => 'number', 'label' => 'Nb de personnes :']) ?>
		</nav> -->
	</header>

	<div class="content">
        <?= $this->fetch('content') ?>
	</div>

	<footer>

	</footer>
</body>
</html>
