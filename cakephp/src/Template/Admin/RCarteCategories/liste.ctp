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

<div id="categories">
	<?php
		$nsection = 0;
	?>
	<?php if (isset($categories)) : ?>
		<table class="table margin-top table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php foreach ($categories as $categorie) : ?>
				<?php if ($categorie->sectionRCarteCategorie != $nsection) : ?>
					<tr class="categorie">
						<td colspan="7">
							<h3>
								<?php
									if ($categorie->sectionRCarteCategorie == 1) echo 'Au Menu';
									if ($categorie->sectionRCarteCategorie == 2) echo 'A la Carte';
								?>		
							</h3>
						</td>
					</tr>
					<?php $nsection = $categorie->sectionRCarteCategorie ?>
				<?php endif; ?>

				<tr>
					<td><?= $categorie->nomRCarteCategorie ?></td>
					<td><?= $categorie->descriptionRCarteCategorie ?></td>
					<td>
						<?= $this->Html->Link('Désactiver', ['controller' => 'RCarteCategories', 'action' => 'close', $categorie->idRCarteCategorie]) ?> | <?= $this->Html->Link('Voir', ['controller' => 'RCarteCategories', 'action' => 'view', $categorie->idRCarteCategorie]) ?> | <?= $this->Html->Link('Modifier', ['controller' => 'RCarteCategories', 'action' => 'edit', $categorie->idRCarteCategorie]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RCarteCategories', 'action' => 'delete', $categorie->idRCarteCategorie], ['confirm' => 'Etes-vous sur de vouloir supprimer la catégorie '. $categorie->nomRCarteCategorie]) ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>

<div id="categoriesOff">
	<?php
		$nsection = 0;
	?>
	<?php if (isset($categoriesOff)) : ?>
		<h1 class="mb-3"><?= __('Catégories désactivés') ?></h1>
		
		<table class="table margin-top table-striped table-hover table-bordered">
			<thead>
				<tr>
					<th>Nom</th>
					<th>Description</th>
					<th>Action</th>
				</tr>
			</thead>
			<?php foreach ($categoriesOff as $categorieOff) : ?>
				<tr>
					<td><?= $categorieOff->nomRCarteCategorie ?></td>
					<td><?= $categorieOff->descriptionRCarteCategorie ?></td>
					<td>
						<?= $this->Html->Link('Désactiver', ['controller' => 'RCarteCategories', 'action' => 'close', $categorieOff->idRCarteCategorie]) ?> | <?= $this->Html->Link('Voir', ['controller' => 'RCarteCategories', 'action' => 'view', $categorieOff->idRCarteCategorie]) ?> | <?= $this->Html->Link('Modifier', ['controller' => 'RCarteCategories', 'action' => 'edit', $categorieOff->idRCarteCategorie]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RCarteCategories', 'action' => 'delete', $categorieOff->idRCarteCategorie], ['confirm' => 'Etes-vous sur de vouloir supprimer la catégorie '. $categorieOff->nomRCarteCategorie]) ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</table>
	<?php endif; ?>
</div>