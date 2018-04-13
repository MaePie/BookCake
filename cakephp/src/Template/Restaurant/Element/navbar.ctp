<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Gemme</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <?= $this->Html->Link('Restaurant', ['controller' => 'restaurant', 'action' => 'index'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->Link('Carte', ['controller' => 'restaurant', 'action' => 'carte'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->Link('Galerie photos', ['controller' => 'restaurant', 'action' => 'galerie'], ['class' => 'nav-link']) ?>
            </li>
            <li class="nav-item">
                <?= $this->Html->Link('Carte', ['controller' => 'restaurant', 'action' => 'contact'], ['class' => 'nav-link']) ?>
            </li>
        </ul>
        <span class="navbar-text">
            +33 6 80 63 16 39
        </span>
    </div>
</nav>
