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
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	        <div class="container">
		        <div class="collapse navbar-collapse" id="navbarCollapse">
	        		<?= $this->Html->Link('Accueil', ['controller' => 'pages', 'action' => 'display'], ['class' => 'navbar-brand']) ?>
			        <ul class="navbar-nav mr-auto">
			            <li class="nav-item">
			            	<?= $this->Html->Link('Restaurant', ['controller' => 'pages', 'action' => 'restaurant'], ['class' => 'nav-link']) ?>
			            </li>
			            <li class="nav-item">
			            	<?= $this->Html->Link('Carte', ['controller' => 'pages', 'action' => 'carte'], ['class' => 'nav-link']) ?>
			            </li>
			            <li class="nav-item">
			            	<?= $this->Html->Link('Galerie photos', ['controller' => 'pages', 'action' => 'galerie'], ['class' => 'nav-link']) ?>
			            </li>
			            <li class="nav-item">
			            	<?= $this->Html->Link('Contact', ['controller' => 'pages', 'action' => 'contact'], ['class' => 'nav-link']) ?>
			            </li>
			        </ul>
		        </div>
		    </div>
		    <div>
		    	<p style="color: white">+33 6 80 63 16 39</p>
		    </div>
    	</nav>
	</header>

	<div class="content">
        <?= $this->fetch('content') ?>
	</div>

	<footer>
		
	</footer>
</body>
</html>