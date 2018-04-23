<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<h1>Au fil de l'eau</h1>

	<h2>Bonjour,</h2>
	<p>Merci d'avoir réservé au restaurant <em>Au fil de l'eau</em></p>
	<p>Le <?= date('d / m / Y', strtotime($res['dateRRes'])) ?> à <?= date('H:i', strtotime($res['heureRRes'])) ?> pour <?= $res['nbPersRRes'] ?> personnes</p>

	<p>A bientôt,</p>
	<p>Au fil de l'eau</p>
</body>
<footer>
</footer>
</html>