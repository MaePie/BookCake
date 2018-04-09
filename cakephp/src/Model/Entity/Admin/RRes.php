<?php
namespace App\Model\Entity\Admin;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 */

class RRRes extends Entity
{
    protected $_accessible = [
        'idRRRes' => true,
        'idUser' => true,
        'idRZone' => true,
        'idRTable' => true,
        'dateRRes' => true,
        'heureRRes' => true,
        'createdRRes' => true,
        'modifiedRRes' => true
    ];
}
