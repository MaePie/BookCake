<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>


<h3><?= __('Réservations') ?></h3>

<?= $this->Html->Link('Ajouter une réservation', ['controller' => 'rres', 'action' => 'add'], ['class' => 'pull-right btn btn-primary margin-top margin-bottom']); ?>

<div id="calendar"></div>

<table class="table margin-top table-striped table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Mail</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Statut</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach($ress as $res) : ?> 
            <tr>
                <td><?= $res->idRRes ?></td>
                <td>
                    <?php 
                        if ($res->prospect) echo $res->prospect['nomProspect'];
                        if ($res->user) echo $res->user['nomUser'] . ' ' . $res->user['prenomUser'];
                    ?>
                </td>
                <td>
                    <?php 
                        if ($res->prospect) echo $res->prospect['emailProspect'];
                        if ($res->user) echo $res->user['emailUser'];
                    ?>
                </td>
                <td><?= $res->dateRRes->format('d / m / Y') ?></td>
                <td><?= $res->heureRRes->format('H:i') ?></td>
                <td><?= $res->statutRRes ?> | <?= $this->Html->Link('Valider', ['controller' => 'rres', 'action' => 'validRes', $res->idRRes]) ?> - <?= $this->Html->Link('Annuler', ['controller' => 'rres', 'action' => 'cancelRes', $res->idRRes]) ?></td>
                <td>
                    <?= $this->Html->Link('Voir', ['controller' => 'rres', 'action' => 'view', $res->idRRes]) ?> - <?= $this->Html->Link('Modifier', ['controller' => 'rres', 'action' => 'edit', $res->idRRes]) ?> - <?= $this->Html->Link('Supprimer', ['controller' => 'rres', 'action' => 'delete', $res->idRRes]) ?>                    
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
