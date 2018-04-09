<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

$cakeDescription = 'Hotel Tables';
?>


<h3><?= __('Tables') ?></h3>

<?= $this->Html->Link('Ajouter une table', ['controller' => 'rtables', 'action' => 'add'], ['class' => 'pull-right btn btn-primary margin-top margin-bottom']); ?>

<table id="datatable" class="table margin-top table-striped table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>Zone</th>
        <th>Nom</th>
        <th>Actions</th>
    </thead>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "ajax": '/rtables/JSON'
        } );
    } );
</script>

</body>
</html>
