<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = 'default';

$cakeDescription = 'Hotel Users';
?>


<div class="columns large-10 medium-9 content">
    <h3><?= __('Users') ?></h3>

    <?= $this->Html->Link('Ajouter un user', ['controller' => 'users', 'action' => 'add_user'], ['class' => 'pull-right btn btn-primary']); ?>

    <table id="datatable" class="table margin-top">
        <thead>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Mail</th>
            <th>Téléphone</th>
            <th>Adresse</th>
            <th>Naissance</th>
            <th>Actions</th>
        </thead>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable( {
            "ajax": '/users/usersJSON'
        } );
    } );
</script>

</body>
</html>
