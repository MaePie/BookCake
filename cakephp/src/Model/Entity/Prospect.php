<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * Prospect Entity
 */

class Prospect extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'idProspect' => true,
        'nomProspect' => true,
        'emailProspect' => true,
        'telProspect' => true,
        'createdProspect' => true,
        'modifiedProspect' => true
    ];
}
