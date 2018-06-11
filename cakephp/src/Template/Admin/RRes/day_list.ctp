<?php
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
?>


<h1><?= __('Réservations') ?></h1>

<?= $this->Html->Link('< Vue globale', ['controller' => 'RRes', 'action' => 'fullList', date('m')], ['class' => 'btn btn-primary margin-top margin-bottom']); ?>
<?= $this->Html->Link('Ajouter une réservation', ['controller' => 'RRes', 'action' => 'add'], ['class' => 'pull-right btn btn-primary margin-top margin-bottom']); ?>

<br/>

<div class="container" style="text-align: center;">
    <?= $this->Html->Link('<', ['controller' => 'RRes', 'action' => 'dayList', date('Y-m-d', strtotime($day.'-1 day'))], ['class' => 'btn btn-primary']) ?>
    <a id="dp" class="btn btn-primary hasDatepicker"><?= date('d / m / Y', strtotime($day)) ?></a>
    <?= $this->Html->Link('>', ['controller' => 'RRes', 'action' => 'dayList', date('Y-m-d', strtotime($day.'+1 day'))], ['class' => 'btn btn-primary']) ?>
</div>

<br/><h3 class="alert-sm alert-success">Réservations validées</h3>

<table class="table margin-top table-striped table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>Nom</th>      
        <th>Mail</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Nombre</th>
        <th>Statut</th>
        <th>Commentaire</th>
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
                    <?php if (isset($res->prospect) || isset($res->user)) : ?>
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
                    <?php else : ?>
                        <td>
                            <?= $res->nomRRes ?>
                        </td>
                        <td></td>
                    <?php endif; ?>
                    <td><?= $res->dateRRes->format('d / m / Y') ?></td>
                    <td><?= $res->heureRRes->format('H:i') ?></td>
                    <td><?= $res->nbPersRRes ?></td>
                    <td>
                        <b class="alert-sm alert-success"><?= $res->statutRRes ?></b> | <?= $this->Html->Link('Valider', ['controller' => 'RRes', 'action' => 'validRes', $res->idRRes], ['confirm' =>  'Cette action enverra un mail de confirmation.']) ?> | <?= $this->Html->Link('Annuler', ['controller' => 'RRes', 'action' => 'cancelRes', $res->idRRes], ['confirm' => 'Etes-vous sur de vouloir annuler la réservation '. $res->idRRes .'. Cette action enverra un mail d\'annulation.']) ?>
                    </td>
                    <td><?= $res->commentaireRRes ?></td>
                    <td>
                        <?= $this->Html->Link('Voir', ['controller' => 'RRes', 'action' => 'view', $res->idRRes]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RRes', 'action' => 'delete', $res->idRRes], ['confirm' => 'Etes-vous sur de vouloir supprimer la réservation '. $res->idRRes]) ?>                    
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<br/><h3 class="alert-sm alert-warning">Réservations non validées</h3>

<table class="table margin-top table-striped table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Mail</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Nombre</th>
        <th>Statut</th>
        <th>Commentaire</th>
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
                    <?php if (isset($resNV->prospect) || isset($resNV->user)) : ?>
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
                    <?php else : ?>
                        <td>
                            <?= $resNV->nomRRes ?>
                        </td>
                        <td></td>
                    <?php endif; ?>
                    <td><?= $resNV->dateRRes->format('d / m / Y') ?></td>
                    <td><?= $resNV->heureRRes->format('H:i') ?></td>
                    <td><?= $resNV->nbPersRRes ?></td>
                    <td>
                        <b class="alert-sm alert-warning"><?= $resNV->statutRRes ?></b> | <?= $this->Html->Link('Valider', ['controller' => 'RRes', 'action' => 'validRes', $resNV->idRRes], ['confirm', 'Cette action enverra un mail de confirmation.']) ?> | <?= $this->Html->Link('Annuler', ['controller' => 'RRes', 'action' => 'cancelRes', $resNV->idRRes], ['confirm' => 'Etes-vous sur de vouloir annuler la réservation '. $resNV->idRRes .'. Cette action enverra un mail d\'annulation.']) ?>
                    </td>
                    <td><?= $resNV->commentaireRRes ?></td>
                    <td>
                        <?= $this->Html->Link('Voir', ['controller' => 'RRes', 'action' => 'view', $resNV->idRRes]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RRes', 'action' => 'delete', $resNV->idRRes], ['confirm' => 'Etes-vous sur de vouloir supprimer la réservation '. $resNV->idRRes]) ?>                    
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<br/><h3 class="alert-sm alert-danger">Réservations annulées</h3>

<table class="table margin-top table-striped table-hover table-bordered">
    <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Mail</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Nombre</th>
        <th>Statut</th>
        <th>Commentaire</th>
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
                    <?php if (isset($resA->prospect) || isset($resA->user)) : ?>
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
                    <?php else : ?>
                        <td>
                            <?= $resA->nomRRes ?>
                        </td>
                        <td></td>
                    <?php endif; ?>
                    <td><?= $resA->dateRRes->format('d / m / Y') ?></td>
                    <td><?= $resA->heureRRes->format('H:i') ?></td>
                    <td><?= $resA->nbPersRRes ?></td>
                    <td>
                        <b class="alert-sm alert-danger"><?= $resA->statutRRes ?></b> | <?= $this->Html->Link('Valider', ['controller' => 'RRes', 'action' => 'validRes', $resA->idRRes], ['confirm' => 'Cette action enverra un mail de confirmation.']) ?> | <?= $this->Html->Link('Annuler', ['controller' => 'RRes', 'action' => 'cancelRes', $resA->idRRes], ['confirm' => 'Etes-vous sur de vouloir annuler la réservation '. $resA->idRRes .'. Cette action enverra un mail d\'annulation.']) ?>
                    </td>
                    <td><?= $resA->commentaireRRes ?></td>
                    <td>
                        <?= $this->Html->Link('Voir', ['controller' => 'RRes', 'action' => 'view', $resA->idRRes]) ?> | <?= $this->Html->Link('Modifier', ['controller' => 'RRes', 'action' => 'edit', $resA->idRRes]) ?> | <?= $this->Html->Link('Supprimer', ['controller' => 'RRes', 'action' => 'delete', $resA->idRRes], ['confirm' => 'Etes-vous sur de vouloir supprimer la réservation '. $resA->idRRes]) ?>                    
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
