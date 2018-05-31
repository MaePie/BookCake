<div class="container">
    <div class="row">
        <?= $this->Html->Link('< Vue globale', ['controller' => 'RCarteProduits', 'action' => 'liste', $produit->r_carte_category->idRCarteCategorie], ['class' => 'btn btn-primary mt-3 mb-3']); ?>

        <h3><?= $produit['nomRCarteProduit'] ?></h3>

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="row"><?= __('ID') ?></th>
                <td><?= $produit['idRCarteProduit'] ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nom') ?></th>
                <td><?= $produit['nomRCarteProduit'] ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Catégorie') ?></th>
                <td><?= $produit->r_carte_category['nomRCarteCategorie'] ?></td>
            </tr>
            <?php if(isset($produit->r_carte_s_category['nomRCarteSCategorie'])) : ?>
                <tr>
                    <th scope="row"><?= __('Sous catégorie') ?></th>
                    <td>
                         <?= $produit->r_carte_s_category['nomRCarteSCategorie'] ?>
                    </td>
                </tr>
            <?php endif; ?>
            <tr>
                <th scope="row"><?= __('Prix') ?></th>
                <td><?= $produit['prixRCarteProduit'] ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Description') ?></th>
                <td><?= $produit['descriptionRCarteProduit'] ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Statut') ?></th>
                <td>
                    <?php if ($produit['statutRCarteProduit'] == 1) : ?>
                        <b class="alert-sm alert-success">Activé</b> | <?= $this->Html->Link('Désactiver', ['controller' => 'RCarteProduit', 'action' => 'close', $produit->idRCarteProduit]) ?>
                    <?php endif; ?>
                    <?php if ($produit['statutRCarteProduit'] == 0) : ?>
                        <b class="alert-sm alert-danger">Désactivé</b> | <?= $this->Html->Link('Activer', ['controller' => 'RCarteProduit', 'action' => 'open', $produit->idRCarteProduit]) ?>
                    <?php endif; ?> 
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de création') ?></th>
                <td><?= $produit['createdRCarteProduit']->format('d / m / Y H:i') ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de modification') ?></th>
                <td><?= $produit['modifiedRCarteProduit']->format('d / m / Y H:i') ?></td>
            </tr>
        </table>
    </div>
</div>