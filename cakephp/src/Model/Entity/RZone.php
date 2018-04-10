<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 */

class RZone extends Entity
{
    protected $_accessible = [
        'idRZone' => true,
        'nomRZone' => true
    ];
}
