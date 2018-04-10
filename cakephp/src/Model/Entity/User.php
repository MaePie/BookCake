<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 */

class User extends Entity
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
        'idUser' => true,
        'nomUser' => true,
        'prenomUser' => true,
        'emailUser' => true,
        'passwordUser' => true,
        'telephoneUser' => true,
        'adresse1User' => true,
        'adresse2User' => true,
        'cpUser' => true,
        'villeUser' => true,
        'paysUser' => true,
        'passwordUser' => true,
        'dateNaissUser' => true,
        'photoUser' => true,
        'createdUser' => true,
        'modifiedUser' => true
    ];

    protected function _setPasswordUser($value)
    {
        if (strlen($value)) {
            $hasher = new DefaultPasswordHasher();

            return $hasher->hash($value);
        }
    }
}
