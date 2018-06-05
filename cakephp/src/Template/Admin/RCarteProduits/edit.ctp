<div class="container">
    <div class="row">
        <?= $this->Html->Link('< Vue globale', ['controller' => 'RCarteProduits', 'action' => 'liste', $produit->r_carte_category->idRCarteCategorie], ['class' => 'btn btn-primary mt-3 mb-3']); ?>

        <h3><?= $produit['nomRCarteProduit'] ?></h3>

        <form method="post" class="col-lg-6">
            <label>Nom</label>  
            <input type="text" name="nomRCarteProduit" value="<?= $produit['nomRCarteProduit'] ?>" class="form-control mb-3">

            <label>Catégorie</label>  
            <select type="text" id="idRCarteCategorie" name="idRCarteCategorie" class="form-control mb-3">
                <?php foreach ($categories as $categorie => $value) : ?>
                    <option value="<?= $categorie ?>" <?php if ($categorie == $produit->r_carte_category['idRCarteCategorie']) echo 'selected' ?> ><?= $value ?></option>
                <?php endforeach; ?>
            </select>

            <label>Sous catégorie</label>  
            <select type="text" id="idRCarteSCategorie" name="idRCarteSCategorie" value="<?= $produit['nomRCarteProduit'] ?>" class="form-control mb-3">
                <?php if (isset($produit->r_carte_s_category)) : ?>
                    <option value="<?= $produit->r_carte_s_category->idRCarteSCategorie ?>" selected> <?= $produit->r_carte_s_category->nomRCarteSCategorie ?> </option>
                <?php endif; ?>
            </select>

            <label>Prix Achat</label>  
            <input type="number" step="0.01" name="prixRCarteProduit" value="<?= $produit['prixRCarteProduit'] ?>" class="form-control mb-3">

            <label>Prix Vente</label>  
            <input type="number" step="0.01" name="prixVenteRCarteProduit" value="<?= $produit['prixVenteRCarteProduit'] ?>" class="form-control mb-3">

            <label>Période :</label>  
            <label>De</label>  
            <input type="text" id="deRCarteProduit" name="deRCarteProduit" value="<?= $produit['deRCarteProduit'] ?>" class="form-control hasDatepicker">
        
            <label>A</label>
            <input type="text" id="aRCarteProduit" name="aRCarteProduit" value="<?= $produit['aRCarteProduit'] ?>" class="form-control hasDatepicker">

            <label>Description</label>  
            <textarea name="descritptionRCarteProduit" class="form-control mb-3"><?= $produit['descriptionRCarteProduit'] ?></textarea>

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