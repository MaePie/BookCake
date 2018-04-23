<?php
namespace App\Model\Entity;

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
        'idProspect' => true,
        'idRZone' => true,
        'idRTable' => true,
        'dateRRes' => true,
        'heureRRes' => true,
        'nbPersRRes' => true,
        'createdRRes' => true,
        'modifiedRRes' => true
    ];
}
