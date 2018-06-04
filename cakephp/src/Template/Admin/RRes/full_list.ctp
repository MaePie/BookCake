<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>


<h3><?= __('Réservations') ?></h3>

<?= $this->Html->Link('Ajouter une réservation', ['controller' => 'RRes', 'action' => 'add'], ['class' => 'pull-right btn btn-primary margin-top margin-bottom']); ?>

<!-- <?= debug($ress) ?> -->

<div id="calendar"></div>

</body>
</html>
