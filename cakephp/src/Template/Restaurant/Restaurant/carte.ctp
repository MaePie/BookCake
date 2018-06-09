<div id="carte" class="carte container-fluid">
    <?php
        $section = 0;
        $categorie = 0;
        $scategorie = 0;
        $wasSetSCategorie = false;
    ?>


    <?php foreach ($produits as $produit) : ?>

        <?php if ((isset($produit->r_carte_s_category) && $produit->r_carte_s_category->idRCarteSCategorie != $scategorie && $scategorie != 0 && $wasSetSCategorie) || (!isset($produit->r_carte_s_category) && $produit->r_carte_category->idRCarteCategorie != $categorie && $scategorie != 0 && $wasSetSCategorie)) : ?>
                        </div>
        <?php endif; ?>

        <?php 
            if (isset($produit->r_carte_s_category)) $wasSetSCategorie = true;
            else $wasSetSCategorie = false;
        ?>

        <?php if ($produit->r_carte_category->idRCarteCategorie != $categorie && $categorie != 0) : ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($produit->r_carte_category->sectionRCarteCategorie != $section) : ?>
            <h1 class="carte-title title mt-3">
                <?php if ($produit->r_carte_category->sectionRCarteCategorie == 1) : ?>
                    Au Menu
                <?php elseif ($produit->r_carte_category->sectionRCarteCategorie == 2) : ?>
                    A la carte
                <?php endif; ?>
            </h1>
            <div class="row">
            <?php $section = $produit->r_carte_category->sectionRCarteCategorie ?>
        <?php endif; ?>

            <?php if ($produit->r_carte_category->idRCarteCategorie != $categorie) : ?>
                <div class="carte-content col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <h2 class="carte-header mt-3 mb-1"><?= $produit->r_carte_category->nomRCarteCategorie ?></h2>
                    <p class="item-text"><small>Sauf week-end et jours fériés</small></p>
                    <div class="carte-body container-fluid">
                        <div class="row mb-1">
                <?php $categorie = $produit->r_carte_category->idRCarteCategorie ?>
            <?php endif; ?>

        <?php if (isset($produit->r_carte_s_category) && $produit->r_carte_s_category->idRCarteSCategorie != $scategorie) : ?>
                        <div class="row carte-menu col-lg-12 col-md-12 col-sm-12">
                            <h3 class="menu-title mt-1"><?= $produit->r_carte_s_category->nomRCarteSCategorie ?></h3>
            <?php $scategorie = $produit->r_carte_s_category->idRCarteSCategorie ?>
        <?php endif; ?>

                            <p class="item-text col-lg-9 col-md-8 col-sm-8 col-xs-8"><?= $produit->nomRCarteProduit ?></p>
                        <?php if ($produit->prixRCarteProduit != 0) : ?>
                            <p class="text-right col-lg-3 col-md-4 col-sm-4 col-xs-4"><?= $produit->prixRCarteProduit ?> €</p>
                        <?php endif; ?>
    <?php endforeach; ?>
    
    </div>
</div>
