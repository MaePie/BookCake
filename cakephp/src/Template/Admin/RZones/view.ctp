<?php
    $this->layout = 'default';
?>

<div class="container">
    <div class="row">
        <h3><?= __($zone->nomRZone) ?></h3>

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="row"><?= __('ID') ?></th>
                <td><?= $this->Number->format($zone->idRZone) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nom') ?></th>
                <td><?= $zone->nomRZone ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de création') ?></th>
                <td><?= date('d / m / Y H:i:s', strtotime($zone['createdRZone'])) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de modification') ?></th>
                <td><?= date('d / m / Y H:i:s', strtotime($zone['modifiedRZone'])) ?></td>
            </tr>
        </table>
    </div>
</div>