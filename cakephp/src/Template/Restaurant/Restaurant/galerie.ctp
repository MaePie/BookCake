<section class="container-fluid" id="galerie">
    <header class="mb-3 mt-0">
        <h1 class="title mb-3">Restaurant Au fil de l'eau</h1>

        <div class="row">
            <div class="col-12 text-center">
                <p>Aux portes de Toulouse, les pieds dans l'eau sur la Garonne, l'endroit vous charmera par son emplacement.</p>
                <p>Vous y viendrez en famille, entre amis, seul ou en couple, afin de déguster une cuisine variée, épicée, parfumée.</p>
            </div>
            <!-- <div class="col-lg-4 col-sm-12">
                <ul>
                    <li>Lundi : 11h - 22h30</li>
                    <li>Mardi : 11h - 22h30</li>
                    <li>Mercredi : 11h - 22h30</li>
                    <li>Jeudi : 11h - 22h30</li>
                    <li>Vendredi : 11h - 22h30</li>
                    <li>Samedi : 11h - 22h30</li>
                    <li>Dimanche : 11h - 15h</li>
                </ul>
            </div> -->
        </div>
    </header>

    <section class="row">
        <?= $this->Html->image('placeholder/salle.png', ['class' => 'col-lg-5', 'alt' => 'Salle']) ?>
        <div class="col-lg-7 mb-1">
            <header>
                <h2 class="mb-3">La salle</h2>
            </header>
            <p>La salle intérieure de 50 couverts vous permettra de profiter d'un menu du jour, le midi, ou d'un dîner plus raffiné le soir.</p>
            <p>De cette salle, climatisée et élégante, vous pourrez vous laisser bercer par le spectacle de la Garonne toujours hangeante.</p>
            <p>Le soir, dans une ambiance plus intime, vous embarquerez vers des destinations exotiques où l'ensemble de vos sens seront révélés.</p>
        </div>
    </section>

    <section class="row">
		<div class="col-lg-7 mb-1">
            <header>
                <h2 class="mb-3">Le salon</h2>
            </header>
            <p>Pour vous détendre, ce salon sera l'endroit de vos rendez-vous.</p>
            <p>Pour boire un verre, accompagné de mises en bouche, vous trouverez ici, la détente devant la cheminée.</p>
		</div>
        <?= $this->Html->image('placeholder/salon.jpg', ['class' => 'col-lg-5', 'alt' => 'Salon']) ?>
    </section>

    <section class="row">
        <?= $this->Html->image('placeholder/terrasse.png', ['class' => 'col-lg-5', 'alt' => 'Terrasse']) ?>
		<div class="col-lg-7 mb-1">
            <header>
                <h2 class="mb-3">La petite terrasse</h2>
            </header>
            <p>Comme dans le salon, cette terrasse sera l'endroit de vos rendez-vous l'été.</p>
            <p>Professionnelle, après le travail, entre amis, vous serez au calme, bercée par les rumeurs de la Garonne.</p>
		</div>
	</section>


    <section class="row">
        <div class="col-lg-7 mb-1">
            <header>
                <h2 class="mb-3">La terrasse côté Grill</h2>
            </header>
            <p>Que dire de cette terrasse qui surplombe l'eau, entourée da la nature et sur laquelle vous viendrez manger des plats marinés de notre cuisine d'été, côté Grill.</p>
            <p>Professionnelle, après le travail, entre amis, vous serez au calme, bercée par les rumeurs de la Garonne.</p>
        </div>
        <?= $this->Html->image('placeholder/terrasse-grill.jpg', ['class' => 'col-lg-5', 'alt' => 'Terrasse Grill']) ?>
    </section>
</section>
