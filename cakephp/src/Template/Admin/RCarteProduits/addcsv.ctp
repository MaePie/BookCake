<div class="container">
    <div class="row">
    	<div class="col-lg-6">
	        <?= $this->Html->Link('< Vue globale', ['controller' => 'RCarteProduits', 'action' => 'liste'], ['class' => 'btn btn-primary mt-3 mb-3']); ?>

	        <h3><?= __('Ajouter des produits') ?></h3>
	        <div class="col-lg-12">
	        	<a href="/files/modele-import-produits.csv" class="btn mb-5 alert-success">Télécharger le modèle d'import CSV</a>
	        </div>

	        <?= $this->Form->create('ProduitsCSV', ['enctype' => 'multipart/form-data']) ?>
	        <?= $this->Form->input('CSV', ['label' => 'Fichier CSV', 'type' => 'file']) ?>
	        <?= $this->Form->submit('Confirmer', ['class' => 'btn btn-primary mt-3', 'name' => 'confirm']) ?>
	        <?= $this->Form->end() ?>
	    </div>

        <div class="col-lg-5">
        	<table class="table table-striped table-hover table-bordered">
        		<thead id="fadeout" class="pointer" style="display: none;">
        			<th><i class="fa fa-angle-up"></i> Catégories</th>
        			<th><i class="fa fa-angle-up"></i> Sous-catégories</th>
		        </thead>
        		<thead id="fadein" class="pointer">
        			<th><i class="fa fa-angle-down"></i> Catégories</th>
        			<th><i class="fa fa-angle-down"></i> Sous-catégories</th>
		        </thead>
		       	<tbody id="tbodycat" hidden>
		        	<?php foreach ($cat as $c => $value) : ?>
		        		<tr>
		        			<?php if (isset($value['r_carte_s_categories'])) : ?>
		        				<?php (count($value['r_carte_s_categories']) == 0) ? $count = 1 : $count = count($value['r_carte_s_categories']) ?>
		        				<td rowspan="<?= $count ?>"><?= $value->nomRCarteCategorie ?></td>
		        				<?php foreach ($value['r_carte_s_categories'] as $sc => $value2) : ?>
		        					<?php if ($sc == 0) : ?>
		        						<td><?= $value2->nomRCarteSCategorie ?></td>
		        					<?php else : ?>
		        						<tr>
		        							<td><?= $value2->nomRCarteSCategorie ?></td>
		        						</tr>
		        					<?php endif; ?>
		        				<?php endforeach; ?>
		        			<?php else : ?>
		        				<td><?= $value->nomRCarteCategorie ?></td>
		        			<?php endif; ?>
		        		</tr>
		        	<?php endforeach; ?>
		        </tbody>
	        </table>
        </div>

        <div class="col-lg-12 mt-5">
	        <?php if (isset($csv)) : ?>
	        	<?= $this->Form->create('ProduitsTable') ?>
		        	<table id="tableCSV" class="table table-striped table-hover table-bordered mt-5">
		        		<thead>
		        			<tr>
				        		<th>Nom</th>
				        		<th>Catégorie</th>
				        		<th>Sous-catégorie</th>
				        		<th>Prix</th>
				        		<th>Prix achat</th>
				        		<th>Date De</th>
				        		<th>Date A</th>        				
		        			</tr>
		        		</thead>
		        		<tbody>
		        			<?php foreach ($csv as $produit => $value) : ?>
		        				<?php
		        					if ($value[5] != '') {
						                list($day, $month, $year) = explode('/', $value[5]);
						                $value[5] = $year . '-' . $month . '-' . $day;
						            }
		        					if ($value[6] != '') {
						                list($day, $month, $year) = explode('/', $value[6]);
						                $value[6] = $year . '-' . $month . '-' . $day;
						            }
		        				?>
		        				<tr>
									<td><input type="text" name="nomRCarteProduit[<?= $produit ?>]" value="<?= $value[0] ?>" class="form-control" required></td>
									<td><input type="text" name="catRCarteProduit[<?= $produit ?>]" value="<?= $value[1] ?>" class="form-control catRCarteProduit" required></td>
									<td><input type="text" name="scatRCarteProduit[<?= $produit ?>]" value="<?= $value[2] ?>" class="form-control scatRCarteProduit"></td>
									<td><input type="number" step="0.05" name="prixRCarteProduit[<?= $produit ?>]" value="<?= $value[3] ?>" class="form-control"></td>
									<td><input type="number" step="0.05" name="prixAchatRCarteProduit[<?= $produit ?>]" value="<?= $value[4] ?>" class="form-control"></td>
									<td><input type="date" name="deRCarteProduit[<?= $produit ?>]" value="<?= $value[5] ?>" class="form-control"></td>
									<td><input type="date" name="aRCarteProduit[<?= $produit ?>]" value="<?= $value[6] ?>" class="form-control"></td>
			        			</tr>
			        			<tr>
			        				<td class="text-center"><b>Description</b></td>
									<td colspan="6"><input type="text" name="descriptionRCarteProduit[<?= $produit ?>]" value="<?= $value[7] ?>" class="form-control" placeholder="Description"></td>
		        			<?php endforeach; ?>
		        		</tbody>
		        	</table>

	        		<?= $this->Form->submit('Valider', ['class' => 'btn btn-primary mt-3', 'name' => 'valid']) ?>
	        	<?= $this->Form->end() ?>
	        <?php endif; ?>
	    </div>
    </div>
</div>

<script type="text/javascript">
	$('#fadeout').on('click', function() {
	    var $this = $('#tbodycat');
	    $this.fadeOut('slow')
	   	$('#fadeout').css('display', 'none')
	   	$('#fadein').css('display', 'table-row-group')
	});
	$('#fadein').on('click', function() {
	    var $this = $('#tbodycat');
	    $this.fadeIn('slow')
	   	$('#fadein').css('display', 'none')
	   	$('#fadeout').css('display', 'table-row-group')
	});

	var categories = function() {
	    var tmp = null;
	    var cat = [];
	    $.ajax({
	        'async': false,
	        'type': "POST",
	        'global': false,
	        'dataType': 'json',
	        'url': "/admin/r-carte-produits/categoriescsv",
	        'data': { 'request': "", 'target': 'arrange_url', 'method': 'method_target' },
	        'success': function (data) {
	            tmp = data;
	        }
	    });
	    $.each(tmp, function(index, value) {
		    cat.push(value)
		});
		console.log(cat)
	    return cat;
	}();

	var scategories = function () {
	    var tmp = null;
	    var scat = [];
	    $.ajax({
	        'async': false,
	        'type': "POST",
	        'global': false,
	        'dataType': 'json',
	        'url': "/admin/r-carte-produits/scategoriescsv",
	        'data': { 'request': "", 'target': 'arrange_url', 'method': 'method_target' },
	        'success': function (data) {
	            tmp = data;
	        }
	    });
	    $.each(tmp, function(index, value) {
		    scat.push(value)
		});
		console.log(scat)
	    return scat;
	}();

	$.each($('.catRCarteProduit'), function() {
		if ($.inArray($(this).val(), categories) == -1) {
			$(this).css('background', 'rgba(231,76,60,0.88)')
			$(this).css('color', 'white')		
		}
	});

	$('.catRCarteProduit').on('change', function() {
		if ($.inArray($(this).val(), categories) == -1) {
			$(this).css('background', 'rgba(231,76,60,0.88)')
			$(this).css('color', 'white')
		}
		else if ($.inArray($(this).val(), categories) > 0) {
			$(this).css('background', 'white')
			$(this).css('color', '#555')
		}
	});

	$.each($('.scatRCarteProduit'), function() {
		if ($.inArray($(this).val(), scategories) == -1 && $(this).val() != '') {
			$(this).css('background', 'rgba(231,76,60,0.88)')
			$(this).css('color', 'white')		
		}
	});

	$('.scatRCarteProduit').on('change', function() {
		console.log($(this).val())
		if ($.inArray($(this).val(), scategories) == -1) {
			$(this).css('background', 'rgba(231,76,60,0.88)')
			$(this).css('color', 'white')
		}
		else if ($.inArray($(this).val(), scategories) > 0 || $(this).val().length == 0) {
			$(this).css('background', 'white')
			$(this).css('color', '#555')
		}
	});

</script>