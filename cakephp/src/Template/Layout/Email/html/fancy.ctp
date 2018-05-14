<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body { color: red; }
	</style>
</head>
<body>
	<h1 style="color: red;">Contact client <em>Au fil de l'eau</em></h1>

	<p>Message de <?= $data['name'] ?> - <?= $data['email'] ?> : </p>
	<br/>

	<p><?= $data['message'] ?></p>

	<?= $this->Html->Image('logo.png') ?>
</body>
</html>