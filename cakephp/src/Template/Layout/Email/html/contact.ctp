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
	<h1>Contact client <em class="blue">Au fil de l'eau</em></h1>

	<p>Message de <?= $data['name'] ?> - <?= $data['email'] ?> : </p>
	
	<br/>
	<p><?= $data['message'] ?></p>

	<!-- <?= $this->Html->image('logo.png', ['height' => '104px', 'alt' => 'Logo', 'fullBase' => true]) ?> -->
	<img src="http://restaurant-aufildeleau.devtotem.com/img/logo.png" height="104px" alt="Logo">

	<br/>
    <p><b>Téléphone : </b> +33 6 40 68 42 81 </p>
    <p><b>Adresse : </b> Hôtel Gemme, 1 Rue du Bac, 31700 Blagnac </p>
    <p><b>Email : </b> client@restaurant-aufildeleau.fr </p>
</body>
</html>