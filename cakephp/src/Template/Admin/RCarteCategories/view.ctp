<div class="container">
    <div class="row">
        <?= $this->Html->Link('< Vue globale', ['controller' => 'RCarteCategories', 'action' => 'liste'], ['class' => 'btn btn-primary mt-3 mb-3']); ?>

        <h3><?= $categorie['nomRCarteCategorie'] ?></h3>

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="row"><?= __('ID') ?></th>
                <td><?= $categorie->idRCarteCategorie ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nom') ?></th>
                <td><?= $categorie->nomRCarteCategorie ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Description') ?></th>
                <td><?= $categorie->descriptionRCarteCategorie ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Statut') ?></th>
                <td>
                    <?php if ($categorie->statutRCarteCategorie == 1) : ?>
                        <b class="alert-sm alert-success">Activée</b> | <?= $this->Html->Link('Désactiver', ['controller' => 'RCarteCategories', 'action' => 'close', $categorie->idRCarteCategorie]) ?>
                    <?php endif; ?>
                    <?php if ($categorie->statutRCarteCategorie == 0) : ?>
                        <b class="alert-sm alert-danger">Désactivée</b> | <?= $this->Html->Link('Activer', ['controller' => 'RCarteCategories', 'action' => 'open', $categorie->idRCarteCategorie]) ?>
                    <?php endif; ?> 
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de création') ?></th>
                <td><?= $categorie->createdRCarteCategorie->format('d / m / Y H:i') ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de modification') ?></th>
                <td><?= $categorie->modifiedRCarteCategorie->format('d / m / Y H:i') ?></td>
            </tr>
        </table>


        <?php if(isset($categorie->r_carte_s_categories)) : ?>
            <h3 class="mt-5">Liste des sous-catégories</h3>

            <table class="table table-striped table-hover table-bordered">
                <?php foreach($categorie->r_carte_s_categories as $scategorie => $value) : ?>
                    <tr>
                        <td>
                             <?= $categorie->r_carte_s_categories[$scategorie]['nomRCarteSCategorie'] ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>