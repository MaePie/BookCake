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
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	        <?= $this->Html->Link('Accueil', ['controller' => 'pages', 'action' => 'display'], ['class' => 'navbar-brand']) ?>
	        <div class="collapse navbar-collapse" id="navbarCollapse">
		        <ul class="navbar-nav mr-auto">
		            <li class="nav-item active">
		            	<?= $this->Html->Link('Hotel', ['controller' => 'pages', 'action' => 'display'], ['class' => 'nav-link']) ?>
		            </li>
		            <li class="nav-item">
		            	<?= $this->Html->Link('Restaurant', ['controller' => 'pages', 'action' => 'display'], ['class' => 'nav-link']) ?>
		            </li>
		            <li class="nav-item">
		            	<?= $this->Html->Link('Séminaire', ['controller' => 'pages', 'action' => 'display'], ['class' => 'nav-link']) ?>
		            </li>
		        </ul>
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