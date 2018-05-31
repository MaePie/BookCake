<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>


<h1 class="mb-3"><?= __('Produits activés') ?></h1>

<div class="center mb-5">
	<?php foreach ($categories as $categorie) : ?>
		<?= $this->Html->Link($categorie->nomRCarteCategorie, ['controller' => 'RCarteProduits', 'action' => 'list', $categorie->idRCarteCategorie], ['class' => 'btn btn-primary categories']) ?>
	<?php endforeach; ?>
</div>

<div id="produits">
	<?php
		$categorie = 0;
		$scategorie = 0;
	?>
	<?php if (isset($produits)) : ?>
		<table class="table margin-top table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
					<th>Prix</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php foreach ($produits as $produit) : ?>
				<?php if ($produit->r_carte_category->idRCarteCategorie != $categorie) : ?>
					<tr class="categorie">
						<td colspan="4">
							<h3><?= $produit->r_carte_category->nomRCarteCategorie ?></h3>
						</td>
					</tr>
					<?php $categorie = $produit->r_carte_category->idRCarteCategorie ?>
				<?php endif; ?>

				<?php if (isset($produit->r_carte_s_category) && $produit->r_carte_s_category->idRCarteSCategorie != $scategorie) : ?>
					<tr class="scategorie">
						<td colspan="4">
							<h2 class="pl-5"><?= $produit->r_carte_s_category->nomRCarteSCategorie ?></h2>
						</td>
					</tr>
					<?php $scategorie = $produit->r_carte_s_category->idRCarteSCategorie ?>
				<?php endif; ?>

				<tr>
					<td><?= $produit->nomRCarteProduit ?></td>
					<td><?= $produit->descriptionRCarteProduit ?></td>
					<td><?php if ($produit->prixRCarteProduit != 0) echo $produit->prixRCarteProduit ?></td>
					<td><?= $this->Html->Link('Désactiver', ['controller' => 'RCarteProduits', 'action' => 'close', $produit->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Voir', ['controller' => 'RCarteProduits', 'action' => 'view', $produit->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Modifier', ['controller' => 'RCarteProduits', 'action' => 'edit', $produit->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RCarteProduits', 'action' => 'delete', $produit->idRCarteProduit, $cat]) ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>

<h1 class="mt-5 mb-5"><?= __('Produits désactivés') ?></h1>

<div id="produitsOff">
	<?php
		$categorie = 0;
		$scategorie = 0;
	?>
	<?php if (isset($produitsOff)) : ?>
		<table class="table margin-top table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
					<th>Prix</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php foreach ($produitsOff as $produitOff) : ?>
				<?php if ($produitOff->r_carte_category->idRCarteCategorie != $categorie) : ?>
					<tr class="categorie">
						<td colspan="4">
							<h3><?= $produitOff->r_carte_category->nomRCarteCategorie ?></h3>
						</td>
					</tr>
					<?php $categorie = $produitOff->r_carte_category->idRCarteCategorie ?>
				<?php endif; ?>

				<?php if (isset($produitOff->r_carte_s_category->idRCarteSCategorie) && $produitOff->r_carte_s_category->idRCarteSCategorie != $scategorie) : ?>
					<tr class="scategorie">
						<td colspan="4">
							<h2 class="pl-5"><?= $produitOff->r_carte_s_category->nomRCarteSCategorie ?></h2>
						</td>
					</tr>
					<?php $scategorie = $produitOff->r_carte_s_category->idRCarteSCategorie ?>
				<?php endif; ?>

				<tr>
					<td><?= $produitOff->nomRCarteProduit ?></td>
					<td><?= $produitOff->descriptionRCarteProduit ?></td>
					<td><?php if ($produitOff->prixRCarteProduit != 0) echo $produitOff->prixRCarteProduit ?></td>
					<td><?= $this->Html->Link('Activer', ['controller' => 'RCarteProduits', 'action' => 'open', $produitOff->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Voir', ['controller' => 'RCarteProduits', 'action' => 'view', $produitOff->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Modifier', ['controller' => 'RCarteProduits', 'action' => 'edit', $produitOff->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RCarteProduits', 'action' => 'delete', $produitOff->idRCarteProduit, $cat]) ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>