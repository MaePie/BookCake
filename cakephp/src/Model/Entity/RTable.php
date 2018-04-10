<?php
namespace App\Model\Entity;

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
