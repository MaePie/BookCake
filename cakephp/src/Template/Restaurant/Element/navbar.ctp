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
        <span class="text"><i class="fa fa-home"></i>Home</span>
        <span class="text"><i class="fa fa-home"></i>Home</span>
    </div>
</nav>
<nav class="navbar navbar-expand-lg nav-bot">
    
</nav>
