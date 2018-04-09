<?php
namespace App\Model\Entity\Admin;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 */

class RTable extends Entity
{
    protected $_accessible = [
        'idRTable' => true,
        'idRZone' => true,
        'nomRTable' => true
    ];
}
