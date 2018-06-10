<div class="container">
    <div class="row">
        <?= $this->Html->Link('< Vue globale', ['controller' => 'RCarteProduits', 'action' => 'liste'], ['class' => 'btn btn-primary mt-3 mb-3']); ?>

        <h3><?= __('Ajouter un produit') ?></h3>

        <form method="post">
            <label>Nom</label>  
            <input type="text" name="nomRCarteProduit" class="form-control" required>

            <label>Catégorie</label>  
            <select type="text" id="idRCarteCategorie" name="idRCarteCategorie" class="form-control" required>
                <?php foreach ($categories as $categorie => $value) : ?>
                    <option value="<?= $categorie ?>"><?= $value ?></option>
                <?php endforeach; ?>
            </select>

            <label>Sous catégorie</label>  
            <select type="text" id="idRCarteSCategorie" name="idRCarteSCategorie" class="form-control">
                <option value="1">Entrées</option>
                <option value="1">Plats</option>
                <option value="1">Desserts</option>
            </select>

            <label>Prix</label>  
            <input type="number" step="0.01" name="prixRCarteProduit" class="form-control"> 

            <label>Prix Achat</label>  
            <input type="number" step="0.01" name="prixAchatRCarteProduit" class="form-control">

            <label>De</label>  
            <input type="text" id="deRCarteProduit" name="deRCarteProduit" class="form-control hasDatepicker" value="">
        
            <label>A</label>
            <input type="text" id="aRCarteProduit" name="aRCarteProduit" class="form-control hasDatepicker" value="">

            <label>Description</label>  
            <textarea name="descritptionRCarteProduit" class="form-control"></textarea>

            <button type="submit" name="Enregistrer" class="btn btn-primary mt-5">Enregistrer</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    $("#idRCarteCategorie").change(function () {
        $.ajax({
            url: '/admin/r-carte-produits/scategories',
            data: {
                idRCarteCategorie: $("#idRCarteCategorie").val()
            },
            dataType: 'json',
            type: 'post',
            success: function (json) {
                $("#idRCarteSCategorie").empty();
                $.each(json, function (clef, valeur) {
                    $("#idRCarteSCategorie").append('<option value="' + clef + '">' + valeur + '</option>');
                });
            },
            error: function() {
                $("#idRCarteSCategorie").empty();    
                $("#idRCarteSCategorie").append('<option value="0"></option>');                     
            }
        })
    });
</script>