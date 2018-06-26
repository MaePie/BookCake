<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>

<?= $this->Html->Link('Ajouter un produit', ['controller' => 'RCarteProduits', 'action' => 'add'], ['class' => 'pull-right btn btn-primary mt-3 mb-3']); ?>

<h1 class="mb-3"><?= __('Produits activés') ?></h1>

<div class="center mb-5">
	<?php foreach ($categories as $categorie) : ?>
		<?= $this->Html->Link($categorie->nomRCarteCategorie, ['controller' => 'RCarteProduits', 'action' => 'liste', $categorie->idRCarteCategorie], ['class' => 'btn btn-primary categories']) ?>
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
					<th>Prix</th>
					<th>Prix Achat</th>
					<th>De</th>
					<th>A</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php foreach ($produits as $produit) : ?>
				<?php if ($produit->r_carte_category->idRCarteCategorie != $categorie) : ?>
					<tr class="categorie">
						<td colspan="7">
							<h3><?= $produit->r_carte_category->nomRCarteCategorie ?></h3>
						</td>
					</tr>
					<?php $categorie = $produit->r_carte_category->idRCarteCategorie ?>
				<?php endif; ?>

				<?php if (isset($produit->r_carte_s_category) && $produit->r_carte_s_category->idRCarteSCategorie != $scategorie) : ?>
					<tr class="scategorie">
						<td colspan="7">
							<h2 class="pl-5"><?= $produit->r_carte_s_category->nomRCarteSCategorie ?></h2>
						</td>
					</tr>
					<?php $scategorie = $produit->r_carte_s_category->idRCarteSCategorie ?>
				<?php endif; ?>

				<tr>
					<td><?= $produit->nomRCarteProduit ?></td>
					<td><?php if ($produit->prixRCarteProduit != 0) echo $produit->prixRCarteProduit ?></td>
					<td><?php if ($produit->prixAchatRCarteProduit != 0) echo $produit->prixAchatRCarteProduit ?></td>
					<td><?php if (isset($produit->deRCarteProduit)) echo $produit->deRCarteProduit->format('d / m / Y') ?></td>
					<td><?php if (isset($produit->aRCarteProduit)) echo $produit->aRCarteProduit->format('d / m / Y') ?></td>
					<td><?= $produit->descriptionRCarteProduit ?></td>
					<td><?= $this->Html->Link('Désactiver', ['controller' => 'RCarteProduits', 'action' => 'close', $produit->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Voir', ['controller' => 'RCarteProduits', 'action' => 'view', $produit->idRCarteProduit]) ?> | <?= $this->Html->Link('Modifier', ['controller' => 'RCarteProduits', 'action' => 'edit', $produit->idRCarteProduit]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RCarteProduits', 'action' => 'delete', $produit->idRCarteProduit], ['confirm' => 'Etes-vous sur de vouloir supprimer le produit '. $produit->nomRCarteProduit]) ?></td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>

<?php if (isset($produits)) : ?>
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
						<th>Prix</th>
						<th>Prix Achat</th>
						<th>De</th>
						<th>A</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php foreach ($produitsOff as $produitOff) : ?>
					<?php if ($produitOff->r_carte_category->idRCarteCategorie != $categorie) : ?>
						<tr class="categorie">
							<td colspan="7">
								<h3><?= $produitOff->r_carte_category->nomRCarteCategorie ?></h3>
							</td>
						</tr>
						<?php $categorie = $produitOff->r_carte_category->idRCarteCategorie ?>
					<?php endif; ?>

					<?php if (isset($produitOff->r_carte_s_category->idRCarteSCategorie) && $produitOff->r_carte_s_category->idRCarteSCategorie != $scategorie) : ?>
						<tr class="scategorie">
							<td colspan="7">
								<h2 class="pl-5"><?= $produitOff->r_carte_s_category->nomRCarteSCategorie ?></h2>
							</td>
						</tr>
						<?php $scategorie = $produitOff->r_carte_s_category->idRCarteSCategorie ?>
					<?php endif; ?>

					<tr>
						<td><?= $produitOff->nomRCarteProduit ?></td>
						<td><?php if ($produitOff->prixRCarteProduit != 0) echo $produitOff->prixRCarteProduit ?></td>
						<td><?php if ($produitOff->prixAchatRCarteProduit != 0) echo $produitOff->prixAchatRCarteProduit ?></td>
						<td><?php if (isset($produitOff->deRCarteProduit)) echo $produitOff->deRCarteProduit->format('d / m / Y') ?></td>
						<td><?php if (isset($produitOff->aRCarteProduit)) echo $produitOff->aRCarteProduit->format('d / m / Y') ?></td>
						<td><?= $produitOff->descriptionRCarteProduit ?></td>
						<td><?= $this->Html->Link('Activer', ['controller' => 'RCarteProduits', 'action' => 'open', $produitOff->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Voir', ['controller' => 'RCarteProduits', 'action' => 'view', $produitOff->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Modifier', ['controller' => 'RCarteProduits', 'action' => 'edit', $produitOff->idRCarteProduit, $cat]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RCarteProduits', 'action' => 'delete', $produitOff->idRCarteProduit, $cat], ['confirm' => 'Etes-vous sur de vouloir supprimer le produit '. $produitOff->nomRCarteProduit]) ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
<?php endif; ?>