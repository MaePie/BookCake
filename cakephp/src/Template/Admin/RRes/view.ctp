<div class="container">
    <div class="row">
        <h3>Réservation <?= $rres['idRRes'] ?></h3>

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="row"><?= __('ID') ?></th>
                <td><?= $rres['idRRes'] ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date') ?></th>
                <td><?= $rres['dateRRes']->format('d / m / Y') ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Heure') ?></th>
                <td><?= $rres['heureRRes']->format('H:i') ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nom') ?></th>
                <td>
                    <?php if($rres->user['nomUser']) echo $rres->user['nomUser'] ?>
                    <?php if($rres->prospect['nomProspect']) echo $rres->prospect['nomProspect'] ?>
                    <?php if($rres['nomRRes']) echo $rres['nomRRes'] ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Mail') ?></th>
                <td>
                    <?php if($rres->user['emailUser']) echo $rres->user['emailUser'] ?>
                    <?php if($rres->prospect['emailProspect']) echo $rres->prospect['emailProspect'] ?>
                </td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nombre de personnes') ?></th>
                <td><?= $rres['nbPersRRes'] ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Statut') ?></th>
                <td>
                    <?php if ($rres['statutRRes'] == 'Validée') : ?>
                        <b class="alert-sm alert-success">
                    <?php endif; ?>
                    <?php if ($rres['statutRRes'] == 'Demandée') : ?>     
                        <b class="alert-sm alert-warning">
                    <?php endif; ?>
                    <?php if ($rres['statutRRes'] == 'Annulée') : ?>
                        <b class="alert-sm alert-danger">
                    <?php endif; ?>
                    
                        <?= $rres['statutRRes'] ?> 
                    </b>
                     | <?= $this->Html->Link('Valider', ['controller' => 'RRes', 'action' => 'validRes', $rres->idRRes]) ?> | <?= $this->Html->Link('Annuler', ['controller' => 'RRes', 'action' => 'cancelRes', $rres->idRRes]) ?> 
                </td>
            </tr>
            <!-- <tr>
                <th scope="row"><?= __('Zone') ?></th>
                <td><?php if ($rres->r_zone) echo $rres->r_zone['nomZone'] ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Table') ?></th>
                <td><?php if ($rres->r_table) echo $rres->r_table['nomTable'] ?></td>
            </tr> -->
            <tr>
                <th scope="row"><?= __('Date de création') ?></th>
                <td><?= $rres['createdRRes']->format('d / m / Y H:i') ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de modification') ?></th>
                <td><?= $rres['modifiedRRes']->format('d / m / Y H:i') ?></td>
            </tr>
        </table>
    </div>
</div>