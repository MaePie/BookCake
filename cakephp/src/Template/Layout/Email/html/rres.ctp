<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->css('restaurant.min') ?>
</head>
<body>
	<h1>Au fil de l'eau</h1>

	<p>Bonjour,</p><br/>
	<p>Votre réservation a bien été prise en compte.</p>
	<p>Nous vous enverrons une confirmation dans les meilleurs délais.</p>

	<br/>
	<p>Détail réservation : </p>
	<p>Date :  <?= date('d / m / Y', strtotime($res['dateRRes'])) ?> </p>
	<p>Heure : <?= date('H:i', strtotime($res['heureRRes'])) ?> </p>
	<p>Nombre de personnes : <?= $res['nbPersRRes'] ?> </p>

	<p>Merci d'avoir réservé au restaurant <em>Au fil de l'eau</em></p>
	<p>A bientôt,</p>

	<?= $this->Html->image('logo.png') ?>
</body>
<footer>
</footer>
</html>