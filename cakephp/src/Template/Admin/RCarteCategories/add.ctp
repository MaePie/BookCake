<div class="container">
    <div class="row">
        <?= $this->Html->Link('< Vue globale', ['controller' => 'RCarteCategories', 'action' => 'liste'], ['class' => 'btn btn-primary mt-3 mb-3']); ?>

        <h3><?= __('Ajouter une catégorie') ?></h3>

        <form method="post">
            <label for="sectionRCarteCategorie">Section *</label>  
            <select name="dataC[sectionRCarteCategorie]" class="form-control" required>
                <option value="1">Au Menu</option>
                <option value="2">A la Carte</option>
            </select>

            <label for="nomRCarteCategorie">Nom *</label>  
            <input type="text" name="dataC[nomRCarteCategorie]" class="form-control" required>

            <label for="nomRCarteCategorie">Prix</label>  
            <input type="text" name="dataC[prixRCarteCategorie]" class="form-control">

            <label for="descritptionRCarteCategorie">Description</label>
            <input type="text" name="dataC[descritptionRCarteCategorie]" class="form-control">

            <div>
                <label>Sous-catégories</label>
                <button type="button" id="btnPlus"><i class="fa fa-plus"></i> Ajouter</button>

                <div class="scategories ml-5"></div>
            </div>
           
            <div class="col-lg-12">
                <button type="submit" name="Enregistrer" class="btn btn-primary mt-5">Enregistrer</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        var i = 1;
        $('#btnPlus').on('click', function() {
            $('.scategories').append('<div id="scat'+ i +'" class="scat"><label>Nom sous-catégorie ' + i + '</label><input type="text" name="dataSC['+ i +'][nomRCarteSCategorie]" class="form-control" required><button type="button" id="btnMinus'+ i +'"><i class="fa fa-minus"></i> Supprimer</button></div>')
            var j = i-1
            
            $('#btnMinus'+j).css('display', 'none')
            
            $('#btnMinus'+i).on('click', function() {
                $(this).parent().remove()
                i--
                $('#btnMinus'+j).css('display', 'block')
            })

            i++
        })
    })
</script>