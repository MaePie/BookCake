<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * RCarteCategorie Entity
 */

class RCarteCategorie extends Entity
{
    protected $_accessible = [
        'idRRCarteCategorie' => true,
        'nomRCarteCategorie' => true,
        'ordreRCarteCategorie' => true,
        'sectionRCarteCategorie' => true,
        'createdRCarteCategorie' => true,
        'modifiedRCarteCategorie' => true
    ];
}
