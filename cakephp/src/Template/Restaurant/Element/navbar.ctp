<nav class="navbar navbar-expand-lg" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><?= $this->Html->Image('logo.png', ['height' => '94px']) ?></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav mr-auto">
            <?php echo ($this->request['action'] == 'index') ? '<li class="active">' : '<li>' ?>
                <?= $this->Html->Link('Restaurant', ['controller' => 'restaurant', 'action' => 'index'], ['class' => 'nav-link']) ?>
            </li>
            <?php echo ($this->request['action'] == 'carte') ? '<li class="active">' : '<li>' ?>
                <?= $this->Html->Link('Carte', ['controller' => 'restaurant', 'action' => 'carte'], ['class' => 'nav-link']) ?>
            </li>
            <?php echo ($this->request['action'] == 'galerie') ? '<li class="active">' : '<li>' ?>
                <?= $this->Html->Link('Galerie photos', ['controller' => 'restaurant', 'action' => 'galerie'], ['class' => 'nav-link']) ?>
            </li>
            <?php echo ($this->request['action'] == 'contact') ? '<li class="active">' : '<li>' ?>
                <?= $this->Html->Link('Carte', ['controller' => 'restaurant', 'action' => 'contact'], ['class' => 'nav-link']) ?>
            </li>
        </ul>
    </div>
    <div class="navbar-right">
        <span class="text"><i class="fa fa-phone"></i> +33 6 80 63 16 39 </span>
        <span class="text"><i class="fa fa-envelope"></i> restaurant@aufildeleau.com</span>
    </div>
</nav>
<nav class="navbar navbar-expand-lg nav-bot">
    <div class="container">
        <div class="row">
            <div class="col-12">
            <form method="post">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input type="date" name="dateRRes" class="form-control" value="<?= date('Y-m-d') ?>">
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-clock"></i></span>
                    </div>
                    <select name="heureRRes" class="form-control">
                        <option>Déjeuner</option>
                        <option>Dîner</option>
                    </select>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-users"></i></span>
                    </div>
                    <input type="number" name="nbPersonnes" class="form-control">
                </div>
            </form>
        </div>
        </div>
    </div>
</nav>
