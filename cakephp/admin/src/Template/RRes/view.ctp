<?php
    $this->layout = 'default';
?>

<div class="container">
    <div class="row">
        <h3><?= __($table->nomRTable) ?></h3>

        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th scope="row"><?= __('ID') ?></th>
                <td><?= $this->Number->format($table->idRTable) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Zone') ?></th>
                <td><?= $table->r_zone->nomRZone ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nom') ?></th>
                <td><?= $table->nomRTable ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de création') ?></th>
                <td><?= date('d / m / Y H:i:s', strtotime($table['createdRTable'])) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Date de modification') ?></th>
                <td><?= date('d / m / Y H:i:s', strtotime($table['modifiedRTable'])) ?></td>
            </tr>
        </table>
    </div>
</div>