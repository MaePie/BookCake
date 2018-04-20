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
                <?= $this->Html->Link('Contact', ['controller' => 'restaurant', 'action' => 'contact'], ['class' => 'nav-link']) ?>
            </li>
        </ul>
    </div>
    <div class="navbar-right">
        <div class="row">
            <div class="col-12">
                <span class="text"><i class="fa fa-phone"></i> +33 6 80 63 16 39 </span>
            </div>
            <div class="col-12">
                <span class="text"><i class="fa fa-envelope"></i> restaurant@aufildeleau.com</span>
            </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg nav-bot">
    <form method="post" id="reservationForm">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>
                        <input type="text" name="dateRRes" class="form-control hasDatepicker" value="<?= date('Y-m-d') ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-clock"></i></span>
                        </div>
                        <select name="heureRRes" class="form-control">
                            <option>Déjeuner</option>
                            <option>Dîner</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-users"></i></span>
                        </div>
                        <input type="number" name="nbPersonnes" class="form-control" value="2">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <button type="button" class="btn btn-block">Réserver</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container hideForm">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                        </div>
                        <input type="text" name="name" class="form-control" placeholder="Nom">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Mail">
                    </div>
                </div>
            </div>
        </div>
    </form>
</nav>
