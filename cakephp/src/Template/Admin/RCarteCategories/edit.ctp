<div class="container">
    <div class="row">
        <?= $this->Html->Link('< Vue globale', ['controller' => 'RCarteCategories', 'action' => 'liste'], ['class' => 'btn btn-primary mt-3 mb-3']); ?>

        <h3><?= $categorie->nomRCarteCategorie ?></h3>

        <form method="post" class="col-lg-6">
            <label>Nom *</label>  
            <input type="text" name="nomRCarteCategorie" value="<?= $categorie->nomRCarteCategorie ?>" class="form-control mb-3">

            <label>Prix</label>  
            <input type="number" step="0.01" name="prixRCarteCategorie" value="<?= $categorie->prixRCarteCategorie ?>" class="form-control mb-3">

            <label>Description</label>  
            <input type="text" name="descriptionRCarteCategorie" class="form-control mb-3" value="<?= $categorie->descriptionRCarteCategorie ?>">

            <button type="submit" name="Enregistrer" class="btn btn-primary mt-5">Enregistrer</button>
        </form>
    </div>
</div>