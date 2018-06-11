<div class="container">
    <div class="row">
        <?= $this->Html->Link('< Vue globale', ['controller' => 'RCarteCategories', 'action' => 'liste'], ['class' => 'btn btn-primary mt-3 mb-3']); ?>

        <h3><?= __('Ajouter une catégorie') ?></h3>

        <form method="post">
            <label>Nom</label>  
            <input type="text" name="nomRCarteCategorie" class="form-control" required>

            <label>Description</label>  
            <input name="descritptionRCarteCategorie" class="form-control">

            <button type="submit" name="Enregistrer" class="btn btn-primary mt-5">Enregistrer</button>
        </form>
    </div>
</div>