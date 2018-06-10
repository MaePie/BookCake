<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>

<?= $this->Html->Link('Ajouter une catégorie', ['controller' => 'RCarteCategories', 'action' => 'add'], ['class' => 'pull-right btn btn-primary mt-3 mb-3']); ?>

<h1 class="mb-3"><?= __('Catégories activés') ?></h1>

<div id="produits">
	<?php
		$ncategorie = 0;
		$nscategorie = 0;
	?>
	<?php if (isset($categories)) : ?>
		<table class="table margin-top table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php foreach ($categories as $categorie) : ?>
				<?php if ($categorie->idRCarteCategorie != $ncategorie) : ?>
					<tr class="categorie">
						<td colspan="7">
							<h3><?= $categorie->nomRCarteCategorie ?></h3>
						</td>
					</tr>
					<?php $ncategorie = $categorie->idRCarteCategorie ?>
				<?php endif; ?>

				<?php if (isset($categorie->r_carte_s_category) && $categorie->r_carte_s_category->idRCarteSCategorie != $scategorie) : ?>
					<tr class="scategorie">
						<td colspan="7">
							<h2 class="pl-5"><?= $categorie->r_carte_s_category->nomRCarteSCategorie ?></h2>
						</td>
					</tr>
					<?php $nscategorie = $categorie->r_carte_s_category->idRCarteSCategorie ?>
				<?php endif; ?>

				<tr>
					<td><?= $categorie->nomRCarteCategorie ?></td>
					<td>
						<?= $this->Html->Link('Désactiver', ['controller' => 'RCarteProduits', 'action' => 'close', $categorie->idRCarteCategorie]) ?> | <?= $this->Html->Link('Voir', ['controller' => 'RCarteProduits', 'action' => 'view', $categorie->idRCarteCategorie]) ?> | <?= $this->Html->Link('Modifier', ['controller' => 'RCarteProduits', 'action' => 'edit', $categorie->idRCarteCategorie]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RCarteProduits', 'action' => 'delete', $categorie->idRCarteCategorie], ['confirm' => 'Etes-vous sur de vouloir supprimer le produit '. $categorie->idRCarteCategorie]) ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>