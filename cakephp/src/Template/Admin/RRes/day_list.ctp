<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>


<h1><?= __('Réservations') ?></h1>

<?= $this->Html->Link('Ajouter une réservation', ['controller' => 'rres', 'action' => 'add'], ['class' => 'pull-right btn btn-primary margin-top margin-bottom']); ?>

<br/>

<div class="container" style="text-align: center;">
    <button class="btn btn-primary"> <?= $this->Html->Link('<', ['controller' => 'rres', 'action' => 'dayList', date('Y-m-d', strtotime($day.'-1 day'))], ['style' => 'color: white']) ?> </button>
    <button class="btn btn-primary"><?= date('d / m / Y', strtotime($day)) ?></button>
    <button class="btn btn-primary"> <?= $this->Html->Link('>', ['controller' => 'rres', 'action' => 'dayList', date('Y-m-d', strtotime($day.'+1 day'))], ['style' => 'color: white']) ?> </button>
</div>

<br/><h3>Réservations validées</h3>

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
        <?php if (count($ress) == 'NULL') : ?>
            <tr>
                <td colspan="7">Pas de réservations validées.</td>
            </tr>
        <?php else : ?>
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
                    <td><?= $res->statutRRes ?> - <?= $this->Html->Link('Valider', ['controller' => 'rres', 'action' => 'validRes', $res->idRRes]) ?> - <?= $this->Html->Link('Annuler', ['controller' => 'rres', 'action' => 'cancelRes', $res->idRRes]) ?></td>
                    <td>
                        <?= $this->Html->Link('Voir', ['controller' => 'rres', 'action' => 'view', $res->idRRes]) ?> - <?= $this->Html->Link('Modifier', ['controller' => 'rres', 'action' => 'edit', $res->idRRes]) ?> - <?= $this->Html->Link('Supprimer', ['controller' => 'rres', 'action' => 'delete', $res->idRRes]) ?>                    
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<br/><h3>Réservations non validées</h3>

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
        <?php if (count($ressNV) == 'NULL') : ?>
            <tr>
                <td colspan="7">Pas de réservations non validées.</td>
            </tr>
        <?php else : ?>
            <?php foreach($ressNV as $resNV) : ?> 
                <tr>
                    <td><?= $resNV->idRRes ?></td>
                    <td>
                        <?php 
                            if ($resNV->prospect) echo $resNV->prospect['nomProspect'];
                            if ($resNV->user) echo $resNV->user['nomUser'] . ' ' . $resNV->user['prenomUser'];
                        ?>
                    </td>
                    <td>
                        <?php 
                            if ($resNV->prospect) echo $resNV->prospect['emailProspect'];
                            if ($resNV->user) echo $resNV->user['emailUser'];
                        ?>
                    </td>
                    <td><?= $resNV->dateRRes->format('d / m / Y') ?></td>
                    <td><?= $resNV->heureRRes->format('H:i') ?></td>
                    <td><?= $resNV->statutRRes ?> - <?= $this->Html->Link('Valider', ['controller' => 'rres', 'action' => 'validRes', $resNV->idRRes]) ?> - <?= $this->Html->Link('Annuler', ['controller' => 'rres', 'action' => 'cancelRes', $resNV->idRRes]) ?></td>
                    <td>
                        <?= $this->Html->Link('Voir', ['controller' => 'rres', 'action' => 'view', $resNV->idRRes]) ?> - <?= $this->Html->Link('Modifier', ['controller' => 'rres', 'action' => 'edit', $resNV->idRRes]) ?> - <?= $this->Html->Link('Supprimer', ['controller' => 'rres', 'action' => 'delete', $resNV->idRRes]) ?>                    
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<br/><h3>Réservations annulées</h3>

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
        <?php if (count($ressA) == 'NULL') : ?>
            <tr>
                <td colspan="7">Pas de réservations annulées.</td>
            </tr>
        <?php else : ?>
            <?php foreach($ressA as $resA) : ?> 
                <tr>
                    <td><?= $resA->idRRes ?></td>
                    <td>
                        <?php 
                            if ($resA->prospect) echo $resA->prospect['nomProspect'];
                            if ($resA->user) echo $resA->user['nomUser'] . ' ' . $resA->user['prenomUser'];
                        ?>
                    </td>
                    <td>
                        <?php 
                            if ($resA->prospect) echo $resA->prospect['emailProspect'];
                            if ($resA->user) echo $resA->user['emailUser'];
                        ?>
                    </td>
                    <td><?= $resA->dateRRes->format('d / m / Y') ?></td>
                    <td><?= $resA->heureRRes->format('H:i') ?></td>
                    <td><?= $resA->statutRRes ?> - <?= $this->Html->Link('Valider', ['controller' => 'rres', 'action' => 'validRes', $resA->idRRes]) ?> - <?= $this->Html->Link('Annuler', ['controller' => 'rres', 'action' => 'cancelRes', $resA->idRRes]) ?></td>
                    <td>
                        <?= $this->Html->Link('Voir', ['controller' => 'rres', 'action' => 'view', $resA->idRRes]) ?> - <?= $this->Html->Link('Modifier', ['controller' => 'rres', 'action' => 'edit', $resA->idRRes]) ?> - <?= $this->Html->Link('Supprimer', ['controller' => 'rres', 'action' => 'delete', $resA->idRRes]) ?>                    
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
