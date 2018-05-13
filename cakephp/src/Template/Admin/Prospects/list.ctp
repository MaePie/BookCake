<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>

<h3><?= __('Users') ?></h3>

<?= $this->Html->Link('Ajouter un user', ['controller' => 'prospects', 'action' => 'add'], ['class' => 'pull-right btn btn-primary']); ?>

<table id="datatable" class="table margin-top table-striped table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Mail</th>
        <th>Téléphone</th>
        <th>Actions</th>
    </thead>
</table>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "ajax": '/admin/prospects/listJSON'
        } );
    } );
</script>

</body>
</html>
