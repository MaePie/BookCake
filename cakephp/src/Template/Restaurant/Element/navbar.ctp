<nav class="navbar navbar-expand-lg" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><?= $this->Html->Image('logo.png', ['height' => '94px']) ?></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav mr-auto">
            <li class="active">
                <?= $this->Html->Link('Restaurant', ['controller' => 'restaurant', 'action' => 'index'], ['class' => 'nav-link']) ?>
            </li>
            <li>
                <?= $this->Html->Link('Carte', ['controller' => 'restaurant', 'action' => 'carte'], ['class' => 'nav-link']) ?>
            </li>
            <li>
                <?= $this->Html->Link('Galerie photos', ['controller' => 'restaurant', 'action' => 'galerie'], ['class' => 'nav-link']) ?>
            </li>
            <li>
                <?= $this->Html->Link('Carte', ['controller' => 'restaurant', 'action' => 'contact'], ['class' => 'nav-link']) ?>
            </li>
        </ul>
    </div>
    <div class="navbar-right">
        <span class="text"><i class="fa fa-phone"></i> +33 6 80 63 16 39</span>
        <span class="text"><i class="fa fa-envelope"></i> restaurant@aufildeleau.com</span>
    </div>
</nav>
<nav class="navbar navbar-expand-lg nav-bot">
    <div class="row">
        <form method="post">
            <div class="col-2">
                <input type="date" name="dateRRes" class="form-control">
            </div>
            <div class="col-2">
                <select name="heureRRes" class="form-control">
                    <option>Dejeuner</option>
                    <option>Diner</option>
                </select>
            </div>
            <div class="col-2">
                <input type="number" name="nbPersonnes" class="form-control">
            </div>
        </form>
    </div>
</nav>
