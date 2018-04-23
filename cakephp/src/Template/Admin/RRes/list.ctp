<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$cakeDescription = 'Hotel Réservations Restaurant';
?>


<h3><?= __('Réservations') ?></h3>

<?= $this->Html->Link('Ajouter une réservation', ['controller' => 'rres', 'action' => 'add'], ['class' => 'pull-right btn btn-primary margin-top margin-bottom']); ?>

<table id="datatable" class="table margin-top table-striped table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>User</th>
        <th>Zone</th>
        <th>Table</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Actions</th>
    </thead>
</table>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "ajax": '/rres/JSON'
        } );
    } );
</script> -->

</body>
</html>
