<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.blue {
			color: #5A89B4;
		}
	</style>
</head>
<body>
	<h1 class="blue"><em>Au fil de l'eau</em></h1>

	<h2>Bonjour,</h2>

	<br/>
	<p>Une réservation a été demandée.</p>

	<br/>
	<p><b>Détail réservation : </b></p>
	<p><b>Nom : </b> <?= $res->prospect->nomProspect ?> </p>
	<p><b>Mail : </b> <?= $res->prospect->emailProspect ?> </p>
	<p><b>Date : </b> <?= date('d / m / Y', strtotime($res->dateRRes)) ?> </p>
	<p><b>Heure : </b> <?= date('H:i', strtotime($res->heureRRes)) ?> </p>
	<p><b>Nombre de personnes : </b> <?= $res->nbPersRRes ?> </p>

	<br/>
	<br/>
	<p>Pour valider / annuler la réservation :</p>
	<a href="http://restaurant-aufildeleau.fr/admin/r-res/day-list/<?= date('Y-m-d', strtotime($res['dateRRes'])) ?>">Réservations du <?= date('d / m / Y', strtotime($res['dateRRes'])) ?></a>

	<br/>
	<br/>
	<br/>
	<img src="http://restaurant-aufildeleau.fr/img/logo.png" height="104px" alt="Logo">
</body>
<footer>
</footer>
</html>